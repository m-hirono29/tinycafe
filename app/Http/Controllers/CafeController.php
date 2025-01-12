<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Information;

class CafeController extends Controller
{
    public function index(Request $request) { // 投稿を日付で並べ替えて取得 
        $posts = Information::orderBy('announcement_date', 'desc')->take(5)->get(); // 最初の投稿をheadlineとして取得 
        
        $headline = $posts->isNotEmpty() ? $posts->first() : null; 
        
        return view('cafe.index', ['headline' => $headline, 'posts' => $posts]);
    }
    
    public function show($id)
    { 
        $information = Information::findOrFail($id); 
        
        return view('information.show', compact('information'));
    }
    
    public function concept()
    {
        return view('cafe.concept');
    }
    
    public function reservation()
    {
        return view('reservation.create');
    }
}
