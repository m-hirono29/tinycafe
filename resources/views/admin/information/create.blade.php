{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yeild('title')に'お知らせの新規作成'を埋め込む --}}
@section('title', 'お知らせの新規作成')

{{-- admin.blade.phpの@yeild('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>お知らせ新規作成</h2><br>
                <form action="{{ route('information.create') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3">周知日</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="announcement_date" value="{{ old('announcement_date') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">本文</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
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
                        <input type="submit" class="btn btn-primary" value="投稿">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection