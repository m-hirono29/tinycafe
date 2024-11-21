@extends('layouts.admin')
@section('title', 'メニューの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>メニュー編集</h2>
                <form action="{{ route('admin.menu.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="category">カテゴリ</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="category">{{ $menu_form->category }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="menu_name">メニュー名</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="menu_name">{{ $menu_form->menu_name }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="price">価格</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="price">{{ $menu_form->price }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中： {{ $menu_form->image_path }}
                            </div>
                            <div class="form-check">
                                <lebel class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </lebel>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $menu_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection