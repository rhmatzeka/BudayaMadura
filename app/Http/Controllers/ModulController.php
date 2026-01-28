<?php

namespace App\Http\Controllers;

use App\Models\HalamanModul;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function index()
    {
        $halaman = HalamanModul::orderBy('urutan')->get();
        return view('modul.index', compact('halaman'));
    }

    public function show($slug)
    {
        $halaman = HalamanModul::where('slug', $slug)->firstOrFail();
        $allHalaman = HalamanModul::orderBy('urutan')->get();
        
        // Find previous and next page
        $currentIndex = $allHalaman->search(function($item) use ($halaman) {
            return $item->id === $halaman->id;
        });
        
        $previous = $currentIndex > 0 ? $allHalaman[$currentIndex - 1] : null;
        $next = $currentIndex < $allHalaman->count() - 1 ? $allHalaman[$currentIndex + 1] : null;
        
        return view('modul.show', compact('halaman', 'allHalaman', 'previous', 'next'));
    }
}