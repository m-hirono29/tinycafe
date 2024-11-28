@extends('layouts.admin')
@section('title', '登録済みメニューの一覧')

@section('content')
    <div class="container col-md-10">
        <div class="row">
            <h2>メニュー一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.menu.add') }}" role="button" class="btn btn-primary button-admin">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.menu.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary button-admin" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-menu col-md-10 mx-auto">
                <div class="row">
                    <table class="table-admin">
                        <thead>
                            <tr>
                                <th width="10%">id</th>
                                <th width="20%">カテゴリ</th>
                                <th width="20%">メニュー名</th>
                                <th width="20%">価格</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $menu)
                                <tr>
                                    <td>{{ $menu->id }}</td>
                                    <td>{{ Str::limit($menu->category, 100) }}</td>
                                    <td>{{ Str::limit($menu->menu_name, 100) }}</td>
                                    <td>{{ Str::limit($menu->price, 50) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('admin.menu.edit', ['id' => $menu->id]) }}">編集</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection