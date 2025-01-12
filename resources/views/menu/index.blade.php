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
                                    <!-- 画像が存在する場合のみ表示 -->
                                @if ($menu->image_path)
                                    <img src="{{ Storage::url('public/image/' . $menu->image_path) }}" class="fixed-size" alt="Image">
                                @else
                                    <!-- 画像がない場合は空のボックスを表示して同じ高さを確保 -->
                                    <div class="empty-image-box fixed-size"></div>
                                @endif
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
                                <span>¥{{ $menu->price }}</span>
                                <!-- 画像が存在する場合のみ表示 -->
                                @if ($menu->image_path)
                                    <img src="{{ Storage::url('public/image/' . $menu->image_path) }}" class="fixed-size" alt="Image">
                                @else
                                    <!-- 画像がない場合は空のボックスを表示して同じ高さを確保 -->
                                    <div class="empty-image-box fixed-size"></div>
                                @endif
                            </li> 
                            <hr color="#c0c0c0">
                        @endforeach
                        </ul>
                    </div>
            </div>
            <div class="col-md-10 mx-auto">
                <h2>デザートメニュー</h2>
                <div class="menu-container">
                    <ul> 
                        @foreach($desertMenus as $menu) 
                            <li class="menu-item">
                                <span>{{ $menu->menu_name }}</span>
                                <span>¥{{ $menu->price }}</span>
                                <!-- 画像が存在する場合のみ表示 -->
                                @if ($menu->image_path)
                                    <img src="{{ Storage::url('public/image/' . $menu->image_path) }}" class="fixed-size" alt="Image">
                                @else
                                    <!-- 画像がない場合は空のボックスを表示して同じ高さを確保 -->
                                    <div class="empty-image-box fixed-size"></div>
                                @endif
                            </li> 
                            <hr color="#c0c0c0">
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-10 mx-auto">
                <h2>セットメニュー</h2>
                <div class="menu-container">
                    <ul> 
                        @foreach($setMenus as $menu) 
                            <li class="menu-item">
                                <span>{{ $menu->menu_name }}</span>
                                <span>¥{{ $menu->price }}</span>
                                <!-- 画像が存在する場合のみ表示 -->
                                @if ($menu->image_path)
                                    <img src="{{ Storage::url('public/image/' . $menu->image_path) }}" class="fixed-size" alt="Image">
                                @else
                                    <!-- 画像がない場合は空のボックスを表示して同じ高さを確保 -->
                                    <div class="empty-image-box fixed-size"></div>
                                @endif
                            </li> 
                            <hr color="#c0c0c0">
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
