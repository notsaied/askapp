<?php

namespace App\Http\Requests\Dashboard\Ads;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'started_at' => 'required',
            'expired_at' => 'required'
        ];
    }
}
