<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BlogRequest extends FormRequest
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
            'title' => "required|string|max:100",
            'content' => "required|string",
            'category' => 'required|array',
            'category.*' => "numeric|exists:categories,id"
        ];
    }

    /**
     * Redirect back with error message
     */
    protected function failedValidation(Validator $validator)
    {
        $response = [
            'succes' => false,
            'message' => $validator->errors()->first()
        ];
        throw new HttpResponseException(response()->json($response));
    }
}
