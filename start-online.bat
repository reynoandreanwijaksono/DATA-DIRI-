@echo off
title Online-kan Portfolio Reyno
echo ====================================================
echo   Menjalankan Portfolio Reyno Andrean Wijaksono
echo ====================================================
echo.
echo 1. Menjalankan Laravel Server (Port 8000)...
start "Laravel Server" /min php artisan serve --port=8000
timeout /t 2 >nul
echo 2. Menghubungkan ke Domain Permanen ngrok...
echo.
echo ====================================================
echo   Link Website Permanen Anda:
echo   https://mooned-cavalry-astonish.ngrok-free.dev
echo ====================================================
echo.
.\ngrok.exe http 8000 --url=https://mooned-cavalry-astonish.ngrok-free.dev
pause
