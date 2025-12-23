<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\v1;

use App\Models\Status;
use App\Permissions\Api\v1\Abilities;

class StoreTicketRequest extends BaseTicketRequest
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
        $rules = [
            'data' => 'required|array',
            'data.attributes' => 'required|array',
            'data.attributes.title' => 'required|string',
            'data.attributes.description' => 'required|string',
            'data.attributes.status' => 'required|string|in:'.Status::valuesToString(),
        ];

        if ($this->routeIs('v1.authors.tickets.store')) {
            return $rules;
        }

        if ($user = $this->user()) {
            $authorRule = 'required|integer|exists:users,id';

            $rules['data.relationships.author.data.id'] = $authorRule.'|size:'.$user->id;

            if ($user->tokenCan(Abilities::CreateTicket)) {
                $rules['data.relationships.author.data.id'] = $authorRule;
            }
        }

        return $rules;
    }
}
