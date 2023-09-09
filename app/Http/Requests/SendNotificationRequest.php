<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SendNotificationRequest extends FormRequest
{
    const MESSAGE_MAX_LENGTH = 150;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => [
                Rule::exists(Category::class, 'id'),
                'required'
            ],
            'message' => 'required|string|max:' . self::MESSAGE_MAX_LENGTH,
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Property category_id is required',
            'category_id.exists' => 'Category: ' . $this->category_id . ' not found',
            'message.required' => 'Property message is required',
            'message.max' => 'Message max length are 150 characters'
        ];
    }
}
