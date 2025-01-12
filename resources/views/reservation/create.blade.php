{{-- layouts/front.blade.phpを読み込む --}}
@extends('layouts.front')


{{-- front.blade.phpの@yield('title')に'予約登録'を埋め込む --}}
@section('title', '予約登録')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<!-- JQueryの読み込み開始 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    $(function(){
     // 人数の更新
async function updatePeopleCount() {
    const date = document.getElementById('reservation_date').value;
    const time = document.getElementById('reservation_time').value;
    const numberOfPeopleSelect = document.getElementById('number_of_people');

    numberOfPeopleSelect.innerHTML = '';  // 既存の選択肢を消去

    if (date && time) {
        try {
            console.log(`Sending request to /api/get-people-count?date=${date}&time=${time}`);
            const response = await fetch(`/api/get-people-count?date=${date}&time=${time}`);
            const data = await response.json();
            console.log('Received data:', data);

            const count = data.count;
            let remainingSeats = data.remainingSeats;

            // もし remainingSeats が null の場合、10人まで選択肢を表示
            if (remainingSeats === null) {
                remainingSeats = 10;
            }

            if (remainingSeats > 0) {
                // 残りの席数に応じてオプションを表示
                for (let i = 1; i <= remainingSeats; i++) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.textContent = i;
                    numberOfPeopleSelect.appendChild(option);
                }
            } else {
                // 満席の場合
                const option = document.createElement('option');
                option.value = '';
                option.textContent = '満席です';
                option.disabled = true;
                numberOfPeopleSelect.appendChild(option);
            }
        } catch (error) {
            console.error('Error fetching people count:', error);
            alert('人数の取得に失敗しました。もう一度試してください。');
        }
    }
}

       // 予約日・時間変更時に人数更新
        $('#reservation_date, #reservation_time').on('change', updatePeopleCount);
    });
    </script>
        
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>予約登録</h2><br>
                <form id="reservationForm" method="post" action="{{ route('reservation.store') }}">
                {{ csrf_field() }}
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if (session('success'))
                        <ul>
                           <li>{{ session('success') }}</li>
                        </ul>
                    @else
                    <div class="form-group row mb-1">
                        <label class="col-md-3">予約日</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="reservation_date" id="reservation_date" min="{{ $tomorrow }}" max="{{ $oneMonthLater }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-1"> 
                        <label class="col-md-3">予約時間</label> 
                        <div class="col-md-8">
                            <select id="reservation_time" class="form-control" name="reservation_time" required> 
                                @foreach (range(11, 18) as $hour) 
                                    <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option> 
                                @endforeach 
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-md-3">人数</label>
                        <div class="col-md-8">
                             <select name="number_of_people" id="number_of_people" class="form-select custom-select" required>
                                <option value="">選択してください</option>
                                <!-- JavaScriptでオプションを動的に生成 -->
                            </select>
                            @error('number_of_people') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-md-3">名前</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="reserved_name" value="{{ old('reserved_name') }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-md-3">電話番号</label>
                        <div class="col-md-8">
                            <input type="tel" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}" required pattern="^\d{2,4}-\d{2,4}-\d{4}$" title="電話番号はハイフン付きの形式で入力してください（例：090-1234-5678）">
                            @error('phonenumber') 
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-md-3">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="Email" value="{{ old('Email') }}" required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" title="有効なメールアドレスを入力してください">
                        </div>
                    </div>
                    
                    <div class="form-group row mb-1">
                        <label class="col-md-3">備考</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="remarks" value="{{ old('remarks') }}">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <div class="col-md-8 offset-md-3">
                            <input type="submit" class="btn btn-primary button-front" value="登録">
                        </div>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection