@extends('layouts.app')

@section('content')
    <x-common.component-card title="Edit Product">
    <form action="{{ route('products.update', $product ) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="relative mb-5 overflow-hidden">
        @if ($errors->any())
            <x-ui.alerts.toast variant="error" title="Gagal Menyimpan" :errors="$errors->all()" duration="0" />
        @endif
        </div>
        
        <div class="space-y-6">
            <x-form.form-elements.text-input inputTitle="SKU" inputName="sku" value="{{ $product->sku }}" readonly="true"/>
            <x-form.form-elements.text-input inputTitle="Product Name" inputName="name" value="{{ $product->name }}" />
            <x-form.form-elements.text-area-inputs inputTitle="Description" inputName="description" value="{{ $product->description }}"/>
            <x-form.form-elements.select-input inputTitle="Category" inputName="category" value="{{ $product->category }}" :data="$categoriesDummy"/>
            <x-form.form-elements.number-input inputTitle="Price" inputName="price" value="{{ $product->price }}"/>
            <x-form.form-elements.number-input inputTitle="Stock" inputName="stock" value="{{ $product->stock }}"/>
        </div>
        
        {{-- submit buttons --}}
        <div class="flex items-center mt-14">
            <x-ui.button size="sm" variant="primary" type="submit">Save Product</x-ui.button>
        </div>
    </form>
    </x-common.component-card>
@endsection
