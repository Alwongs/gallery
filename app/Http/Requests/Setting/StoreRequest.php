<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreRequest extends FormRequest
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
            'is_site_open'         => ['nullable'],
            'admin_items_per_page' => ['required'],
            'site_items_per_page'  => ['required'],
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'event.required' => 'Request validation: A title is required',
    //     ];
    // }
}