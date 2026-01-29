<?php

namespace App\Http\Controllers;

use App\Models\Glossarium;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class GlosariumController extends Controller
{
    /**
     * Display a listing of glossarium
     */
    public function index()
    {
        $glossarium = Glossarium::orderBy('istilah', 'asc')->get();
        $firstItem = $glossarium->first();
        
        if ($firstItem) {
            return redirect()->route('glossarium.show', $firstItem->id);
        }
        
        return view('glossarium.show', ['item' => null, 'allItems' => $glossarium]);
    }

    /**
     * Show single glossarium with navigation
     */
    public function show($id): View
    {
        $allItems = Glossarium::orderBy('istilah', 'asc')->get();
        $item = Glossarium::findOrFail($id);
        
        // Find current index
        $currentIndex = $allItems->search(function($glossarium) use ($id) {
            return $glossarium->id == $id;
        });
        
        // Get previous and next
        $previous = $currentIndex > 0 ? $allItems[$currentIndex - 1] : null;
        $next = $currentIndex < $allItems->count() - 1 ? $allItems[$currentIndex + 1] : null;
        
        return view('glossarium.show', compact('item', 'allItems', 'previous', 'next', 'currentIndex'));
    }
}
