<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class BaseUserRequest extends FormRequest
{
    /**
     * @param  array<string, string|int>  $otherAttributes
     * @return array<string, mixed>
     */
    public function mappedAttributes(array $otherAttributes = []): array
    {
        $attributeMap = [
            'data.attributes.name' => 'name',
            'data.attributes.email' => 'email',
            'data.attributes.password' => 'password',
            'data.attributes.isManager' => 'is_manager',
        ];

        $attributesToUpdate = [];

        foreach ($attributeMap as $key => $attribute) {
            if ($this->has($key)) {
                $value = $this->input($key);

                $attributesToUpdate[$attribute] = $attribute === 'password'
                    ? bcrypt($value) // @phpstan-ignore-line
                    : $value;
            }
        }

        return array_merge($attributesToUpdate, $otherAttributes);
    }
}
