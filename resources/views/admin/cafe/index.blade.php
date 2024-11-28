@extends('layouts.admin')
@section('title', '管理者メニュー')

@section('content')
    <div class="container parent">
        <div class="row">
            <h2>管理者メニュー</h2>
        </div>
        <div class="row col-md-4">
                <a href="{{ route('admin.information.index') }}" role="button" class="btn btn-primary button-admin">お知らせ一覧</a>
        </div>
        <div class="row col-md-4">
                <a href="{{ route('admin.menu.index') }}" role="button" class="btn btn-primary button-admin">メニュー一覧</a>
        </div>
        <div class="row col-md-4">
                <a href="{{ route('admin.cafe.index') }}" role="button" class="btn btn-primary button-admin">予約確認</a>
        </div>
        <div class="col-md-2">
            @csrf
        </div>
    </div>
@endsection