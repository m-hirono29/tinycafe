<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    // 
    protected $guarded = array('id');
    
    // バリデーションルールの設定
    public static $rules = array(
        'reserved_name' => 'required',
        'phonenumber' => ['required', 'regex:/^(\d{2,4}-\d{1,4}-\d{4})$/'],
        'Email' => 'required|email',
        'reservation_date' => 'required|date',
        'reservation_time' => 'required|date_format:H:i',
        'number_of_people' => 'required|integer',
        'remarks' => 'nullable|string',
        'status' => 'required|string',
        );
}

