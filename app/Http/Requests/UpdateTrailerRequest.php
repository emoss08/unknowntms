<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrailerRequest extends FormRequest
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
            'trailer_id' => 'required',
            'year' => 'required|size:4',
            'make' => 'required',
            'model' => 'required',
            'equip_type_id' => 'required',
            'vin' => 'required|vin_code',
            'comments' => 'max:500'
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
            'comments.max' => 'Comments may not exceed 500 characters'
        ];
    }

    public function attributes()
    {
        return [
            'status' => 'Status',
            'year' => 'Year',
            'make' => 'Make',
            'equip_type_id' => 'Equipment Type',
            'model' => 'Model',
            'vin' => 'VIN',
            'comments' => 'Comments'

        ];
    }
}
