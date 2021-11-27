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
            'trailer_id' => 'required|unique:trailers,trailer_id,' . $this->trailer->id,
            'year' => 'required|size:4',
            'make' => 'required|max:30',
            'model' => 'required|max:30',
            'equip_type_id' => 'required|max:30|min:1|exists:equipment_type,equip_type_id',
            'vin' => 'required|vin_code|unique:trailers,vin,' . $this->trailer->id,
            'comments' => 'max:500|nullable|string|min:1',
            'tag_expiration' => 'required|date',
            'last_inspection' => 'required|date',
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
