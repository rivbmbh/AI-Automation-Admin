<?php

namespace App\Http\Requests\Customer;

use App\Enums\CustomerStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Otorisasi kepemilikan (bukan admin lain) sudah dicek lewat CustomerPolicy::update
        // via $this->authorize('update', $customer) / authorizeResource() di controller.
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'status' => ['required', Rule::enum(CustomerStatus::class)],
        ];
    }
}
