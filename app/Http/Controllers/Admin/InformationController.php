<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Information;

class InformationController extends Controller
{
    public function add()
    {
        return view('admin.information.create');
    }
    
    public function create(Request $request)
    {
        // 以下を追記
        // Validationを行う
        $this->validate($request, Information::$rules);

        $information = new Information;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$information->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $information->image_path = basename($path);
        } else {
            $information->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $information->fill($form);
        $information->save();

        return redirect('admin/information');
    }
    
    // 追記
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Information::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Information::all();
        }
        return view('admin.information.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
        // information Modelからデータを取得する
        $information = Information::find($request->id);
        if (empty($information)) {
            abort(404);
        }
        return view('admin.information.edit', ['information_form' => $information]);
    }
    
    public function update(Request $request)
    {
        // Velidationをかける
        $this->validate($request, Information::$rules);
        // information Modelからデータを取得する
        $information = Information::find($request->id);
        // 送信されてきたフォームデータを格納する
        $information_form = $request->all();
        
        if ($request->remove == 'true') {
            $information_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $information_form['image_path'] = basename($path);
        } else {
            $information_form['image_path'] = $information->image_path;
        }
        
        unset($information_form['image']);
        unset($information_form['remove']);
        unset($information_form['_token']);
        
        // 該当するデータを上書きして帆損する
        $information->fill($information_form)->save();
        
        return redirect('admin/information');
    }
}
