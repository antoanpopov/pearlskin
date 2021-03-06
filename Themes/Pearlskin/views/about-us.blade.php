@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop
@section('meta')
    <meta name="title" content="{{ $page->meta_title}}"/>
    <meta name="description" content="{{ $page->meta_description }}"/>
@stop
@section('content')
    {{--@include('partials.page-title',array(--}}
    {{--'title' => $page->title--}}
    {{--))--}}
    {!! Breadcrumbs::render('page',$page) !!}
    <div class="container content">
        <div class="col-md-9 col-sm-12">
            <div style="padding-bottom:20px; margin: 15px auto;">
                <h3 class="text-center">{{ $page->title }}</h3>
                <div style="position:relative;">
                    <span class="under-bump">‿</span>
                </div>
            </div>
            {!! $page->body !!}
        </div>
        <aside class="col-md-3 hidden-sm hidden-xs">
            @include('widgets.doctors')
        </aside>
    </div>
    @include('widgets.service_counter')
    <div class="container content">
        {!! $page->body !!}
    </div>
@stop
