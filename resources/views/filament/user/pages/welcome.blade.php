<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: {
          sans: ['Inter', 'sans-serif'],
        },
      },
    },
  }
</script>

<div>
  <div class="flex flex-col justify-center h-screen px-4 gap-4 ">
      <h1 class="text-5xl font-semibold mb-4 w-lg w-3/4 leading-tight">
        Solusi Cerdas untuk Infrastruktur Jalan yang Lebih Baik.
      </h1>
      <p class="max-w-2xl text-gray-400">
        Platform pelaporan jalan rusak yang memudahkan Anda mengirim laporan dan memantau kondisi jalan secara real-time melalui peta interaktif. Bersama, kita wujudkan jalan yang lebih aman dan nyaman.
      </p>
      <button onclick="window.location.href='laporan/create'" class="mt-6 border border-[#FBBD23] bg-[#5B5725]/10 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-lg w-fit">
          Buat Laporan
      </button>
  </div>

  <div class="flex flex-col px-4 mb-10">
    <div>
      <h1 class="text-3xl font-semibold mb-4 w-lg w-3/4 leading-tight ">Apa itu SIPIJAR?</h1>
    </div>
    <div>
      <p class="max-w-2/3 text-gray-400 mt-4">
        SIPIJAR (Sistem Informasi Pemantauan dan Pemeliharaan Jalan Berkelanjutan) adalah platform digital yang memudahkan masyarakat melaporkan kerusakan jalan secara cepat dan akurat. Dengan teknologi peta interaktif dan pelaporan real-time, SIPIJAR membantu menciptakan infrastruktur jalan yang lebih aman, nyaman, dan terkelola dengan baik.
      </p>
      <div>
        <p class="my-4 mb-4">
          Melalui platform ini, siapa pun dapat:
        </p>
        <div class="flex flex-col gap-4">
          <div class="flex flex-row gap-2 rounded-md border border-[#FBBD23] bg-[#5B5725]/10 w-fit p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FBBD23" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <p class="text-[#FBBD23]">Melaporkan kerusakan jalan secara cepat dan akurat</p>
          </div>
          <div class="flex flex-row gap-2 rounded-md border border-[#FBBD23] bg-[#5B5725]/10 w-fit p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FBBD23" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <p class="text-[#FBBD23]">Melihat kondisi jalan di berbagai wilayah secara langsung</p>
          </div>
          <div class="flex flex-row gap-2 rounded-md border border-[#FBBD23] bg-[#5B5725]/10 w-fit p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FBBD23" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <p class="text-[#FBBD23]">Memantau perkembangan laporan yang telah dikirim</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="flex flex-col px-4 my-20">
    <h1 class="text-3xl font-semibold mb-4 w-lg w-3/4 leading-tight ">Fitur Utama</h1>
    <div class="flex flex-row justify-between mt-10">
      <!-- card -->
      <div class="flex flex-col px-4 rounded-lg w-64 border border-[#2c2c2c] bg-white/5 py-10">
        <div class="flex justify-center mb-4">
          <div class="rounded-md border border-[#FBBD23] bg-[#5B5725]/10 w-fit p-2">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8.88709 6.17014V16.1322M16.1323 8.88707V18.8492M16.7396 23.0731L22.6263 20.1304C23.0864 19.9009 23.3774 19.43 23.3774 18.9156V3.83961C23.3774 2.83011 22.3148 2.17322 21.4116 2.62483L16.7396 4.96019C16.3569 5.15219 15.9064 5.15219 15.5249 4.96019L9.49447 1.9462C9.30588 1.85193 9.09793 1.80286 8.88709 1.80286C8.67624 1.80286 8.46829 1.85193 8.2797 1.9462L2.393 4.88895C1.93173 5.11959 1.64192 5.59052 1.64192 6.10372V21.1797C1.64192 22.1892 2.70455 22.8461 3.60778 22.3945L8.2797 20.0591C8.66249 19.8671 9.1129 19.8671 9.49447 20.0591L15.5249 23.0743C15.9077 23.2651 16.3581 23.2651 16.7396 23.0743V23.0731Z" stroke="#FBBD23" stroke-width="1.81129" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
        </div>
        <div class="flex flex-col gap-2 items-center">
          <p class="text-white font-semibold">Peta Interaktif</p>
          <p class="text-gray-400 text-center">Lihat kondisi dan laporan jalan rusak secara real-time.</p>
        </div>
      </div>
      <div class="flex flex-col px-4 rounded-lg w-64 border border-[#2c2c2c] bg-white/5 py-10">
        <div class="flex justify-center mb-4">
          <div class="rounded-md border border-[#FBBD23] bg-[#5B5725]/10 w-fit p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FBBD23" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
            </svg>
          </div>
        </div>
        <div class="flex flex-col gap-2 items-center">
          <p class="text-white font-semibold">Lapor Jalan Rusak</p>
          <p class="text-gray-400 text-center">Kirim laporan dengan foto dan lokasi hanya dalam beberapa langkah.</p>
        </div>
      </div>
      <div class="flex flex-col px-4 rounded-lg w-64 border border-[#2c2c2c] bg-white/5 py-10">
        <div class="flex justify-center mb-4">
          <div class="rounded-md border border-[#FBBD23] bg-[#5B5725]/10 w-fit p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FBBD23" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>
          </div>
        </div>
        <div class="flex flex-col gap-2 items-center">
          <p class="text-white font-semibold">Riwayat Laporan</p>
          <p class="text-gray-400 text-center">Pantau status laporan yang telah Anda kirim.</p>
        </div>
      </div>
      <div class="flex flex-col px-4 rounded-lg w-64 border border-[#2c2c2c] bg-white/5 py-10">
        <div class="flex justify-center mb-4">
          <div class="rounded-md border border-[#FBBD23] bg-[#5B5725]/10 w-fit p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FBBD23" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
          </div>
        </div>
        <div class="flex flex-col gap-2 items-center">
          <p class="text-white font-semibold">Notifikasi</p>
          <p class="text-gray-400 text-center">Dapatkan update jika laporan Anda ditindaklanjuti.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- footer -->

  <div class="border-t border-[#2c2c2c]">
    <div class="flex flex-row justify-center px-4 gap-20 py-10 text-center">
      <div class="flex flex-col gap-4">
        <p class="text-sm font-bold">Contact</p>
        <div class="flex flex-row gap-2 items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
          </svg>
          <a href="#" class="text-sm font-light text-gray-400">mail@example.com</a>
        </div>
        <div class="flex flex-row gap-2 items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
          </svg>
          <a href="#" class="text-sm font-light text-gray-400">+62 123 456 789</a>
        </div>
      </div>
      <div class="flex flex-col gap-4">
          <p class="text-sm font-bold">SIPIJAR</p>
          <a href="#" class="text-sm font-light text-gray-400">Tentang Kami</a>
          <a href="#" class="text-sm font-light text-gray-400">Kebijakan Privasi</a>
          <a href="#" class="text-sm font-light text-gray-400">Syarat dan Ketentuan</a>
      </div>
      <div class="flex flex-col gap-4">
        <p class="text-sm font-bold">Follow Us</p>
        <a href="#" class="text-sm font-light text-gray-400">Instagram</a>
        <a href="#" class="text-sm font-light text-gray-400">LinkedIn</a>
        <a href="#" class="text-sm font-light text-gray-400">Twitter</a>
        <a href="#" class="text-sm font-light text-gray-400">Medium</a>
      </div>
    </div>
    <div>
      <p class="text-sm text-gray-400 text-center py-4">Copyright © 2025 SIPIJAR – Sistem Informasi Pemantauan dan Pemeliharaan Jalan Berkelanjutan | Versi 1.0.0</p>
    </div>
  </div>
</div>
