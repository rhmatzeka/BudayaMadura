@echo off
echo ============================================
echo E-Ensiklopedia Etnosaing Madura
echo ============================================
echo.
echo Starting Laragon...
start "" "C:\laragon\laragon.exe"
echo.
echo Waiting for services to start...
timeout /t 5 /nobreak >nul
echo.
echo Opening website in browser...
start "" "http://localhost/e-ensiklopedia/public/"
echo.
echo Website opened!
echo Keep Laragon running to use the website.
pause