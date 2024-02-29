@extends('layouts.admin.base')

@section('title' , __('contact'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'contact'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('contact')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
@endsection

@section('content')
@endsection
