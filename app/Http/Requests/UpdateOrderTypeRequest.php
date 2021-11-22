<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderTypeRequest extends FormRequest
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
            'order_type_id' => 'required|max:5|min:2',
            'status' => 'required',
            'description' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'Status is required',
            'order_type_id.required' => 'Order Type ID is required',
            'description.required' => 'Description is required',
            'description.max' => 'Description must be less than 255 characters',
        ];
    }

    public function attributes()
    {
        return [
            'status' => 'Status',
            'order_type_id' => 'Order Type ID',
            'description' => 'Description',
        ];
    }
}
