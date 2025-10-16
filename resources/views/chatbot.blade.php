<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Robi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .fade-slide-up {
    opacity: 0;
    transform: translateY(-50px);
    transition: all 0.7s ease-in-out;
    }

    /* 🔒 Sembunyikan scrollbar (tapi tetap bisa scroll) */
    #chat-box {
      scrollbar-width: none; /* Firefox */
      -ms-overflow-style: none; /* IE/Edge lama */
    }
    #chat-box::-webkit-scrollbar {
      display: none; /* Chrome, Safari */
    }
  </style>
</head>

<!-- 🔧 Ganti bagian ini -->
<body class="h-screen flex flex-col bg-[linear-gradient(to_bottom,white_0%,white_60%,#ABD469_100%)] overflow-hidden">

  <div class="max-w-7xl mx-auto w-full relative flex flex-col flex-1 overflow-hidden">

    <!-- Tombol back -->
    <div class="fixed top-4 left-4 z-50">
      <a href="/" class="text-gray-600 hover:text-gray-800 bg-white shadow rounded-full p-2 flex items-center justify-center transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 19l-7-7 7-7" />
        </svg>
      </a>
    </div>

    <!-- Intro -->
    <div id="intro-section" class="flex-shrink-0 flex flex-col items-center text-center px-6 pt-16 transition-all duration-700 ease-in-out">
      <img src="/images/robi.png" alt="Robi" class="max-w-[60px] h-auto mb-3 object-contain" />
      <h2 class="text-xl font-bold mb-1">Kenalan sama Robi yuk!</h2>
      <p class="text-gray-600 mb-4 text-md">Aku bukan manusia, tapi aku bisa jadi teman ngobrolmu 😉</p>

      <div id="menu-buttons" class="flex gap-2 flex-wrap justify-center mb-4">
        <button class="menu-button px-4 py-2 border-2 rounded-full hover:bg-gray-100 transition text-sm">Fasilitas sekolah</button>
        <button class="menu-button px-4 py-2 border-2 rounded-full hover:bg-gray-100 transition text-sm">Syarat SPMB</button>
        <button class="menu-button px-4 py-2 border-2 rounded-full hover:bg-gray-100 transition text-sm">Jurusan</button>
      </div>
    </div>

    <!-- Chat area -->
    <div id="chat-box" class="flex-1 overflow-y-auto px-6 sm:px-10 lg:px-16 space-y-3 pb-4 mt-4 scroll-smooth">
      <!-- isi chat muncul di sini -->
    </div>

    <!-- Input bawah -->
    <div class="flex-shrink-0 px-4 pb-3 bg-transparent">
      <form id="chat-form" class="flex items-center bg-white rounded-full shadow px-3 py-2">
        <input 
          type="text" 
          id="message" 
          maxlength="300" 
          placeholder="Cobain ketik apa aja, aku bakal coba jawab 😎"
          class="flex-1 outline-none text-sm px-2"
          autocomplete="off"
        >
        <button 
          type="submit"
          class="bg-[#699D15] text-white p-2 rounded-full hover:bg-green-600 transition flex items-center justify-center"
          id="send-btn"
        >
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 24 24" class="w-5 h-5">
            <path d="M2.01 21 23 12 2.01 3 2 10l15 2-15 2z"/>
          </svg>
        </button>
      </form>

      <p class="text-[13px] text-gray-600 mt-2 text-center">
        Robi dapat membuat kesalahan. Periksa kembali informasi penting dengan 
        <a href="#" class="underline">pihak sekolah</a>.
      </p>
    </div>
  </div>


  <script>
  // 🧹 Anti-spam cooldown (2 detik antar kirim)
  let lastSendTime = 0;

  // 🧼 Sanitasi teks (anti XSS)
  const sanitize = (text) => {
    const div = document.createElement("div");
    div.textContent = text;
    return div.innerHTML;
  };

  // 🔗 Format link otomatis
  function formatBotMessageWithLinks(text) {
    const parts = [];
    const regex = /(https?:\/\/[^\s]+)/g;
    let lastIndex = 0, match;
    while ((match = regex.exec(text)) !== null) {
      if (match.index > lastIndex) parts.push({ type: 'text', content: text.slice(lastIndex, match.index) });
      parts.push({ type: 'link', content: match[0] });
      lastIndex = regex.lastIndex;
    }
    if (lastIndex < text.length) parts.push({ type: 'text', content: text.slice(lastIndex) });
    return parts;
  }

  // 📱 Tombol cepat FAQ
  document.querySelectorAll(".menu-button").forEach(btn => {
    btn.addEventListener("click", () => {
      const input = document.getElementById("message");
      input.value = btn.textContent;
      document.getElementById("chat-form").dispatchEvent(new Event("submit"));
    });
  });

  // 💬 Event kirim pesan
  document.getElementById('chat-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const input = document.getElementById('message');
    const chatBox = document.getElementById('chat-box');
    const submitBtn = document.getElementById('send-btn');

    const now = Date.now();
    if (now - lastSendTime < 2000) return; // ⏳ Batasi 1 pesan / 2 detik
    lastSendTime = now;

    const message = sanitize(input.value.trim());
    if (!message) return;

    // Limit pesan supaya gak flooding
    if (message.length > 300) {
      alert("Pesan terlalu panjang! Maksimal 300 karakter.");
      return;
    }

    input.disabled = true;
    submitBtn.disabled = true;
    submitBtn.classList.add("opacity-50", "cursor-not-allowed");

    // Animasi intro
    const intro = document.getElementById('intro-section');
    if (intro && !intro.classList.contains('fade-slide-up')) {
      intro.classList.add('fade-slide-up');
      setTimeout(() => intro.remove(), 700);
    }

    // Tampilkan pesan user
    const timestamp = new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
    chatBox.insertAdjacentHTML('beforeend', `
      <div class="flex justify-end flex-col items-end space-y-1 px-2">
        <span class="bg-[#699D15] text-white px-4 py-2 rounded-2xl shadow-sm max-w-[80%] break-words whitespace-pre-line">${message}</span>
        <span class="text-[10px] text-gray-500">${timestamp}</span>
      </div>`);
    chatBox.scrollTo({ top: chatBox.scrollHeight, behavior: 'smooth' });

    // Tampilkan animasi "Robi mengetik..."
    const typingId = "typing-" + Date.now();
    chatBox.insertAdjacentHTML('beforeend', `
      <div id="${typingId}" class="flex justify-start flex-col space-y-1 px-2">
        <span class="bg-gray-200 text-gray-600 px-4 py-2 rounded-2xl inline-block animate-pulse max-w-[80%] whitespace-pre-line">
          Robi sedang mengetik...
        </span>
      </div>`);
    chatBox.scrollTo({ top: chatBox.scrollHeight, behavior: 'smooth' });

    try {
      const res = await fetch("{{ url('/chatbot') }}", {
        method: "POST",
        headers: { 
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ message })
      });

      document.getElementById(typingId)?.remove();

      if (!res.ok) throw new Error("Server error: " + res.status);
      const data = await res.json();

      const botTimestamp = new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
      const botMessage = document.createElement("div");
      botMessage.className = "flex justify-start flex-col space-y-1 items-start px-2";
      botMessage.innerHTML = `
        <div class="flex items-start space-x-2">
          <img src="/images/robi.png" alt="Robi" class="w-8 h-auto object-contain" />
          <span class="bg-gray-200 text-gray-800 px-4 py-2 rounded-2xl shadow-sm max-w-[80%] break-words whitespace-pre-line"></span>
        </div>
        <span class="text-[10px] text-gray-500 ml-10">${botTimestamp}</span>
      `;
      chatBox.appendChild(botMessage);

      // Ketik satu per satu biar natural
      const span = botMessage.querySelector("span.bg-gray-200");
      const textParts = formatBotMessageWithLinks(sanitize(data.reply || "Hmm... saya gak yakin nih 😅"));
      let i = 0, j = 0;

      function typeNext() {
        if (i >= textParts.length) {
          input.disabled = false;
          submitBtn.disabled = false;
          submitBtn.classList.remove("opacity-50", "cursor-not-allowed");
          input.focus();
          return;
        }
        const part = textParts[i];
        if (part.type === 'text') {
          if (j < part.content.length) {
            span.innerHTML += part.content.charAt(j);
            j++;
            chatBox.scrollTo({ top: chatBox.scrollHeight });
            setTimeout(typeNext, 10);
          } else { i++; j = 0; typeNext(); }
        } else {
          const a = document.createElement('a');
          a.href = part.content; a.target = "_blank";
          a.className = "underline text-blue-600 hover:text-blue-800";
          a.textContent = part.content;
          span.appendChild(a);
          i++; typeNext();
        }
      }
      typeNext();
    } catch (err) {
      console.error("Chatbot error:", err);
      document.getElementById(typingId)?.remove();
      chatBox.insertAdjacentHTML('beforeend', `
        <div class="flex justify-start text-red-500 text-sm px-2">
          ⚠️ Gagal menghubungi server. Coba lagi nanti.
        </div>`);
      input.disabled = false;
      submitBtn.disabled = false;
      submitBtn.classList.remove("opacity-50", "cursor-not-allowed");
    }

    input.value = "";
  });

  window.addEventListener("load", async () => {
    try {
      await fetch("{{ url('/chatbot/reset') }}", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        }
      });
      console.log("✅ Riwayat chat direset (refresh page).");
    } catch (e) {
      console.warn("Gagal reset chat:", e);
    }
  });
  </script>
</body>
</html>
