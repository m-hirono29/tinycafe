<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class HourlyInterval implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) 
    { 
        // 予約時間が1時間単位であることを確認 
        return preg_match('/^([01]?[0-9]|2[0-3]):00$/', $value); 
    } 
    
    public function message()
    {
        return '予約時間は1時間単位で入力してください。'; 
    }
}
