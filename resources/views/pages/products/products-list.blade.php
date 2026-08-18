@extends('layouts.app')


@section('content')
    <div class="relative flex justify-between items-center overflow-hidden">
        <x-ui.add-button buttonName="Add Product" buttonLink="/products/create" />
        @if (session('success'))
            <div class="mb-3">
                    <x-ui.alerts.success-toast :message="session('success')" />
            </div>
        @endif
    </div>
    <div class="space-y-6">
        <x-tables.basic-tables.basic-tables-two title="Products List" />
    </div>
@endsection

