@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop
@section('meta')
    <meta name="title" content="{{ $page->meta_title}}"/>
    <meta name="description" content="{{ $page->meta_description }}"/>
@stop
@section('carousel')
    @include('partials.carousel',array(
    'carousels' => $carousel->getCarouselsForPage($page->id)
    ))
@stop
@section('content')
    {!! Breadcrumbs::render() !!}
    <div class="container content">
        <h3 class="text-center">Добре дошли!</h3>
        <div class="col-sm-12 text-center">
            <span class="under-bump">‿</span>
        </div>
        <div class="col-sm-12 padding-top-50">{!! $page->body !!}</div>
        {{--<div class="block-bump"></div>--}}

        {{--<h3 class="text-center">Защо клиентите ни предпочитат</h3>--}}
        {{--<div class="col-sm-12 text-center">--}}
        {{--<span class="under-bump">‿</span>--}}
        {{--</div>--}}
        {{--<div class="row padding-top-50">--}}
        {{--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">--}}
        {{--<div class="thumbnail thumbnail-home">--}}
        {{--<div class="thumbnail-caption">--}}
        {{--<div class="thumbnail-bump"></div>--}}
        {{--<div class="thumbnail-icon">--}}
        {{--<i class="fa fa-diamond"></i>--}}
        {{--</div>--}}
        {{--<h5 class="thumbnail-title">--}}
        {{--Първокласно обслужване--}}
        {{--</h5>--}}
        {{--<div class="thumbnail-action">--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">--}}
        {{--<div class="thumbnail thumbnail-home">--}}
        {{--<div class="thumbnail-caption">--}}
        {{--<div class="thumbnail-bump"></div>--}}
        {{--<div class="thumbnail-icon">--}}
        {{--<i class="fa fa-users"></i>--}}
        {{--</div>--}}
        {{--<h5 class="thumbnail-title">--}}
        {{--Екип от специалисти--}}
        {{--</h5>--}}
        {{--<div class="thumbnail-action">--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">--}}
        {{--<div class="thumbnail thumbnail-home">--}}
        {{--<div class="thumbnail-caption">--}}
        {{--<div class="thumbnail-bump"></div>--}}
        {{--<div class="thumbnail-icon">--}}
        {{--<i class="fa fa-map-marker"></i>--}}
        {{--</div>--}}
        {{--<h5 class="thumbnail-title">--}}
        {{--Добра локация--}}
        {{--</h5>--}}
        {{--<div class="thumbnail-action">--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">--}}
        {{--<div class="thumbnail thumbnail-home">--}}
        {{--<div class="thumbnail-caption">--}}
        {{--<div class="thumbnail-bump"></div>--}}
        {{--<div class="thumbnail-icon">--}}
        {{--<i class="fa fa-credit-card"></i>--}}
        {{--</div>--}}
        {{--<h5 class="thumbnail-title">--}}
        {{--Конкурентни цени--}}
        {{--</h5>--}}
        {{--<div class="thumbnail-action">--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>

    {{--featured block --}}
    @include('widgets.about-us-highlight')
    {{--featured block end--}}

    <div class="bg-creme">
        <div class="container content">
            <div class="block-bump bg-creme"></div>
            <h3 class="text-center">Последни новини</h3>
            <div class="col-sm-12 text-center">
                <span class="under-bump">‿</span>
            </div>
            <div class="row padding-top-50">
                @php
                    $delay = 0;
                @endphp
                @foreach($latestPosts as $post)
                    <figure class="col-lg-4 col-md-4 col-sm-12 col-xs-12"
                            data-aos="flip-down"
                            data-aos-delay="{{$delay}}">
                        <div class="thumbnail">
                            <div class="thumbnail-image-container">
                                @if(count($post->files()->where('zone', 'thumbnail')->get()))
                                    <img src="{{ Imagy::getThumbnail($post->files()->where('zone', 'thumbnail')->get()[0]->path, 'mediumThumb') }}"
                                         alt="{{ $post->title }}"/>
                                @else
                                    <img src="{{asset('assets/img/default_image.jpg')}}"
                                         alt="{{ $post->title }}"/>
                                @endif
                            </div>
                            <div class="thumbnail-caption">
                                <div class="thumbnail-bump"></div>
                                <div class="thumbnail-icon">
                                    <i class="fa fa-newspaper-o"></i>
                                </div>
                                <h5 class="thumbnail-title">
                                    {{ $post->title }}
                                </h5>
                                <div class="thumbnail-action">
                                    <a href="{{ URL::route(locale().'.blog.slug', [$post->slug]) }}"
                                       class="btn">
                                        {{ trans('pearlskin::common.labels.read more') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </figure>
                    @php
                    $delay = $delay + 200;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>

@stop
