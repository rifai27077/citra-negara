<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use App\Models\Faq;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $ip = $request->ip();

        // ⏳ Batasi agar tidak spam
        if (RateLimiter::tooManyAttempts("chatbot:$ip", 3)) {
            return response()->json([
                'reply' => 'Tunggu sebentar ya, Robi lagi mikir dulu... 🧠'
            ], 429);
        }
        RateLimiter::hit("chatbot:$ip", 3);

        $message = trim($request->input('message'));

        // 🔒 Validasi input minimum
        if (strlen($message) < 3 || str_word_count($message) < 1) {
            return response()->json([
                'reply' => "Pertanyaanmu agak kurang jelas nih, bisa dijelaskan lebih detail? 😊"
            ]);
        }

        // 🧠 Ambil history chat dari session (tanpa login)
        $chatHistory = session()->get('chat_history', []);

        // Tambahkan pesan user
        $chatHistory[] = ['role' => 'user', 'content' => $message];

        $reply = "Hmm... saya belum tahu jawabannya.";

        // 🔹 Coba cari dulu di FAQ
        [$faqReply, $confidence] = $this->faqFallback($message);

        if ($confidence >= 60) {
            $reply = $faqReply;
        } else {
            // 🔹 Jika tidak cocok di FAQ, tanya ke model AI (Groq)
            $reply = $this->askGroq($chatHistory);

            if ($reply === null || strlen($reply) < 10) {
                $reply = $faqReply ?: "Maaf, saya belum tahu jawabannya.";
            }
        }

        // 🔹 Simpan balasan bot ke session
        $chatHistory[] = ['role' => 'assistant', 'content' => $reply];

        // Simpan maksimal 10 percakapan terakhir di session
        session(['chat_history' => array_slice($chatHistory, -10)]);

        return response()->json([
            'reply' => $reply,
            'history' => $chatHistory // bisa dipakai untuk debugging / tampilan
        ]);
    }

    private function askGroq(array $chatHistory)
    {
        try {
            // 🧩 Tambahkan sistem prompt agar Groq tahu konteks chatbot
            $messages = array_merge([
                [
                    'role' => 'system',
                    'content' => "
Kamu adalah chatbot sekolah bernama Robi 🤖.
Kamu menjawab pertanyaan seputar *Sekolah Citra Negara* (alamat, jurusan, fasilitas, pendaftaran, kegiatan, guru, dan lain-lain).
Kalau pertanyaannya di luar topik sekolah, tetap jawab dengan sopan dan singkat (maksimal 3 kalimat),
dan usahakan mengaitkannya ke sekolah.
Gunakan bahasa santai dan mudah dipahami anak sekolah.
                    ",
                ]
            ], $chatHistory);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
                'Content-Type'  => 'application/json',
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                'model'    => 'llama-3.1-8b-instant',
                'messages' => $messages,
            ]);

            if ($response->successful()) {
                return $response->json()['choices'][0]['message']['content'] ?? null;
            }
        } catch (\Exception $e) {
            // Kamu bisa log error ke Laravel log
            \Log::error('Groq API error: ' . $e->getMessage());
            return null;
        }

        return null;
    }

    private function faqFallback($userQuestion)
    {
        $cleanUserQuestion = strtolower(trim(preg_replace("/[^a-z0-9\s]/", "", $userQuestion)));
        $domain = request()->getHost();

        // 🔹 Cari FAQ yang relevan untuk domain sekolah ini
        $faqs = Faq::with('aliases')
                    ->where(function ($q) use ($domain) {
            $q->where('domain', 'LIKE', "%citranegara.sch.id%")
            ->orWhereNull('domain');
        })          
        ->get();

        // 🔸 Cari dengan Scout (jika aktif)
        if (method_exists(Faq::class, 'search')) {
            $searchResults = Faq::search($cleanUserQuestion)->take(1)->get();
            if ($searchResults->isNotEmpty()) {
                $faq = $searchResults->first();
                return [$faq->answer, 95];
            }
        }

        // 🔸 Fuzzy matching manual
        $bestMatch = null;
        $highestScore = 0;

        foreach ($faqs as $faq) {
            $questions = array_map('trim', explode(',', strtolower($faq->question)));

            foreach ($questions as $q) {
                similar_text($cleanUserQuestion, $q, $percent);
                if ($percent > $highestScore) {
                    $highestScore = $percent;
                    $bestMatch = $faq;
                }
            }

            foreach ($faq->aliases as $alias) {
                similar_text($cleanUserQuestion, strtolower($alias->question), $percent);
                if ($percent > $highestScore) {
                    $highestScore = $percent;
                    $bestMatch = $faq;
                }
            }

            // 🔹 Tambahan: cocokkan kata kunci sederhana
            $keywords = explode(' ', $cleanUserQuestion);
            $matchCount = 0;
            foreach ($keywords as $word) {
                if (str_contains(strtolower($faq->question), $word) || 
                    $faq->aliases->contains(fn($a) => str_contains(strtolower($a->question), $word))) {
                    $matchCount++;
                }
            }

            if ($matchCount >= 2 && $matchCount > $highestScore / 10) {
                $highestScore += 15; // bonus untuk keyword match
                $bestMatch = $faq;
            }
        }

        if ($highestScore >= 40 && $bestMatch) {
            return [$bestMatch->answer, $highestScore];
        }

        return ["", 0];
    }

    // 🧹 Tambahan opsional: hapus history session (buat tombol “hapus percakapan”)
    public function resetChat()
    {
        session()->forget('chat_history');
        return response()->json(['message' => 'Riwayat percakapan dihapus ✅']);
    }
}
