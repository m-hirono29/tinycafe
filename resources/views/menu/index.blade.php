@extends('layouts.front')

@section('title', 'メニュー')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>メニュー</h2>
                <hr color="#c0c0c0">
                    <ul> 
                        @foreach($menus as $menu) 
                            <li>{{ $menu->menu_name }}　　 　 ¥{{ $menu->price }}　　　　　　
                            <img src="{{ Storage::url('public/image/' . $menu->image_path) }}" class="fixed-size" alt="Image"></li> 
                            <hr color="#c0c0c0">
                        @endforeach 
                    </ul>
            </div>
        </div>
    </div>
@endsection
