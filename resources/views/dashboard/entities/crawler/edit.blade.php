@extends('layouts.dashboard')

@section('title')
    Manage {{ ucfirst($crawler->name) }} Crawler
@stop

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('global/izitoast/css/iziToast.min.css') }}">
@stop

@section('data.sets')
    data-crawler="{{ $crawler->id }}"
@stop

@section('section.title')
    Define process of the crawler and the output
@stop

@section('section.lead')
    Manage and edit the process and the output of your crawler
@stop

@section('content')
    <process-editor ref="processor"></process-editor>
    @include('dashboard.entities.item.partials.create-modal')
@stop

@section('footer.scripts')
    <script src="{{ asset('global/izitoast/js/iziToast.min.js') }}"></script>
@stop