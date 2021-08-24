@extends('user')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">

                <div class="card-header">@lang('Payment Preview')</div>


                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <img
                                src="{{get_image(config('constants.deposit.gateway.path') .'/'. optional($depo->gateway)->image) }}"
                                class="payment-preview-img"/>
                        </li>

                        <li class="list-group-item">
                            @lang('Amount'):
                            <strong>{{formatter_money($depo->amount)}} </strong> {{trans($general->cur_text)}}
                        </li>


                        <li class="list-group-item">
                            @lang('Conversion Rate'): <strong>1 {{$depo->baseCurrency()}}
                                = {{formatter_money($depo->rate)}} {{trans($general->cur_text)}}  </strong>
                        </li>
                        <li class="list-group-item">
                            @lang('In') {{trans($depo->baseCurrency())}}:
                            <strong>{{formatter_money($depo->amount/$depo->rate)}}</strong>
                        </li>

                        <li class="list-group-item">
                            @lang('Charge'):
                            <strong>{{formatter_money($depo->charge)}}</strong> {{trans($depo->baseCurrency())}}
                        </li>

                        <li class="list-group-item">
                            @lang('Payable'): <strong> {{$depo->final_amo}}</strong> {{trans($depo->baseCurrency())}}
                        </li>
                        @if($depo->gateway->crypto==1)
                            <li class="list-group-item">
                                @lang('Conversion with')
                                <b> {{ trans($depo->method_currency) }}</b> @lang('and final value will Show on next step')
                            </li>
                        @endif
                    </ul>


                    <a href="{{route('user.deposit.confirm')}}" class="btn btn-success btn-block">@lang('Pay Now')</a>


                </div>
            </div>


        </div>
    </div>
@endsection

