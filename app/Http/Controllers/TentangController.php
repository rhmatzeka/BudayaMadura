<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TentangController extends Controller
{
    /**
     * Display tentang index page
     */
    public function index(): View
    {
        return view('tentang.index');
    }

    /**
     * Display tujuan page
     */
    public function tujuan(): View
    {
        return view('tentang.tujuan');
    }

    /**
     * Display target pengguna page
     */
    public function targetPengguna(): View
    {
        return view('tentang.target-pengguna');
    }

    /**
     * Display keunggulan page
     */
    public function keunggulan(): View
    {
        return view('tentang.keunggulan');
    }

    /**
     * Display petunjuk penggunaan page
     */
    public function petunjukPenggunaan(): View
    {
        return view('tentang.petunjuk-penggunaan');
    }

    /**
     * Display pengenalan etnosains page
     */
    public function pengenalanEtnosains(): View
    {
        return view('tentang.pengenalan-etnosains');
    }
}
