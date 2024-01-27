@extends('layouts.admin.base')

@section('title' , __('blog'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'blog'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('blog')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
@endsection

@section('content')
@endsection
