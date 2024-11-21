@extends('layouts.front')

@section('title', $information->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>{{ $information->title }}</h1>
                <br>
                <p>{!! nl2br(e($information->body)) !!}</p>
                @if ($information->image_path) 
                    <div class="post-image mt-3">
                        <img src="{{ Storage::url('public/image/' . $information->image_path) }}" class="img-fluid" alt="Image">
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

