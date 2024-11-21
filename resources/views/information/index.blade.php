@extends('layouts.front')

@section('title', 'すべてのお知らせ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>すべてのお知らせ</h2>
                <hr color="#c0c0c0">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6 d-flex align-items-center justify-content-between">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    <a class="title information-readmore" href="{{ route('information.show', ['id' => $post->id]) }}">{{ Str::limit($post->title, 150) }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection
