<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;

class MenuController extends Controller
{
    public function index() 
    { 
        $foodMenus = Menu::where('category','フード')->get(); // データベースからメニューを取得 
        $drinkMenus = Menu::where('category','ドリンク')->get();
        $desertMenus = Menu::where('category','デザート')->get();
        $setMenus = Menu::where('category','セット')->get();
        
        return view('menu.index', compact('foodMenus','drinkMenus','desertMenus','setMenus')); 
    }
    
    public function store(Request $request) 
    { 
        $imagePath = null; 
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images'); 
            
        } 
    }
}
