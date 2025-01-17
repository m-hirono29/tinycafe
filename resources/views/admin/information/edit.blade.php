@extends('layouts.information')
@section('title', 'お知らせの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>お知らせ編集</h2>
                <form action="{{ route('admin.information.update', $information_form->id) }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="announcement_date">周知日</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="announcement_date">{{ $information_form->announcement_date }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="title">{{ $information_form->title }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body">{{ $information_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-information">
                                設定中： {{ $information_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="{{ $information_form->id }}">
                            @csrf
                            <div class="d-flex justify-content-between">
                                    <!-- 更新ボタン -->
                                <input type="submit" class="btn btn-primary button-admin" value="更新">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection