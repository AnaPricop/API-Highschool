@extends('layouts.app')


@section('content')
    @if(\Session::has('error'))
        <div class="alert alert-danger">
            {{\Session::get('error')}}
        </div>
    @endif
    <div id="app">
        <router-view name="b"></router-view>
    </div>
