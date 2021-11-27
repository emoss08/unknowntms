<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrailerRequest extends FormRequest
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
            'status' => 'required|in:Active,Inactive',
            'trailer_id' => 'required|unique:trailers,trailer_id|max:15|min:1',
            'year' => 'required|size:4',
            'make' => 'required|max:30|min:1',
            'model' => 'required|max:30|min:1',
            'equip_type_id' => 'required|max:30|min:1|exists:equipment_type,equip_type_id',
            'equip_type_other' => 'required_if:equip_type_id,other',
            'vin' => 'required|vin_code|unique:trailers,vin,|unique:tractors,vin',
            'tag_expiration' => 'required|date',
            'last_inspection' => 'required|date',
            'comments' => 'max:500|min:1|nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'Status is required',
            'trailer_id.required' => 'Trailer ID is required',
            'trailer_id.unique' => 'Trailer ID is already taken',
            'year.required' => 'Year is required',
            'year.size' => 'Year must be 4 digits',
            'make.required' => 'Make is required',
            'model.required' => 'Model is required',
            'vin.required' => 'VIN is required',
            'vin.vin_code' => 'VIN must be a valid VIN code',
            'vin.unique' => 'VIN is already taken',
            'equip_type_id.required' => 'Equipment Type is required',
            'comments.max' => 'Comments must be less than 500 characters'
        ];
    }

    public function attributes()
    {
        return [
            'status' => 'Status',
            'year' => 'Year',
            'make' => 'Make',
            'model' => 'Model',
            'vin' => 'VIN',
            'comments' => 'Comments'

        ];
    }
}
