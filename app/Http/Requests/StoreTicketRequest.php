<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'event_id' => [
                'required',
                'exists:events,id',
                Rule::unique('tickets', 'event_id')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                }),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'event_id.unique' => 'You have already registered for a ticket to this event.',
        ];
    }
}