<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        $method = $this->method();

        if ($method == 'PUT' || $method == 'POST') {
            return [
                'name' => 'required',
                'profileImage' => 'required',
                'coverImage' => 'required'
            ];
        } else {
            return [
                'name' => 'sometimes | required',
                'profileImage' => 'sometimes | required',
                'coverImage' => 'sometimes | required'
            ];
        }
    }

    protected function prepareForValidation(): void
    {
        $this->profileImage ? $this->merge([
            'profile_img' => $this->profileImage
        ]) : '';

        $this->coverImage ? $this->merge([
            'cover_img' => $this->coverImage
        ]) : '';
    }
}
