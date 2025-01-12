<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Menu;

class MenuController extends Controller
{
    public function add()
    {
        return view('admin.menu.create');
    }
    
    public function create(Request $request)
    {
        // 以下を追記
        // Validationを行う
        $this->validate($request, Menu::$rules);

        $menu = new Menu;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$menu->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $menu->image_path = basename($path);
        } else {
            $menu->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $menu->fill($form);
        $menu->save();

        return redirect('admin/menu');
    }
    
    // 追記
    public function index(Request $request)
    {
        $menu_name = $request->cond_title;
        if ($menu_name != '') {
            // 検索されたら検索結果を取得する
            $posts = Menu::where('menu_name', $menu_name)->get();
        } else {
            // それ以外はすべてのメニューを取得する
            $posts = Menu::all();
        }
        return view('admin.menu.index', ['posts' => $posts, 'menu_name' => $menu_name]);
    }
    
    public function edit(Request $request)
    {
        // Menu Modelからデータを取得する
        $menu = Menu::find($request->id);
        if (empty($menu)) {
            abort(404);
        }
        return view('admin.menu.edit', ['menu_form' => $menu]);
    }
    
    public function update(Request $request)
    {
        // Velidationをかける
        $this->validate($request, Menu::$rules);
        // Menu Modelからデータを取得する
        $menu = Menu::find($request->id);
        // 送信されてきたフォームデータを格納する
        $menu_form = $request->all();
        
        if ($request->remove == 'true') {
            $menu_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $menu_form['image_path'] = basename($path);
        } else {
            $menu_form['image_path'] = $menu->image_path;
        }
        
        unset($menu_form['image']);
        unset($menu_form['remove']);
        unset($menu_form['_token']);
        
        // 該当するデータを上書きして帆損する
        $menu->fill($menu_form)->save();
        
        return redirect('admin/menu');
    }
}
