<div class="box-body">
    <div class="col-md-6 col-xs-12">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group dropdown">
                    <label for="client_id"><?= trans('pearlskin::common.form.client')?></label>
                    <select class="form-control"
                            name="client_id">
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->names }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group dropdown">
                    <label for="doctor_id"><?= trans('pearlskin::common.form.doctor')?></label>
                    <select class="form-control"
                            name="doctor_id">
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->names }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                {!! Form::normalInput('learnt_from', trans('pearlskin::common.form.learnt from'), $errors) !!}
            </div>
            <div class="col-md-12">
                {!! Form::normalTextarea('description', trans('pearlskin::common.form.description'), $errors) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    {!! Form::label("amount_total", trans('pearlskin::common.form.amount total')) !!}
                    {!! Form::number("amount_total", old("amount_total", "0.00"), ['readonly','class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('pearlskin::common.form.amount total')]) !!}
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <label class="checkbox-inline">&nbsp;</label>
                    <input type="checkbox"/>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {!! Form::label("amount_discount", trans('pearlskin::common.form.amount discount')) !!}
                    {!! Form::number("amount_discount", old("amount_discount", "0.00"), ['step'=> '0.01','class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('pearlskin::common.form.amount discount')]) !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {!! Form::label("amount_paid", trans('pearlskin::common.form.amount paid')) !!}
                    {!! Form::number("amount_paid", old("amount_paid", "0.00"), ['step'=> '0.01','class' => 'form-control', 'placeholder' => trans('pearlskin::common.form.amount paid')]) !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {!! Form::label("amount_dept", trans('pearlskin::common.form.amount dept')) !!}
                    {!! Form::number("amount_dept", old("amount_dept", "0.00"), ['readonly','class' => 'form-control', 'placeholder' => trans('pearlskin::common.form.amount dept')]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="form-group">
                    <label for="procedure"><?= trans('pearlskin::common.form.procedure')?></label>
                    <select class="form-control"
                            name="procedure">
                        @foreach($procedures as $procedure)
                            <option value="{{ $procedure->id }}"
                                    data-title="{{ $procedure->title }}"
                                    data-price="{{ $procedure->price }}"
                                    data-procedure-id="{{ $procedure->id }}">{{ $procedure->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label>&nbsp;</label>
                    <a href="#" class="btn btn-success form-control add-procedure">
                        {{ trans('pearlskin::procedures.button.add procedure') }}
                    </a>
                </div>
            </div>
            <div class="col-xs-12">
                <table class="table table-stripped table-hover procedures-list">
                    <thead>
                    <h4>{{ trans('pearlskin::procedures.list resource')  }}</h4><span class="pull-right badge"></span>
                    <th>
                        {{ trans('pearlskin::common.form.quantity') }}
                    </th>
                    <th>
                        {{ trans('pearlskin::common.form.procedure') }}
                    </th>
                    <th>
                        {{ trans('pearlskin::common.form.price') }}
                    </th>
                    <th></th>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <th>
                        {{ trans('pearlskin::common.form.quantity') }}
                    </th>
                    <th>
                        {{ trans('pearlskin::common.form.procedure') }}
                    </th>
                    <th>
                        {{ trans('pearlskin::common.form.price') }}
                    </th>
                    <th></th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {

            var proceduresCount = 0;
            $('select').select2();

            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });

            $('.add-procedure').click(function (e) {
                e.preventDefault();

                var procedure = $('select[name="procedure"]').find(':selected'),
                    procedureId = procedure.data('procedure-id'),
                    procedureTitle = procedure.data('title'),
                    procedurePrice = procedure.data('price');
                $('.procedures-list').find('tbody').append(
                    "<tr>" +
                    "<td>" +
                    "<input " +
                    "type='number' " +
                    "value='1' " +
                    "name='procedures[" + proceduresCount + "][quantity]' " +
                    "class='manipulation-procedure-item'" +
                    "data-price='" + procedurePrice + "'/>" +
                    "<input type='hidden' value='" + procedureId + "' name='procedures[" + proceduresCount + "][procedure_id]'/>" +
                    "</td>" +
                    "<td>" + procedureTitle + "</td>" +
                    "<td>" + procedurePrice + "</td>" +
                    "<td><a href='#' class='btn btn-danger pull-right procedure-delete'><i class='fa fa-trash'></i></a></td>"
                );
                $('.manipulation-procedure-item').change();
                proceduresCount++;
            });

            $(document).on('click', '.procedure-delete', function (e) {
                e.preventDefault();
                $(this).closest('tr').remove();
            });

            $(document).on('keyup change paste', '.manipulation-procedure-item, input[name="amount_discount"], input[name="amount_paid"]', function () {

                var amountProceduresTotal = parseFloat(0),
                    amountDiscount = $('input[name="amount_discount"]').val(),
                    amountPaid = $('input[name="amount_paid"]').val(),
                    amountDeptElement = $('input[name="amount_dept"]'),
                    amountTotalElement = $('input[name="amount_total"]');

                $('.manipulation-procedure-item').each(function (index, element) {
                    var price = parseFloat($(this).data('price')),
                        quantity = parseFloat($(this).val());
                    amountProceduresTotal += (price * quantity);
                });

                var amountTotal = amountProceduresTotal - amountDiscount,
                    amountDept = amountTotal - amountPaid;

                amountTotalElement.val(amountTotal.toFixed(2));
                amountDeptElement.val(amountDept.toFixed(2));

            });

        });
    </script>
@stop
