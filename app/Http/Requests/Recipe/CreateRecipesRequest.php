<?php

namespace App\Http\Requests\Recipe;

use Illuminate\Foundation\Http\FormRequest;

class CreateRecipesRequest extends FormRequest
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
            'name' => 'required|unique:recipes',
            'type' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'main_ingredient' => 'required',
            'ingredients' => 'required',
            'nutritional_value' => 'required',
            'cost' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'image' => 'required|image',
        ];
    }
}
