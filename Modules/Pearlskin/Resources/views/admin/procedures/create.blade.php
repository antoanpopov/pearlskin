@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('pearlskin::procedures.title.create') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i
                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.pearlskin.procedure.index') }}">{{ trans('pearlskin::procedures.title.list') }}</a>
        </li>
        <li class="active">{{ trans('pearlskin::procedures.title.create') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.pearlskin.procedure.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('pearlskin::admin.procedures.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach
                    <div class="col-xs-12">
                        {!! Form::normalCheckbox('is_visible', trans('pearlskin::common.statuses.is visible'), $errors) !!}
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group dropdown">
                            <label for="client_id"><?= trans('pearlskin::common.form.category')?></label>
                            <select class="form-control"
                                    name="client_id">
                                @foreach($procedureCategories as $procedureCategory)
                                    <option value="{{ $procedureCategory->id }}">{{ $procedureCategory->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        {!! Form::normalInput('price', trans('pearlskin::common.form.price'), $errors) !!}
                    </div>
                    <div class="col-xs-12">
                        @mediaSingle('featured_image')
                    </div>
                    <div class="col-xs-12">
                        @mediaMultiple('gallery')
                    </div>
                    <div class="box-footer">
                        <button type="submit"
                                class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <button class="btn btn-default btn-flat" name="button"
                                type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat"
                           href="{{ route('admin.pearlskin.procedure.index')}}"><i
                                    class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).keypressAction({
                actions: [
                    {key: 'b', route: "<?= route('admin.pearlskin.procedure.index') ?>"}
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@stop
