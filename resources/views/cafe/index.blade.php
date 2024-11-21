@extends('layouts.front')

@section('title', 'TINYCafe')

@section('content')
    <div class="row">
        <div class="posts col-md-8 mx-auto mt-3 information-box information-box p">
            @foreach($posts as $post)
                <div class="post">
                    <div class="row">
                        <div class="text col-md-6 d-flex align-items-center justify-content-between">
                            <div class="date">
                                {{ $post->announcement_date }}
                            </div>
                            <div class="title">
                                <a class="title" href="{{ route('information.show', ['id' => $post->id]) }}">{{ Str::limit($post->title, 150) }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="information-readmore mt-3">
                <a class="information-readmore" href="{{ route('information.index') }}">
                    すべてのお知らせを見る
                </a>
            </div>
        </div>
        <div class="col-md-7 mx-auto">
            <img src="{{ asset('storage/pancake.jpeg') }}" class="img-fluid" alt="Large Image">
        </div>
    </div>
@endsection