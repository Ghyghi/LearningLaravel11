<?php

namespace App\Http\Requests\V1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class storeTaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'body' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'priority' => ['required', 'string', Rule::in(['Low', 'Medium', 'High'])],
            'assignedTo' => ['required', 'exists:users,id'],
            'userId' => ['required', 'exists:users,id'],
            'status' => ['required', Rule::in(['None', 'In Progress', 'Completed'])],
        ];
    }
        protected function prepareForValidation()
        {
            $this->merge([
                'user_id' => $this->userId,
            ]);
        }
    
}
