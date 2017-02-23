<div class="widget">
    <h4 class="widget-title">{{ trans('pearlskin::widgets.procedures') }}</h4>
    <ul>
        @php
            $delay = 0;
        @endphp
        @foreach($procedures as $procedure)
            <li data-aos="flip-down" data-aos-delay="{{$delay}}">
                <div class="widget-thumbnail">
                    <a href="{{ route('procedure', $procedure->title) }}"
                       title="{{ $procedure->title }}">
                        @if(count($procedure->files()->where('zone', 'featured_image')->get()))
                            <img src="{{ Imagy::getThumbnail($procedure->files()->where('zone', 'featured_image')->get()[0]->path, 'mediumThumb') }}"
                                 alt="{{ $procedure->title }}"/>
                        @else
                            <img src="{{asset('assets/img/default_image.jpg')}}"
                                 alt="{{ $procedure->title }}"/>
                        @endif
                    </a>
                    <div class="thumbnail-bump"></div>
                    <div class="thumbnail-icon"><span class="fa fa-heartbeat"></span></div>
                </div>
                <div class="widget-caption">
                    {{ $procedure->title }}
                </div>
            </li>
            @php
                $delay = $delay + 0;
            @endphp
        @endforeach
    </ul>
</div>
