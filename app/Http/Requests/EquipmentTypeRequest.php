<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentTypeRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;



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
            'status' => 'required',
            'description' => 'required|max:255',
        ];
    }

public function messages()
    {
        return [
            'status.required' => 'Status is required',
            'equip_type_id.required' => 'Equipment Type ID is required',
            'equip_type_id.unique' => 'Equipment Type ID is already taken',
            'description.required' => 'Description is required',
            'description.max' => 'Description must be less than 255 characters',
        ];
    }

    public function attributes()
    {
        return [
            'status' => 'Status',
            'equip_type_id' => 'Equipment Type ID',
            'description' => 'Description',
        ];
    }
}

