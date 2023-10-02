<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        
       
        if (Str::contains(strtolower($query), ['main', 'contacts'])) {
          
            if (Str::contains(strtolower($query), 'main')) {
                return redirect('/');
            } elseif (Str::contains(strtolower($query), 'contacts')) {
                return redirect('contacts');
            }
        }
        
        
        return view('search.results', compact('query', 'results'));
    }
}