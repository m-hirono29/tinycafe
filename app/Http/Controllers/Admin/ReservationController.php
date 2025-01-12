<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationController extends Controller
{
    //
   public function index(Request $request) 
    { 
        // 検索条件
        $cond_name = $request->input('cond_name');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // クエリビルダの初期設定
        $query = Reservation::query();

        // 表示期間を設定
        if ($start_date) {
            $query->where('reservation_date', '>=', $start_date);
        }
        if ($end_date) {
            $query->where('reservation_date', '<=', $end_date);
        }

        // 期間指定がない場合に、昨日以前の予約を非表示に
        if (!$start_date && !$end_date) {
            $query->where('reservation_date', '>', Carbon::yesterday()->toDateString());
        }

        // 予約日で昇順に並び替え
        $reservations = $query->orderBy('reservation_date', 'asc')->get();

        return view('admin.reservation.index', [
            'reservations' => $reservations,
            'cond_name' => $cond_name,
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);
    }
    
    public function edit($id)
    {
        // 予約情報を取得
        $reservation_form = Reservation::find($id);

        if (!$reservation_form) {
        return redirect()->route('admin.reservation.index')->with('error', '予約が見つかりませんでした。');
    }

    return view('admin.reservation.edit', ['reservation_form' => $reservation_form]);
    }



    public function update(Request $request, $id)
    {
        $reservation_form = Reservation::find($id);

        if (!$reservation_form) {
        return redirect()->route('admin.reservation.edit', ['id' => $id])->with('error', '予約が見つかりませんでした。');
    }

        $input = $request->all(); 
        // `remarks` が空の場合のデフォルト値を設定 
        $input['remarks'] = $input['remarks'] ?? 'なし';

        $reservation_form->fill($input)->save();

    return redirect()->route('admin.reservation.edit', ['id' => $reservation_form->id])->with('success', '予約が更新されました。');
    }


}

