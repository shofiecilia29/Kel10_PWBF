<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        switch($this->method()){
            case "POST":

            return [
                'name' => ['required', 'unique:categories'],
                'category_id' => 'nullable'
            ];
            case "PUT":
            case "PATCH":
            return [
                'name' => ['required', 'unique:categories,name,' . $this->route()->category->id],
                'category_id' => 'nullable'
            ];
            default: break;
        }
        
    }
}
