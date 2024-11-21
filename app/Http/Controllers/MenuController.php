<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;

class MenuController extends Controller
{
    public function index() 
    { 
        $menus = Menu::all(); // データベースからメニューを取得 
        
        return view('menu.index', compact('menus')); 
    }
    
    public function store(Request $request) 
    { 
        $imagePath = null; 
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images'); 
            
        } 
    }
}
