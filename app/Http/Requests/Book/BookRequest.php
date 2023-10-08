<?php

namespace App\Http\Requests\Book;

use App\Http\Controllers\UploadController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(UploadController $uploadController, Request $request): array
    {
        $required = [
            'name' => 'required | string | max:255',
            'author' => 'required | string | max:255',
            'description' => 'required | string',
            'releasedYear' => 'sometimes',
            'admin_id' => 'required',
            "book_url" => 'required'
        ];

        $notRequired = [
            'name' => 'sometimes | string | max:255',
            'author' => 'sometimes | string | max:255',
            'description' => 'sometimes | string',
            'releasedYear' => 'sometimes',
            'adminId' => 'sometimes',
            "book_url" => 'sometimes'
        ];

        if($this->method() == 'PUT' || $this->method() == 'POST'){
            return $required;
        }else{
            return $notRequired;
        }
    }

    protected function prepareForValidation() : void
    {
        $this->releasedYear ? $this->merge([
            'released_year' => $this->releasedYear
        ]) : '';


        $this->adminId ? $this->merge([
            'admin_id' => $this->adminId
        ]) : '';
    }

}
