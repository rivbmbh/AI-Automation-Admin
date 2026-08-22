<?php

namespace App\Http\Requests\Conversation;

use App\Enums\MessageSender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'content' => ['required', 'string', 'max:2000'],
            'sender_type' => ['required', Rule::in([MessageSender::Customer->value, MessageSender::Admin->value])],
        ];
    }
}
