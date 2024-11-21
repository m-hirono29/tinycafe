@extends('layouts.admin')
@section('title', '管理者メニュー')

@section('content')
    <div class="container">
        <div class="row">
            <h2>管理者メニュー</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <a href="{{ route('admin.information.index') }}" role="button" class="btn btn-primary">お知らせ一覧</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <a href="{{ route('admin.menu.index') }}" role="button" class="btn btn-primary">メニュー一覧</a>
            </div>
        </div>
        <div class="col-md-2">
            @csrf
        </div>
    </div>
@endsection