@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('pearlskin::manipulations.title.list') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('pearlskin::manipulations.title.list') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12" style="padding:0">
            <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                <a href="{{ route('admin.pearlskin.manipulation.create') }}" class="btn btn-primary btn-flat"
                   style="padding: 4px 10px;">
                    <i class="fa fa-pencil"></i> {{ trans('pearlskin::manipulations.create') }}
                </a>
            </div>
        </div>
        <div class="col-xs-12 col-md-2">
            <form method="POST" id="search-form" role="form">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="client_id">{{ trans('pearlskin::common.form.client') }}</label>
                            <select class="form-control" name="client_id" id="client_id">
                                <option value="">{{trans('pearlskin::common.labels.all')}}</option>
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->names}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="doctor_id">{{ trans('pearlskin::common.form.doctor') }}</label>
                            <select class="form-control" name="doctor_id" id="doctor_id">
                                <option value="">{{trans('pearlskin::common.labels.all')}}</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{$doctor->id}}">{{$doctor->names}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="procedure_id">{{ trans('pearlskin::common.form.procedure') }}</label>
                            <select class="form-control" name="procedure_id" id="procedure_id">
                                <option value="">{{trans('pearlskin::common.labels.all')}}</option>
                                @foreach($procedures as $procedure)
                                    <option value="{{$procedure->id}}">{{$procedure->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary col-xs-12">
                            <i class="fa fa-search"></i>
                            {{ trans('pearlskin::common.form.search') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-md-10">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>{{ trans('pearlskin::common.form.client') }}</th>
                            <th>{{ trans('pearlskin::common.form.doctor') }}</th>
                            <th>{{ trans('pearlskin::common.form.procedures') }}</th>
                            <th>{{ trans('pearlskin::common.form.amount paid') }}</th>
                            <th>{{ trans('pearlskin::common.form.description') }}</th>
                            <th>{{ trans('pearlskin::common.form.created at') }}</th>
                            <th data-sortable="false">{{ trans('pearlskin::common.form.actions') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ trans('pearlskin::common.form.client') }}</th>
                            <th>{{ trans('pearlskin::common.form.doctor') }}</th>
                            <th>{{ trans('pearlskin::common.form.procedures') }}</th>
                            <th>{{ trans('pearlskin::common.form.amount paid') }}</th>
                            <th>{{ trans('pearlskin::common.form.description') }}</th>
                            <th>{{ trans('pearlskin::common.form.created at') }}</th>
                            <th data-sortable="false">{{ trans('pearlskin::common.form.actions') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('pearlskin::manipulations.title.create manipulation') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $('select').select2();

            $(document).keypressAction({
                actions: [
                    {key: 'c', route: "<?= route('admin.pearlskin.manipulation.create') ?>"}
                ]
            });
        });
    <?php $locale = locale(); ?>
        $(function () {
            var dataTable = $('.data-table').DataTable({
                searching: false,
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{route('admin.pearlskin.manipulation.datatable')}}',
                    data: function (d) {
                        d.client_id = $('select[name=client_id]').val();
                        d.doctor_id = $('select[name=doctor_id]').val();
                        d.procedure_id = $('select[name=procedure_id]').val();
                    }
                },
                columns: [
                    {data: 'client.names', name: 'client.names'},
                    {data: 'doctor.names', name: 'doctor.names'},
                    {data: 'procedures', name: 'procedures'},
                    {data: 'amount_paid', name: 'amount_paid'},
                    {data: 'description', name: 'description'},
                    {data: 'date_of_manipulation', name: 'date_of_manipulation'},
                    {data: 'actions', name: 'actions'}
                ],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });

            $(document).on('submit', '#search-form', function (e) {
                dataTable.draw();
                e.preventDefault();

            });
        });
    </script>
@stop
