@extends('layouts.master')

@section('title')
    {{ $post->title }} | @parent
@stop

@section('content')
    {!! Breadcrumbs::render(locale().'.blog.post', $post) !!}
    <div class="container content">
        <div class="col-md-9 col-sm-12">
        <span class="linkBack">
            <a href="{{ URL::route(locale().'.blog') }}" class="color-primary">
                <i class="fa fa-backward"></i> {{ trans('pearlskin::common.labels.back') }}</a>
        </span>
            <div class="row">
                @if(count($post->files()->where('zone', 'thumbnail')->get()))
                    <img class="col-xs-12"
                         src="{{ Imagy::getThumbnail($post->files()->where('zone', 'thumbnail')->get()[0]->path, 'largeWidget') }}"
                         alt="{{ $post->title }}"/>
                @else
                    <img src=""
                         alt="{{ $post->title }}"/>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="font-heading blog-title">{{ $post->title }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <span class="fa fa-clock-o color-primary"></span>
                        <span>{{ $post->created_at->format('d-m-Y') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
        <aside class="col-md-3 hidden-sm hidden-xs">
            @include('widgets.blog.posts')
        </aside>
    </div>
@stop
