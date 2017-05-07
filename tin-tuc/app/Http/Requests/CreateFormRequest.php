<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
            'title'=>'required|max:255',
            'category'=>'required',
            'content'=>'required'
        ];
    }
    public function messages()
{
        return [
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'title.max'  =>'Bạn nhập quá 255 ký tự',
            'content.required'  => 'Bạn chưa nhập nội dung',
            'category.required' =>'Hãy nhập chuyên mục'
        ];
}
      
}
