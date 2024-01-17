<?php

// app/Http/Requests/UpdatePriceRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePriceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'new_price' => 'required|numeric|min:0',
        ];
    }
}
