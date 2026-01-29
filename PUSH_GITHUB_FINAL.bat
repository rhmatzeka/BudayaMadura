@echo off
echo ========================================
echo PUSH TO GITHUB - E-ENSIKLOPEDIA
echo ========================================
echo.

cd /d C:\laragon\www\e-ensiklopedia

echo [1] Checking Git Status...
git status
echo.

echo [2] Adding all files...
git add .
echo.

echo [3] Committing changes...
git commit -m "Major Update: Add carousel, redesign Identitas & Keunggulan, implement Glosarium navigation, fix navbar & search box"
echo.

echo [4] Pushing to GitHub...
git push origin main
echo.

echo ========================================
echo PUSH COMPLETE!
echo ========================================
echo.

echo Check your GitHub repository:
echo https://github.com/rhmatzeka/BudayaMadura.git
echo.

pause
