@extends('layouts.admin.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endsection
@section('title' , __('File Manger'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'File Manger'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('File Manger')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
@endsection

@section('content')

    <div id="fm" style="height: 600px;"></div>

@endsection
@section('js')
    <!-- File manager -->
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
@endsection
