<div class="row">
    @foreach($priceListCategories as $priceListCategory)
        <div class="col-xs-12 col-xs-offset-0" style="margin-bottom: 20px;">
            <table class="table table-striped table-responsice table-condensed table-hover">
                <tr>
                    <th>{{$priceListCategory->title}}</th>
                    <th style="width: 100px;"></th>
                </tr>
                @foreach($priceListCategory->priceLists as $priceList)
                    <tr>
                        <td>
                            @if($priceList->procedure)
                                <a href="{{ route('procedure', $priceList->procedure->title) }}"
                                   title="{{$priceList->procedure->title}}">
                                    {{ $priceList->title }}
                                </a>
                            @else
                                {{ $priceList->title }}
                            @endif
                        </td>
                        <td class="text-right">@if($priceList->show_procedure_price)
                                {{$priceList->procedure->price}}
                            @else
                                {{ $priceList->price }}
                            @endif
                            лв.
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endforeach
</div>
