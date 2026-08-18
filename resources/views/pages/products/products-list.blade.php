@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Products" />
    <div class="space-y-6">
        <x-tables.basic-tables.basic-tables-two title="Products List" />
    </div>
@endsection
