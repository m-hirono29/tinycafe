<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Rules\HourlyInterval;
use Carbon\Carbon;

class ReservationController extends Controller
{
    // 予約フォームの表示
    public function create()
    {
        // 明日の日付を取得
        $tomorrow = Carbon::tomorrow()->format('Y-m-d');
        // 1ヶ月後の日付を取得
        $oneMonthLater = Carbon::now()->addMonth()->format('Y-m-d');

        // ビューに日付を渡す
        return view('reservation.create', compact('tomorrow', 'oneMonthLater'));
    }
    
    // 予約データの保存
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'reserved_name' => 'required',
            'phonenumber' => ['required', 'regex:/^(\d{2,4}-\d{1,4}-\d{4})$/'],
            'Email' => 'required|email',
            'reservation_date' => 'required|date',
            'reservation_time' => ['required', 'date_format:H:i', new HourlyInterval],
            'number_of_people' => 'required|integer|min:1|max:10',
            'remarks' => 'nullable|string'
        ]);
        
        // 予約情報の取得
        $reservationDate = $request->input('reservation_date');
        $reservationTime = $request->input('reservation_time');
        $numberOfPeople = $request->input('number_of_people');
        
        // 既存予約の取得
        $existingReservations = Reservation::where('reservation_date', $reservationDate)
                                           ->where('reservation_time', $reservationTime)
                                           ->get();
        
        // 合計人数の計算
        $totalPeople = $existingReservations->sum('number_of_people');
        
        // 定員オーバーの確認
        if ($totalPeople + $numberOfPeople > 10) {
            // 予約オーバーエラーメッセージ
            return redirect()->back()->withErrors(['reservation_error' => '予約人数が定員を超えています。別の時間を選択してください。']);
        }

        // 予約データの保存
        $reservation = new Reservation($request->all());
        $reservation['status'] = '1';
        $reservation['remarks'] = $request->input('remarks') ?? '';
        $reservation->save();

        return redirect()->route('reservation.create')->with('success', '予約が完了しました！');
    }
    
    // 予約人数の取得
    public function getPeopleCount(Request $request) 
    {
        $date = $request->input('date');
        $time = $request->input('time');
        
        // 指定された日付と時間に予約があるかチェック
        $existingReservations = Reservation::where('reservation_date', $date)
                                           ->where('reservation_time', $time)
                                           ->get();
    
        // 予約人数の合計を計算
        $totalPeople = $existingReservations->sum('number_of_people');
    
        // 予約人数が0の場合は残り10席を選べるように
        $remainingSeats = 10 - $totalPeople;
    
        // もし残りの席が負の数になった場合、0にしておく
        if ($remainingSeats < 0) {
            $remainingSeats = 0;
        }
    
        // 残りの席数を返す
        return response()->json(['count' => $totalPeople, 'remainingSeats' => $remainingSeats]);
    }

}
