<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $ip = $request->ip();

        // ⏳ Batasi agar tidak spam
        if (RateLimiter::tooManyAttempts("chatbot:$ip", 5)) {
            return response()->json([
                'reply' => 'Tunggu sebentar ya, Robi lagi mikir dulu... 🧠'
            ], 429);
        }
        RateLimiter::hit("chatbot:$ip", 60);

        $message = trim($request->input('message'));

        // 🔒 Validasi input minimum
        if (strlen($message) < 3 || str_word_count($message) < 1) {
            return response()->json([
                'reply' => "Pertanyaanmu agak kurang jelas nih, bisa dijelaskan lebih detail? 😊"
            ]);
        }

        // 🚫 Filter Keyword Kompetitor / Sekolah Lain
        $blockedKeywords = ['sman 1 depok', 'smk taruna', 'sekolah lain', 'smk pgri', 'sman ', 'sma negeri', 'smk negeri'];
        foreach ($blockedKeywords as $blocked) {
            if (str_contains(strtolower($message), $blocked)) {
                return response()->json([
                    'reply' => "Maaf, Robi hanya tahu seputar Sekolah Citra Negara aja nih! 🏫 tanya yang lain yuk! (Tentang Citra Negara)"
                ]);
            }
        }

        // 🧠 Ambil history chat
        $chatHistory = session()->get('chat_history', []);
        $chatHistory[] = ['role' => 'user', 'content' => $message];

        // 🤖 Tanya AI langsung (Tanpa FAQ manual)
        // Kita menggunakan "Pure Context" approach dimana semua info ada di system prompt.
        // Ini lebih cerdas daripada matching keyword manual.
        $reply = $this->askGroq($chatHistory);

        if ($reply === null) {
            $reply = "Maaf, Robi lagi pusing nih (gangguan server). Tanya lagi nanti ya! �";
        }

        // 🔹 Simpan balasan bot ke session
        $chatHistory[] = ['role' => 'assistant', 'content' => $reply];
        session(['chat_history' => array_slice($chatHistory, -10)]);

        return response()->json([
            'reply' => $reply
        ]);
    }

    private function askGroq(array $chatHistory)
    {
        try {
            // 🧩 Sistem Prompt "Upgrade" - Lengkap & Padat
            $systemPrompt = "
Kamu adalah chatbot sekolah bernama Robi 🤖.
Kamu dibuat oleh Ahmad Rifai dari kelas 12 PPLG 1

Tugasmu adalah menjawab pertanyaan seputar **Sekolah Citra Negara** (Yayasan At-Taqwa Kemiri Jaya).
Lokasi: **Jl. Raya Tanah Baru No.99 Kemiri Jaya, Beji, Depok 16421**.

**Data Penting Sekolah:**

🏛 **YAYASAN AT-TAQWA KEMIRI JAYA**
- **Pendiri**: Drs. H. Nasan MM & Hj. Mutia, S.Pd, M.M
- **Ketua Yayasan**: Drs. H. Nasan, MM
- **Penasehat**: Dr. M. Rizki Darmaguna Hasan, S.Tr.,M.Pd
- **Ketua BPH**: Agustin Wijayanti, S.H.,MM
- **Berdiri**: Tahun 2004 (diawali dengan berdirinya SMK)
- **Visi**: MANTAP (Mutu, Amanah, Nyaman, Taqwa, Aktif, Profesional).

📞 **KONTAK & ALAMAT**
- **Telepon**: (021) 77213470
- **Alamat**: Jl. Raya Tanah Baru No.99 Kemiri Jaya, Beji, Depok 16421.
- **Website Yayasan**: https://citranegara.sch.id/

🏫 **SMK CITRA NEGARA**
- **Kepsek**: Abdul Kodir Zaelani, S.Pd.I.
- **Website**: https://smk.citranegara.sch.id/
- **Jurusan**:
  1. TJKT (Teknik Jaringan Komputer Telekomunikasi)
  2. PPLG (Pengembangan Perangkat Lunak & Gim) - *Ex-RPL*
  3. DKV (Desain Komunikasi Visual) - *Ex-Multimedia*
  4. Perhotelan
  5. MPLB (Manajemen Perkantoran) - *Ex-AP*
  6. Pemasaran - *Ex-Tata Niaga/BDP*

🏫 **SMA CITRA NEGARA**
- **Kepsek**: Ahmad Taufik, S.Kom
- **Website**: https://sma.citranegara.sch.id/
- **Jurusan**: IPA & IPS

🏫 **SMP CITRA NEGARA**
- **Kepsek**: Rosmarina, S.Pd
- **Website**: https://smp.citranegara.sch.id/
- **Unggulan**: Web Programming, Tahfidz (Holaqoh Qur’an), Entrepreneurship, Conversation.

🏢 **FASILITAS**
- Laboratorium Komputer/Multimedia/Jaringan, Perpus, Masjid/Musholla, Aula, Lapangan Olahraga, Ruang Kelas AC/Nyaman.

📝 **PPDB (PENDAFTARAN)**
- **Website**: [ppdbcitranegara.id](https://ppdbcitranegara.id/)
- **Biaya**: Berbeda tiap tahun/gelombang. Harap hubungi (021) 77213470 atau datang langsung ke sekolah untuk rincian terbaru.
- **Syarat Umum**: FC Ijazah/SKHU, KK, Akta Lahir, Pas Foto.

**Aturan Menjawab:**
1. **INFORMASI HANYA DARI DATA DI ATAS**. Jangan mengarang.
2. Jawab ramah & ceria 😃.
3. Jika tanya sekolah lain -> TOLAK SOPAN.
            ";

            $messages = array_merge([
                ['role' => 'system', 'content' => trim($systemPrompt)]
            ], $chatHistory);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.groq.key'),
                'Content-Type'  => 'application/json',
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                'model'       => 'llama-3.1-8b-instant',
                'messages'    => $messages,
                'temperature' => 0.3, 
                'max_tokens'  => 300, 
            ]);

            if ($response->successful()) {
               return $response->json()['choices'][0]['message']['content'] ?? null;
            }
        } catch (\Exception $e) {
            \Log::error('Groq API error: ' . $e->getMessage());
            return null;
        }
        return null;
    }

    public function resetChat()
    {
        session()->forget('chat_history');
        return response()->json(['message' => 'Riwayat percakapan dihapus ✅']);
    }
}
