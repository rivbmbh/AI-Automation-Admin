@extends('layouts.app')

@section('content')
    <x-common.component-card title="Add Product">
    <form action="" method="POST">
        @csrf
        <div class="space-y-6">
            <x-form.form-elements.text-input inputTitle="Product Name" inputName="name" />
            <x-form.form-elements.text-area-inputs inputTitle="Description" inputName="description" />
            <x-form.form-elements.select-input inputTitle="Category" inputName="category" />
            <x-form.form-elements.number-input inputTitle="Price" inputName="price" />
            <x-form.form-elements.number-input inputTitle="Stock" inputName="stock" />
        </div>
        
        {{-- submit buttons --}}
        <div class="flex items-center mt-14">
            <x-ui.button size="sm" variant="primary" type="submit">Save Product</x-ui.button>
        </div>
    </form>
    </x-common.component-card>
@endsection
