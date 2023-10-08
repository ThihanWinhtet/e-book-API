<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

        $required = [
            'name' => 'required | string | max:255',
            'email' => 'required | email | unique:users',
            'password' => 'required | string | min:5',
            'dateOfBirth' => 'string',
            'gender' => 'string',
            'profile' => 'string',
        ];

        $notRequired = [
            'name' => 'string | max:255',
            'email' => 'email | unique:users',
            'password' => 'string | min:5',
            'dateOfBirth' => 'string',
            'gender' => 'string',
            'profile' => 'string',
        ];

        if($method == 'PUT' || $method == 'POST'){
            return $required;
        }else{
            return $notRequired;
        }

    }

    protected function prepareForValidation(): void
    {
        $this->profileImage ? $this->merge([
            'profile_img' => $this->profileImage
        ]) : '';

        $this->dateOfBirth ? $this->merge([
            'date_of_birth' => $this->dateOfBirth
        ]) : '';
    }
}
