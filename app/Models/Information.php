<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    // 以下を追記
    protected $table = 'informations';
    
    protected $guarded = array('id');

    public static $rules = array(
        'announcement_date' => 'required|date',
        'title' => 'required',
        'body' => 'required',
    );
}
