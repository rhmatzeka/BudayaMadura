@echo off
REM ============================================
REM Run Laravel Commands dengan Laragon v6
REM Syntax: run-laragon.bat [command]
REM ============================================

set PHP_PATH=C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe
setlocal enabledelayedexpansion
set "PATH=C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64;%PATH%"

if "%1"=="" (
    echo Usage: run-laragon.bat [command]
    echo.
    echo Available commands:
    echo   serve          - Start Laravel development server
    echo   migrate        - Run database migrations
    echo   migrate:reset  - Reset database
    echo   seed           - Seed database with sample data
    echo   key            - Generate application key
    echo   tinker         - Open Laravel Tinker shell
    echo   [other]        - Any other Artisan command
    echo.
    echo Examples:
    echo   run-laragon.bat serve
    echo   run-laragon.bat migrate
    echo   run-laragon.bat db:seed
    pause
    exit /b 0
)

"%PHP_PATH%" artisan %*
