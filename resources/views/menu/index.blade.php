@extends('layouts.front')

@section('title', 'メニュー')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>ドリンクメニュー</h2>
                    <div class="menu-container">
                        <ul> 
                        @foreach($drinkMenus as $menu) 
                            <li class="menu-item">
                                <span>{{ $menu->menu_name }}</span>
                                <span>¥{{ $menu->price }}</span>
                                <img src="{{ Storage::url('public/image/' . $menu->image_path) }}" class="fixed-size" alt="Image">
                            </li> 
                            <hr color="#c0c0c0">
                        @endforeach 
                    </ul>
                        
                    </div>
                    
            </div>
            <div class="col-md-10 mx-auto">
                <h2>フードメニュー</h2>
                    <div class="menu-container">
                        <ul> 
                        @foreach($foodMenus as $menu) 
                            <li class="menu-item">
                                <span>{{ $menu->menu_name }}</span>
                                <span>{{ $menu->price }}</span>
                                <img src="{{ Storage::url('public/image/' . $menu->image_path) }}" class="fixed-size" alt="Image"></li> 
                            <hr color="#c0c0c0">
                        @endforeach
                        </ul>
                    </div>
            </div>
            <div class="col-md-10 mx-auto">
                <h2>デザートメニュー</h2>
                <hr color="#c0c0c0">
                    <ul> 
                        @foreach($desertMenus as $menu) 
                            <li>{{ $menu->menu_name }}　　 　 {{ $menu->price }}　　　　　　
                            <img src="{{ Storage::url('public/image/' . $menu->image_path) }}" class="fixed-size" alt="Image"></li> 
                            <hr color="#c0c0c0">
                        @endforeach
                    </ul>
            </div>
            <div class="col-md-10 mx-auto">
                <h2>セットメニュー</h2>
                <hr color="#c0c0c0">
                    <ul> 
                        @foreach($setMenus as $menu) 
                            <li>{{ $menu->menu_name }}　　 　 {{ $menu->price }}　　　　　　
                            <img src="{{ Storage::url('public/image/' . $menu->image_path) }}" class="fixed-size" alt="Image"></li> 
                            <hr color="#c0c0c0">
                        @endforeach
                    </ul>
            </div>
        </div>
    </div>
@endsection
