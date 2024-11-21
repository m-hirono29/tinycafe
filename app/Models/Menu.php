<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    // 追記
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'category' => 'required',
        'menu_name' => 'required',
        'price' => 'required',
        );
}
