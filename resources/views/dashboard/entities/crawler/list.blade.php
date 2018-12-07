@extends('layouts.dashboard')

@section('title', 'Crawlers')

@section('section.title')
    Manage Crawlers
@stop

@section('section.lead')
    Create and manage your crawlers
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            @if(!$crawlers->count())
                <div class="alert alert-info alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Info</div>
                        There are no crawlers to show!
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($crawlers as $crawler)
                                <td>{{ $crawler->name }}</td>
                                <td>
                                    <a class="btn btn-icon icon-left" href="{{ action('CrawlerController@edit', ['id' => $crawler->id]) }}">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                </td>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-4">
            <a href="{{ action('CrawlerController@create') }}" class="btn btn-icon icon-left btn-primary float-right">
                <i class="fa fa-spider"></i> Create New Crawler
            </a>
        </div>
    </div>
@stop