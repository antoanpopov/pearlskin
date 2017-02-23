@extends('layouts.master')

@section('title')
    Blog posts | @parent
@stop
@section('content')
    {{--@include('partials.page-title',array(--}}
            {{--'title' => 'Blog'--}}
    {{--))--}}
    {!! Breadcrumbs::render() !!}
    <div class="container content">
        <div class="col-md-9 col-sm-12">
            <?php if (isset($posts)): ?>
            <div class="row">
                @foreach($posts as $post)
                    <figure class="col-md-6 col-sm-12">
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
                                    <i class="fa fa-align-left"></i>
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
                @endforeach
            </div>
            <?php endif; ?>
        </div>
        <aside class="col-md-3 hidden-sm hidden-xs">
            @include('widgets.blog.posts')
        </aside>
    </div>
@stop
