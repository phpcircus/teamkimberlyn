<?php

namespace App\Services\Admin\Author;

use Illuminate\Validation\Rule;
use PerfectOblivion\ActionServiceResponder\Validation\ValidationService\ValidationService;

class StoreValidationService extends ValidationService
{
    /**
     * Get the validation rules that apply to the data.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['required', 'uuid'],
            'name' => ['required', 'string'],
            'slug' => ['required', Rule::unique(config('wink.database_connection').'.wink_authors', 'slug')->ignore($this->data['id'])],
            'email' => ['required', Rule::unique(config('wink.database_connection').'.wink_authors', 'email')->ignore($this->data['id'])],
            'password' => ['required', 'min:6'],
            'avatar' => ['nullable', 'string'],
            'meta' => ['required'],
            'bio' => ['required', 'string'],
            'meta.theme' => ['required', 'in:light,dark'],
        ];
    }

    /**
     * Get the sanitization filters that apply to the data.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'name' => ['trim', 'strip_tags'],
            'slug' => ['trim', 'strip_tags'],
            'email' => ['trim', 'strip_tags'],
            'bio' => ['trim', 'strip_tags'],
            'avatar' => ['trim', 'strip_tags'],
        ];
    }
}
