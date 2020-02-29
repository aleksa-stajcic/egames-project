<?php 

namespace App\Http\Models;

use Illuminate\Support\Str;

class TestModel {
    public $name = 'mika';

    public function charge($amount)
    {
        return [
            'amount' => $amount,
            'confirmation_number' => Str::random()
        ];
    }

}
