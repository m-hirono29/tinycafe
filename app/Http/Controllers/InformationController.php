<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        $posts = Information::orderBy('announcement_date', 'desc')->get();
        return view('information.index', compact('posts'));
    }

    public function show($id)
    {
        $information = Information::findOrFail($id);
        return view('information.show', compact('information'));
    }
    
    public function store(Request $request) 
    { 
        $request->validate([ 
            'announcement_date' => 'required|date_format:Y-m-d', 
            'title' => 'required|string|max:255', 
            'body' => 'required|string', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
            ]); 
        
        $imagePath = null; 
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images'); 
            
        } 
        
        Information::create([ 
            'announcement_date' => $request->announcement_date, 
            'title' => $request->title, 
            'body' => $request->body, 
            'image_path' => $imagePath, 
            ]); 
            
            return redirect()->route('information.index'); 
    }
}