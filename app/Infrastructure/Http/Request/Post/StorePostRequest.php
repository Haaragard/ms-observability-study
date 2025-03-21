<?php

namespace App\Infrastructure\Http\Request\Post;

use App\Infrastructure\Http\Request\FormRequest;

class StorePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:100',
            'content' => 'required|string|max:200',
        ];
    }
}
