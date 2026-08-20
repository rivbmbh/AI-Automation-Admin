@extends('layouts.app')


@section('content')
    <div class="relative flex justify-between items-center overflow-hidden">
        <x-ui.add-button buttonName="Add Product" buttonLink="/products/create" />

        @if (session('success'))
            <div class="mb-3">
                <x-ui.alerts.toast :message="session('success')" />
            </div>
        @endif
        @if (session('error'))
            <x-ui.alerts.toast variant="error" :message="session('error')" duration="0" />
        @endif
        @if ($errors->any())
            <div class="mb-3">
                <x-ui.alerts.toast duration="0" variant="error" title="Gagal Menyimpan" :errors="$errors->all()" />
            </div>
        @endif

        {{-- <x-ui.alerts.toast variant="warning" message="Stok produk ini hampir habis." />
        <x-ui.alerts.toast variant="info" message="Data sedang diproses di background." /> --}}
    </div>
    <div class="space-y-6">
        <x-tables.product-table title="Products List" :data="$products" />
    </div>
@endsection

