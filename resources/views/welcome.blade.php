@extends('layouts.app')


@section('content')
    @if(\Session::has('error'))
        <div class="alert alert-danger">
            {{\Session::get('error')}}
        </div>
    @endif
{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <script src="https://kit.fontawesome.com/7b4eb34dc9.js" crossorigin="anonymous"></script>--}}
{{--    <title>Laravel</title>--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
{{--    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/cards.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">--}}

{{--</head>--}}
{{--<body class="antialiased">--}}
<div id="app">
{{--    <router-link to="/"></router-link>--}}
    <router-view></router-view>
{{--    <router-link :to="{ name: 'dashboard' }">details</router-link>--}}

{{--    <dashboard></dashboard>--}}
</div>
{{--</body>--}}
{{--</html>--}}
