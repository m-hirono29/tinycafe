@extends('layouts.admin')
@section('title', '登録済みお知らせの一覧')

@section('content')
    <div class="container col-md-10">
        <div class="row">
            <h2>お知らせ一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <form action="{{ route('admin.information.index') }}" method="get">
                    <div class="form-group row justify-content-end">
                        <label class="col-md-1">タイトル</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2 space-sarch">
                            @csrf
                            <input type="submit" class="btn btn-primary button-admin" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-information col-md-10 mx-auto">
                <div class="row">
                    <table class="table-admin">
                        <thead>
                            <tr>
                                <th width="5%">id</th>
                                <th wicth="5%">周知日</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $information)
                                <tr>
                                    <td>{{ $information->id }}</td>
                                    <td>{{ Str::limit($information->announcement_date, 100) }}</td>
                                    <td>{{ Str::limit($information->title, 100) }}</td>
                                    <td>{{ Str::limit($information->body, 50) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('admin.information.edit', ['id' => $information->id]) }}">編集</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <div class="col-md-10 justify-content-end">
                <a href="{{ route('admin.information.add') }}" role="button" class="btn btn-primary button-admin space-infocreate">新規作成</a>
                <a href="{{ route('admin.cafe.index') }}" class="btn btn-secondary button-admin space-admin float-end">管理者ページに戻る</a>
            </div>
        </div>
    </div>
@endsection