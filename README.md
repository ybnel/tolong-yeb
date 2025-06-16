### **Panduan Setup Proyek Laravel "Cineplex" (dengan Docker & Sail)**

**Untuk Setiap Anggota Tim:**

**Prasyarat Wajib (Instal Ini Dulu):**

1.  **Docker Desktop:**
    *   Unduh & instal dari [https://www.docker.com/products/docker-desktop/](https://www.docker.com/products/docker-desktop/).
    *   **Penting saat instalasi (Centang):** `✅ Use WSL 2 instead of Hyper-V (recommended)`.
    *   Setelah instalasi, **WAJIB restart komputer**.
    *   **Pastikan Docker Desktop Berjalan:** Buka aplikasi Docker Desktop (ikon paus di Start Menu), tunggu sampai statusnya "Engine running" di kiri bawah atau ikonnya stabil di system tray.

2.  **WSL2 (Windows Subsystem for Linux 2) & Distro Linux (Ubuntu Disarankan):**
    *   Buka **Command Prompt (CMD) atau PowerShell sebagai Administrator**.
    *   Jalankan: `wsl --install`
    *   **Jika ada error:** Kalau muncul error `HCS_E_SERVICE_NOT_AVAILABLE` atau sejenisnya, berarti kamu harus:
        *   Buka "Turn Windows features on or off" (ketik di Start Menu).
        *   Pastikan `Virtual Machine Platform` dan `Windows Hypervisor Platform` dicentang.
        *   **WAJIB restart komputer** setelah mencentang fitur-fitur ini.
        *   Coba lagi `wsl --install`.
    *   Setelah instalasi WSL berhasil, dia akan meminta kamu membuat username dan password untuk Linux-mu.

3.  **PHP CLI di WSL (Ubuntu):**
    *   Buka terminal WSL (cari "Ubuntu" di Start Menu).
    *   Jalankan:
        ```bash
        sudo apt update
        sudo apt install php8.3-cli php8.3-xml
        ```
    *   Ini menginstal PHP Command Line Interface dan ekstensi `xml` (penting untuk Sail).

4.  **Git:** Unduh & instal dari [https://git-scm.com/downloads](https://git-scm.com/downloads).

5.  **VS Code:** (Sangat Disarankan) Unduh & instal dari [https://code.visualstudio.com/](https://code.visualstudio.com/).
    *   Install *extension* "Remote - WSL" (biasanya otomatis terinstal kalau WSL ada).

---

**Langkah-langkah Setup Proyek (Setelah Prasyarat Dipenuhi):**

1.  **Buka Proyek di VS Code (Menggunakan WSL Remote):**
    *   Buka VS Code.
    *   Tekan `Ctrl + Shift + P` (Command Palette).
    *   Ketik `Remote-WSL: Open Folder in WSL...` lalu pilih.
    *   **PENTING:** Navigasikan ke direktori di **dalam filesystem Linux WSL** (`/home/username_wsl/projects/` misalnya). **JANGAN** buka dari drive Windows (`/mnt/c/...` atau `/mnt/p/...`).
    *   Setelah memilih folder di WSL, VS Code akan reload dan terhubung ke WSL.

2.  **Clone Proyek "Cineplex" dari Git:**
    *   Di terminal VS Code yang sudah terhubung ke WSL (promptnya `user@wsl-distro:...$`), masuk ke folder tempat kamu ingin menyimpan proyek (misal `cd ~/projects`).
    *   Clone proyek:
        ```bash
        git clone https://github.com/REPOSIITORY_URL_KALIAN/theaterapp.git
        cd theaterapp # Masuk ke folder proyek
        ```
    *   Buat salinan file `.env` dari contoh:
        ```bash
        cp .env.example .env
        ```

3.  **Jalankan Laravel Sail & Setup Awal:**
    *   **Pastikan Docker Desktop "Running".** (Cek ikon paus di system tray Windows).
    *   **Instal konfigurasi Sail** (ini akan membuat `docker-compose.yml`):
        ```bash
        php artisan sail:install
        ```
        *   Saat ditanya service, **pilih `mysql`** (tekan Spacebar), lalu Enter untuk konfirmasi.

4.  **Sesuaikan `.env` untuk Database & Redis:**
    *   Buka file `.env` di VS Code (yang ada di root proyek).
    *   Ubah bagian `DB_HOST`, `DB_USERNAME`, `DB_PASSWORD` untuk MySQL:
        ```dotenv
        DB_CONNECTION=mysql
        DB_HOST=mysql         # Harus 'mysql'
        DB_PORT=3306
        DB_DATABASE=theaterapp # Pastikan sama dengan di Docker Compose atau sesuai
        DB_USERNAME=sail      # Default username Sail
        DB_PASSWORD=password  # Default password Sail
        ```
    *   Ubah juga `REDIS_HOST`:
        ```dotenv
        REDIS_HOST=redis      # Harus 'redis'
        ```
    *   **Simpan file `.env`**.

5.  **Generate `APP_KEY` & Clear Cache:**
    *   Di terminal WSL:
        ```bash
        ./vendor/bin/sail artisan key:generate
        ./vendor/bin/sail artisan optimize:clear
        ```

6.  **Jalankan Lingkungan Sail (Docker Containers):**
    *   Ini akan men-download image Docker dan menjalankan semua service. **Ini akan memakan waktu pertama kali.**
    *   ```bash
        ./vendor/bin/sail up -d
        ```

7.  **Instal Dependensi Composer & Jalankan Migrasi/Seeder:**
    *   Setelah `sail up -d` selesai (kamu bisa cek dengan `./vendor/bin/sail ps`):
        ```bash
        ./vendor/bin/sail composer install # Instal dependensi PHP di dalam container
        ./vendor/bin/sail artisan migrate  # Jalankan semua migrasi database
        ./vendor/bin/sail artisan db:seed  # Isi database dengan data dummy
        ```

8.  **Akses Aplikasi di Browser:**
    *   Buka browser dan ketik: `http://localhost`
    *   Seharusnya muncul halaman Laravel. Jika 404, coba *hard refresh* (Ctrl+Shift+R).
