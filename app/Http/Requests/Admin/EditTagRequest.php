<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditTagRequest extends FormRequest
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
            //
            'name'=> [
                'required',
                Rule::unique('tags')->ignore($this->id),
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.unique'=> "Tên tag đã tồn tại"
        ];
    }
}
