@extends('layouts.dashboard')

@section('title', 'Create Crawler')

@section('section.title')
    Create New Crawler
@stop

@section('section.lead')
    Create new crawler following the steps
@stop

@section('content')
    <div class="row">
        <div class="col-md-7">
            <!-- Crawler Name -->
            <form action="{{ action('CrawlerController@store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Crawler name</label>
                    <div class="input-group">
                        <input type="text" name="name" id="name" class="form-control" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                Save <i class="fa fa-save"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- End Crawler Name -->
        </div>
    </div>
@stop