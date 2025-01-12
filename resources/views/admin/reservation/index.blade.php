@extends('layouts.admin')
@section('title', '予約一覧')

@section('content')
    <div class="container col-md-10">
        <div class="row">
            <h2>予約一覧</h2>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.reservation.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-6"></label>
                        <div class="col-md-2">
                            <input type="date" class="form-control" name="start_date" value="{{ request()->input('start_date') }}">
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control" name="end_date" value="{{ request()->input('end_date') }}">
                        </div>
                        <div class="col-md-1">
                            @csrf
                            <input type="submit" class="btn btn-primary button-admin" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-reservation col-md-10 mx-auto">
                <div class="row">
                    <table class="table-admin">
                        <thead>
                            <tr>
                                <th width="10%">予約日</th>
                                <th width="10%">予約時間</th>
                                <th width="5%">人数</th>
                                <th width="20%">予約者氏名</th>
                                <th width="15%">電話番号</th>
                                <th width="20%">メールアドレス</th>
                                <th width="15%">ステータス</th>
                                <th width="5%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->reservation_date }}</td>
                                <td>{{ $reservation->reservation_time }}</td>
                                <td>{{ $reservation->number_of_people }}</td>
                                <td>{{ $reservation->reserved_name }}</td>
                                <td>{{ $reservation->phonenumber }}</td>
                                <td>{{ $reservation->Email }}</td>
                                <td>
                                    @if ($reservation->status == 1) 
                                        予約済 
                                    @elseif ($reservation->status == 9) 
                                        キャンセル 
                                    @else 
                                        未知のステータス 
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <a href="{{ route('admin.reservation.edit', ['id' => $reservation->id]) }}">編集</a>
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
            <div class="col-md-11">
                <a href="{{ route('admin.cafe.index') }}" class="btn btn-secondary button-admin float-end">管理者ページに戻る</a>
            </div>
        </div>
    </div>
@endsection