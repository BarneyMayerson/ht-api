<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\v1;

use App\Models\Status;
use Illuminate\Foundation\Http\FormRequest;

class BaseTicketRequest extends FormRequest
{
    /**
     * @param  array<string, string>  $otherAttributes
     * @return array<string, mixed>
     */
    public function mappedAttributes(array $otherAttributes = []): array
    {
        $attributeMap = array_merge(
            [
                'data.attributes.title' => 'title',
                'data.attributes.description' => 'description',
                'data.attributes.status' => 'status',
                'data.attributes.createdAt' => 'created_at',
                'data.attributes.updatedAt' => 'updated_at',
                'data.relationships.author.data.id' => 'user_id',
            ],
            $otherAttributes,
        );

        $attributesToUpdate = [];

        foreach ($attributeMap as $key => $attribute) {
            if ($this->has($key)) {
                $attributesToUpdate[$attribute] = $this->input($key);
            }
        }

        return $attributesToUpdate;
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'data.attributes.status' => 'The data.attributes.status is invalid. Please use '.Status::valuesToString(),
        ];
    }
}
