<?php

namespace App\Http\Controllers;

use App\Models\Glossarium;
use Illuminate\View\View;

class GlosariumController extends Controller
{
    /**
     * Display a listing of glossarium
     */
    public function index(): View
    {
        $glossarium = Glossarium::orderBy('istilah', 'asc')->paginate(20);
        return view('glossarium.index', compact('glossarium'));
    }

    /**
     * Search glossarium
     */
    public function search()
    {
        $search = request('q');
        
        if (strlen($search) < 1) {
            return view('glossarium.index', ['glossarium' => collect()]);
        }

        $glossarium = Glossarium::where('istilah', 'LIKE', "%{$search}%")
            ->orWhere('arti_istilah', 'LIKE', "%{$search}%")
            ->orWhere('kategori', 'LIKE', "%{$search}%")
            ->orderBy('istilah', 'asc')
            ->paginate(20)
            ->appends(['q' => $search]);

        return view('glossarium.index', compact('glossarium', 'search'));
    }

    /**
     * Filter glossarium by category
     */
    public function kategori($kategori): View
    {
        $glossarium = Glossarium::where('kategori', $kategori)
            ->orderBy('istilah', 'asc')
            ->paginate(20);
        return view('glossarium.index', compact('glossarium', 'kategori'));
    }
}
