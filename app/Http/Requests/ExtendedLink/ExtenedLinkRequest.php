<?php

namespace App\Http\Requests\ExtendedLink;

use Illuminate\Foundation\Http\FormRequest;

class ExtenedLinkRequest extends FormRequest
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
        if($method == 'PUT' || $method == 'POST'){
            return [
                'name' => 'required',
                'socialLink' => 'required',
                'storeId' => 'required'
            ];
        }else{
            return [
                'name' => 'sometimes',
                'socialLink' => 'sometimes',
                'storeId' => 'sometimes'
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->socialLink ? $this->merge([
            'social_link' => $this->socialLink
        ]) : '';

        $this->storeId ? $this->merge([
            'store_id' => $this->storeId
        ]) : '';
    }
}
