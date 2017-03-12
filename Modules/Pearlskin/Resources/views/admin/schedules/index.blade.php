@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('pearlskin::schedules.title.module') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('pearlskin::schedules.title.module') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-2" style="margin-top:75px;">
            <div class="box box-primary">
                <div class="box-body">
                    {!! Form::open(['route' => ['admin.pearlskin.schedule.store'], 'method' => 'post']) !!}
                    <div class="row">
                        @include('pearlskin::admin.schedules.partials.create-fields')
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit"
                            class="btn btn-primary btn-flat col-xs-12">{{ trans('core::core.button.create') }}</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-xs-12 col-md-10" style="position:relative;">
            <div id='scheduleCalendar' class="col-xs-12"></div>
        </div>
    </div>
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('pearlskin::schedules.title.create schedule') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).keypressAction({
                actions: [
                    {key: 'c', route: "<?= route('admin.pearlskin.schedule.create') ?>"}
                ]
            });


            $('select').select2();

            $('#scheduleCalendar').fullCalendar({
                locale: '{{ LaravelLocalization::getCurrentLocale() }}',
                minTime: '08:00:00',
                maxTime: '20:00:00',
                defaultView: 'agendaWeek',
                contentHeight: 'auto',
                slotLabelFormat: 'HH:mm',
                slotLabelInterval: 30,
                slotMinutes: 10,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: '{{ route('admin.pearlskin.schedule.calendar') }}'
            });
            $('#scheduleCalendar').find('.fc-body').css('backgroundColor', '#fff');

        });
    </script>
@stop
