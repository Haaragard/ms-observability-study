<?php

namespace App\Infrastructure\Http\Request\Post;

use App\Infrastructure\Http\Request\FormRequest;

class ListPostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'page' => 'integer',
            'per_page' => 'integer|in:10,20,30,40,50',
        ];
    }
}
