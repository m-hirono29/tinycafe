@extends('layouts.admin')
@section('title', '予約詳細')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>予約詳細</h2>
                <form action="{{ route('admin.reservation.update', ['id' => $reservation_form->id]) }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="reserved_name">名前</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="reserved_name">{{ $reservation_form->reserved_name }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="phonenumber">電話番号</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="phonenumber">{{ $reservation_form->phonenumber }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="Email">メールアドレス</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="Email">{{ $reservation_form->Email }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="reservation_date">予約日</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="reservation_date" value="{{ $reservation_form->reservation_date }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="reservation_time">予約時間</label>
                        <div class="col-md-10">
                            <input type="time" class="form-control" name="reservation_time" value="{{ $reservation_form->reservation_time }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="number_of_people">人数</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control" name="number_of_people" value="{{ $reservation_form->number_of_people }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="remarks">備考</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="remarks">{{ $reservation_form->remarks }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row"> 
                        <label class="col-md-2" for="status">ステータス</label>
                        <div class="col-md-10">
                            <select name="status" class="form-control">{{ $reservation_form->status }}
                                <option value="1" {{ $reservation_form->status == 1 ? 'selected' : '' }}>予約済</option> 
                                <option value="9" {{ $reservation_form->status == 9 ? 'selected' : '' }}>キャンセル</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $reservation_form->id }}"> 
                            @csrf
                            <input type="submit" class="btn btn-primary button-admin" value="更新">
                        </div>
                    </div>
                </form>
                <div class="mt-3"> 
                    <a href="{{ route('admin.reservation.index') }}" class="btn btn-secondary button-admin">予約一覧に戻る</a> 
                </div>
            </div>
        </div>
    </div>
@endsection