<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommodityStoreRequest extends FormRequest
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
            'commodity_id' => 'required|profanity|max:5|min:2|unique:commodities,commodity_id',
            'status' => 'required',
            'description' => 'required|profanity|max:255',
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'Status is required',
            'commodity_id.required' => 'Commodity ID is required',
            'commodity_id.unique' => 'Commodity ID is already taken',
            'description.required' => 'Description is required',
            'description.max' => 'Description must be less than 255 characters',
        ];
    }

    public function attributes()
    {
        return [
            'status' => 'Status',
            'commodity_id' => 'Commodity ID',
            'description' => 'Description',
        ];
    }

}
