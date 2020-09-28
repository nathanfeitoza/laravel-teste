
@extends('layout.main')

@section('title', 'Page Title')

{{--@section('sidebar')--}}
{{--    @parent--}}

{{--    <p>This is appended to the master sidebar.</p>--}}
{{--@endsection--}}

@section('content')
    <div id="app">
        <teste_component></teste_component>
    </div>
    <p>This is my body content.</p>
@endsection
