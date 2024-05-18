<?php

namespace App\Http\Requests\Photo;

use Illuminate\Foundation\Http\FormRequest;

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
            'album_id'     => ['required'],
            'title'        => ['required', 'string', 'max:255'],
            'description'  => ['nullable', 'string'],
            'image'        => ['nullable', 'image:jpg,jpeg,png,webp', 'max:3000']
        ];
    }

    public function messages()
    {
        return [
            'album_id.required' => 'The album field is required',
            'image.image:jpg,jpeg,png,webp' => 'Request validation: An extension is not permited',
            'image.max:3000' => 'Max image size is 3000Kb'
        ];
    }    
}
