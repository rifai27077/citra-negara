<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Robi - Asisten Citra Negara</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Load Marked.js to parse Markdown into HTML -->
  <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
  <!-- Load Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    .fade-slide-up {
      opacity: 0;
      transform: translateY(-20px);
      transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* 🔒 Sembunyikan scrollbar (tapi tetap bisa scroll) */
    #chat-box {
      scrollbar-width: thin; /* Firefox */
      scrollbar-color: rgba(0,0,0,0.1) transparent;
    }
    #chat-box::-webkit-scrollbar {
      width: 6px;
    }
    #chat-box::-webkit-scrollbar-thumb {
      background: rgba(0,0,0,0.1);
      border-radius: 10px;
    }

    /* Premium Glassmorphism */
    .glass-effect {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-top: 1px solid rgba(255, 255, 255, 0.5);
    }

    /* Bot message Markdown formatting */
    .prose {
      font-size: 0.95rem;
      line-height: 1.5;
      color: #374151; /* gray-700 */
    }
    .prose p { margin-bottom: 0.5rem; }
    .prose p:last-child { margin-bottom: 0; }
    .prose strong { font-weight: 600; color: #111827; }
    .prose ul { list-style-type: disc; margin-left: 1.25rem; margin-top: 0.25rem; margin-bottom: 0.5rem; }
    .prose ol { list-style-type: decimal; margin-left: 1.25rem; margin-top: 0.25rem; margin-bottom: 0.5rem; }
    .prose li { margin-bottom: 0.25rem; }
    .prose a { color: #2563eb; text-decoration: none; font-weight: 500; }
    .prose a:hover { text-decoration: underline; }
    .prose h1, .prose h2, .prose h3 { font-weight: 600; color: #111827; margin-top: 0.75rem; margin-bottom: 0.25rem; }

    /* Bubble Animations */
    .message-appear {
      animation: popIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }
    @keyframes popIn {
      0% { opacity: 0; transform: scale(0.95) translateY(10px); }
      100% { opacity: 1; transform: scale(1) translateY(0); }
    }

    .typing-dot {
      animation: blink 1.4s infinite both;
    }
    .typing-dot:nth-child(2) { animation-delay: 0.2s; }
    .typing-dot:nth-child(3) { animation-delay: 0.4s; }
    @keyframes blink {
      0% { opacity: 0.2; }
      20% { opacity: 1; }
      100% { opacity: 0.2; }
    }
  </style>
</head>

<body class="h-screen flex flex-col bg-gradient-to-br from-gray-50 via-green-50 to-gray-100 overflow-hidden">

  <!-- Setup Top Navbar/Header -->
  <div class="glass-effect flex-shrink-0 flex items-center justify-between px-6 py-4 shadow-sm z-10 w-full">
    <div class="flex items-center gap-4">
      <a href="/" class="text-gray-500 hover:text-green-600 transition bg-white/50 rounded-full p-2 hover:bg-white shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
        </svg>
      </a>
      <div class="flex items-center gap-3">
        <div class="relative">
          <img src="/images/robi.png" alt="Robi" class="w-10 h-10 object-contain drop-shadow" />
          <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></div>
        </div>
        <div>
          <h1 class="text-md font-bold text-gray-800 leading-tight">Chat Robi</h1>
          <p class="text-xs font-medium text-green-600">Selalu Aktif (AI)</p>
        </div>
      </div>
    </div>
  </div>

  <div class="max-w-4xl mx-auto w-full relative flex flex-col flex-1 overflow-hidden">

    <!-- Intro Box -->
    <div id="intro-section" class="flex-shrink-0 flex flex-col items-center text-center px-6 pt-10 pb-6 transition-all duration-700 ease-in-out">
      <div class="bg-white/60 backdrop-blur-md p-6 rounded-3xl shadow-sm border border-white/50 max-w-lg w-full">
        <h2 class="text-xl font-bold text-gray-800 mb-2">Halo! Aku Robi 👋</h2>
        <p class="text-gray-600 mb-5 text-sm">Aku asisten virtual otomatis dari Sekolah Citra Negara. Pilih topik cepat atau langsung ketik pertanyaanmu di bawah!</p>

        <div id="menu-buttons" class="flex gap-2 flex-wrap justify-center">
          <button class="menu-button px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-full hover:bg-green-50 hover:border-green-200 hover:text-green-700 transition font-medium text-sm shadow-sm">🎯 Jurusan Sekolah</button>
          <button class="menu-button px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-full hover:bg-green-50 hover:border-green-200 hover:text-green-700 transition font-medium text-sm shadow-sm">📝 Syarat PPDB</button>
          <button class="menu-button px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-full hover:bg-green-50 hover:border-green-200 hover:text-green-700 transition font-medium text-sm shadow-sm">🏢 Fasilitas</button>
        </div>
      </div>
    </div>

    <!-- Chat Area -->
    <div id="chat-box" class="flex-1 overflow-y-auto px-4 sm:px-8 py-6 space-y-5 scroll-smooth">
      <!-- Bot Intro Message -->
      <div class="flex justify-start items-end space-x-2 px-2 message-appear">
        <img src="/images/robi.png" alt="Robi" class="w-8 h-8 object-contain mb-5 drop-shadow-sm flex-shrink-0" />
        <div class="flex flex-col space-y-1 items-start max-w-[85%]">
          <div class="bg-white border border-gray-100 text-gray-800 px-5 py-3 rounded-2xl rounded-bl-sm shadow-sm prose">
            <p>Selamat datang! Ada yang bisa aku bantu seputar pendaftaran, jurusan, atau info umum dari SMP, SMA, dan SMK Citra Negara?</p>
          </div>
          <span class="text-[10px] font-medium text-gray-400 pl-1">Baru saja</span>
        </div>
      </div>
      <!-- Messages will appear here -->
    </div>

    <!-- Input Box Area -->
    <div class="flex-shrink-0 px-4 sm:px-8 pb-4 pt-2 glass-effect w-full relative z-20">
      <form id="chat-form" class="flex items-end bg-white border border-gray-300 rounded-3xl shadow-sm focus-within:ring-2 focus-within:ring-green-400 focus-within:border-transparent transition-all p-1.5 pl-4">
        <textarea 
          id="message" 
          rows="1"
          maxlength="500" 
          placeholder="Tanyakan sesuatu ke Robi..."
          class="flex-1 outline-none text-sm text-gray-700 bg-transparent resize-none py-3 max-h-[80px]"
          style="min-height: 44px;"
        ></textarea>
        <button 
          type="submit"
          class="bg-[#8AC636] text-white p-3 rounded-full hover:bg-[#76a92e] transition-colors flex items-center justify-center flex-shrink-0 shadow-md ml-2 mb-0.5"
          id="send-btn"
        >
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 ml-0.5">
            <path d="M2.01 21 23 12 2.01 3 2 10l15 2-15 2z"/>
          </svg>
        </button>
      </form>

      <p class="text-[11px] font-medium text-gray-400 mt-3 text-center">
        AI dapat membuat kesalahan. Harap verifikasi syarat dan biaya pendaftaran terbaru dengan pihak sekolah.
      </p>
    </div>
  </div>

  <script>
  let lastSendTime = 0;

  // Render konfigurasi marked (amankan dari raw HTML injection tapi tetap mem-parse Markdown ke HTML)
  marked.setOptions({
    breaks: true, // Ubah enter menjadi <br>
    gfm: true, // GitHub Flavored Markdown (Tabel, Tasklist, dll)
  });

  // Auto-resize textarea
  const textarea = document.getElementById("message");
  textarea.addEventListener("input", function() {
    this.style.height = "auto";
    this.style.height = (this.scrollHeight < 80 ? this.scrollHeight : 80) + "px";
  });
  
  // Submit on Enter (tap Shift+Enter for new line)
  textarea.addEventListener("keydown", function(e) {
    if (e.key === "Enter" && !e.shiftKey) {
      e.preventDefault();
      document.getElementById("chat-form").dispatchEvent(new Event("submit"));
    }
  });

  // Quick Action Buttons
  document.querySelectorAll(".menu-button").forEach(btn => {
    btn.addEventListener("click", () => {
      const input = document.getElementById("message");
      input.value = btn.textContent.replace(/[^\w\s]/gi, '').trim(); // Hilangkan emoji saat dipakai pesan
      document.getElementById("chat-form").dispatchEvent(new Event("submit"));
    });
  });

  // Handle send message
  document.getElementById('chat-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const input = document.getElementById('message');
    const chatBox = document.getElementById('chat-box');
    const submitBtn = document.getElementById('send-btn');

    const now = Date.now();
    if (now - lastSendTime < 2000) return; // 2 sec cooldown
    lastSendTime = now;

    const rawMessage = input.value.trim();
    if (!rawMessage) return;

    if (rawMessage.length > 500) {
      alert("Pesan terlalu panjang! Maksimal 500 karakter.");
      return;
    }

    input.disabled = true;
    submitBtn.disabled = true;
    submitBtn.classList.add("opacity-50", "cursor-not-allowed");

    // Hide intro
    const intro = document.getElementById('intro-section');
    if (intro && !intro.classList.contains('fade-slide-up')) {
      intro.classList.add('fade-slide-up');
      setTimeout(() => intro.style.display = 'none', 700);
    }

    // Tampilkan pesan user
    const timestamp = new Date().toLocaleTimeString('id-ID', {hour: '2-digit', minute:'2-digit'});
    
    // Ganti newline dengan <br> untuk user text agar rapi
    const formattedUserMsg = rawMessage.replace(/\n/g, '<br>');

    chatBox.insertAdjacentHTML('beforeend', `
      <div class="flex justify-end flex-col items-end space-y-1 px-2 message-appear">
        <div class="bg-[#8AC636] text-white px-5 py-3 rounded-2xl rounded-br-sm shadow-md max-w-[85%] text-sm leading-relaxed">
          ${formattedUserMsg}
        </div>
        <span class="text-[10px] font-medium text-gray-400 pr-1">${timestamp}</span>
      </div>`);
    
    chatBox.scrollTo({ top: chatBox.scrollHeight, behavior: 'smooth' });

    // Animasi "Robi mengetik..."
    const typingId = "typing-" + Date.now();
    chatBox.insertAdjacentHTML('beforeend', `
      <div id="${typingId}" class="flex justify-start items-end space-x-2 px-2 message-appear">
        <img src="/images/robi.png" alt="Robi" class="w-8 h-8 object-contain mb-5 drop-shadow-sm flex-shrink-0" />
        <div class="bg-white border border-gray-100 px-5 py-4 rounded-2xl rounded-bl-sm shadow-sm flex items-center space-x-1.5">
          <div class="w-1.5 h-1.5 bg-gray-400 rounded-full typing-dot"></div>
          <div class="w-1.5 h-1.5 bg-gray-400 rounded-full typing-dot"></div>
          <div class="w-1.5 h-1.5 bg-gray-400 rounded-full typing-dot"></div>
        </div>
      </div>`);
    chatBox.scrollTo({ top: chatBox.scrollHeight, behavior: 'smooth' });

    // Panggil API Backend
    try {
      const res = await fetch("{{ url('/chatbot') }}", {
        method: "POST",
        headers: { 
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ message: rawMessage })
      });

      document.getElementById(typingId)?.remove();

      if (!res.ok) throw new Error("Server error: " + res.status);
      const data = await res.json();

      const botTimestamp = new Date().toLocaleTimeString('id-ID', {hour: '2-digit', minute:'2-digit'});
      
      // Parse markdown menggunakan marked.js
      const parseMarkdown = marked.parse(data.reply || "Maaf, aku tidak tahu harus menjawab apa 😅");

      chatBox.insertAdjacentHTML('beforeend', `
        <div class="flex justify-start items-end space-x-2 px-2 message-appear">
          <img src="/images/robi.png" alt="Robi" class="w-8 h-8 object-contain mb-5 drop-shadow-sm flex-shrink-0" />
          <div class="flex flex-col space-y-1 items-start max-w-[85%]">
            <div class="bg-white border border-gray-100 text-gray-800 px-5 py-4 rounded-2xl rounded-bl-sm shadow-sm prose">
              ${parseMarkdown}
            </div>
            <span class="text-[10px] font-medium text-gray-400 pl-1">${botTimestamp}</span>
          </div>
        </div>
      `);
      
      chatBox.scrollTo({ top: chatBox.scrollHeight, behavior: 'smooth' });

    } catch (err) {
      console.error("Chatbot error:", err);
      document.getElementById(typingId)?.remove();
      chatBox.insertAdjacentHTML('beforeend', `
        <div class="flex justify-center text-red-500 text-xs px-2 message-appear bg-red-50 py-2 rounded-full border border-red-100 mx-auto mt-2">
          ⚠️ Gagal menghubungi server. Server sedang sibuk.
        </div>`);
    }

    // Reset state
    input.value = "";
    input.style.height = "auto";
    input.disabled = false;
    submitBtn.disabled = false;
    submitBtn.classList.remove("opacity-50", "cursor-not-allowed");
    input.focus();
  });

  // Reset chat context saat direfresh
  window.addEventListener("load", async () => {
    try {
      await fetch("{{ url('/chatbot/reset') }}", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        }
      });
    } catch (e) {
      console.warn("Gagal reset chat context:", e);
    }
  });
  </script>
</body>
</html>
