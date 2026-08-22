<?php

namespace App\Http\Requests\Conversation;

use App\Enums\ConversationChannel;
use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StoreConversationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_source' => ['required', Rule::in(['existing', 'new'])],
            'customer_id' => ['nullable', 'integer'],
            'new_customer_name' => ['nullable', 'string', 'max:255'],
            'new_customer_contact' => ['nullable', 'string', 'max:255'],
            'channel' => ['required', Rule::enum(ConversationChannel::class)],
            'message' => ['required', 'string', 'max:2000'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            if ($this->input('customer_source') === 'existing') {
                $exists = Customer::query()
                    ->whereKey($this->input('customer_id'))
                    ->where('user_id', $this->user()->id)
                    ->exists();

                if (! $exists) {
                    $validator->errors()->add('customer_id', 'Pilih customer yang valid.');
                }
            }

            if ($this->input('customer_source') === 'new') {
                if (blank($this->input('new_customer_name'))) {
                    $validator->errors()->add('new_customer_name', 'Nama customer wajib diisi.');
                }

                if (blank($this->input('new_customer_contact'))) {
                    $validator->errors()->add('new_customer_contact', 'Kontak customer wajib diisi.');
                }
            }
        });
    }
}
