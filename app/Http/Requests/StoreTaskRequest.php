<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'due_date' => 'nullable|date|after_or_equal:today',
            'slug' => [
                'required',
                'string',
                Rule::unique('tasks')->ignore($this->route('tasks')),
            ],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'title' => strip_tags($this->title),
        ]);
    }

    public function messages()
    {
        return [
            'title' => 'Title is required',
            'title.string' => 'Your task needs a name.',
            'slug.unique' => 'This slug is already taken. Please choose another.',
        ];
    }
}
