<?php

namespace App\Http\Requests\Dashboard\Questions;

use Illuminate\Foundation\Http\FormRequest;

class EditQuestionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {                            
        return [
            'id' => 'required|exists:questions',
            'title' => 'required|min:3',
            'description' => 'required|min:3'
        ];
    }
}
