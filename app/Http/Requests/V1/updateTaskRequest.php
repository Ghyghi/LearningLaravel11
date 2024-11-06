<?php

namespace App\Http\Requests\V1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class updateTaskRequest extends FormRequest
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
        $method = $this->getMethod();
        if($method == 'PUT'){
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
        else{
            return[
                'title' => ['sometimes', 'required'],
                'body' => ['sometimes','required'],
                'image' => ['sometimes','nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                'priority' => ['sometimes','required', 'string', Rule::in(['Low', 'Medium', 'High'])],
                'assignedTo' => ['sometimes','required', 'exists:users,id'],
                'userId' => ['sometimes','required', 'exists:users,id'],
                'status' => ['sometimes','required', Rule::in(['None', 'In Progress', 'Completed'])],
            ];
        }
    }
    protected function prepareForValidation()
    {
        if($this->userID){
            $this->merge([
                'user_id' => $this->userId,
            ]);
        }
    }
}
