{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yeild('title')に'メニューの新規作成'を埋め込む --}}
@section('title', 'メニューの新規作成')

{{-- admin.blade.phpの@yeils('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>メニュー新規作成</h2><br>
                <form action="{{ route('menu.create') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3">メニューカテゴリ</label>
                        <div class="col-md-8">
                            <select name="category">
                                <option>ドリンク</option>
                                <option>フード</option>
                                <option>デザート</option>
                                <option>セット</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">メニュー名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="menu_name" value="{{ old('menu_name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">価格</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">画像</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    @csrf
                    <div class="migiyosetest">
                        <input type="submit" class="btn btn-primary button-admin" value="投稿">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection