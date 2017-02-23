<div class="widget">
    <h4 class="widget-title">{{ trans('pearlskin::widgets.doctors') }}</h4>
    <ul>
        @php
            $delay = 0;
        @endphp
        @foreach($doctors as $doctor)
            <li data-aos="flip-down" data-aos-delay="{{$delay}}">
                <div class="widget-thumbnail">
                    <a href="{{ route('doctor', $doctor->names) }}"
                       title="{{ $doctor->names }}">
                        @if(count($doctor->files()->where('zone', 'featured_image')->get()))
                            <img src="{{ Imagy::getThumbnail($doctor->files()->where('zone', 'featured_image')->get()[0]->path, 'mediumThumb') }}"
                                 alt="{{ $doctor->names }}"/>
                        @else
                            <img src="{{asset('assets/img/default_image.jpg')}}"
                                 alt="{{ $doctor->names }}"/>
                        @endif
                    </a>
                    <div class="thumbnail-bump"></div>
                    <div class="thumbnail-icon"><span class="fa fa-user-md"></span></div>
                </div>
                <div class="widget-caption">
                    {{ $doctor->names }}
                </div>
            </li>
            @php
                $delay = $delay + 200;
            @endphp
        @endforeach
    </ul>
</div>
