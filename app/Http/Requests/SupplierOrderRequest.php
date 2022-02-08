<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cheese_type_id' => 'required|numeric',
            'name'=>'required',
            'amount'=>'required',
            'delivery_date'=>'required',
            'delivery_notes'=>'required',

        ];
    }
}
