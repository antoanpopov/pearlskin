<div class="widget">
    <h4 class="widget-title">{{ trans('pearlskin::widgets.recent blogs') }}</h4>
    <ul>
        @foreach($latestPosts as $post)
            <li data-aos="flip-down" data-aos-delay="0">
                <div class="widget-thumbnail">
                    <a href="{{ URL::route(locale().'.blog.slug', [$post->slug]) }}"
                       title="{{ $post->title }}">
                        @if(count($post->files()->where('zone', 'thumbnail')->get()))
                            <img src="{{ Imagy::getThumbnail($post->files()->where('zone', 'thumbnail')->get()[0]->path, 'mediumThumb') }}"
                                 alt="{{ $post->title }}"/>
                        @else
                            <img src="{{asset('assets/img/default_image.jpg')}}"
                                 alt="{{ $post->title }}"/>
                        @endif
                    </a>
                    <div class="thumbnail-bump"></div>
                    <div class="thumbnail-icon"><span class="fa fa-align-left"></span></div>
                </div>
                <div class="widget-caption">
                    {!! str_limit($post->title, 70)  !!}
                </div>
            </li>
        @endforeach
    </ul>
</div>
