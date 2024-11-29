@if($payments->isEmpty())
    <tr class="single-item font-bold w-100">
        <td>{{ __('messages.general.not_available')}}</td>
    </tr>                              
@else
    @foreach($payments as $payment)
    <tr class="single-item">
        <td>
            <div class="item-checkbox ms-1">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkbox" id="checkBox_1">
                    <label class="custom-control-label" for="checkBox_1"></label>
                </div>
            </div>
        </td>
        <td><a href="{{route('payments.show',$payment->id)}}" class="fw-bold">#{{$payment->id}}</a></td>
        <td><span>{{$payment->student->first_name}} {{$payment->student->last_name}}</span></td>
        <td>{{ number_format($payment->amount, 0, '.', ' ') }} UZS</td>
        <td>{{ (new DateTime($payment->create_time))->format('d F Y, H:i') }}</td>
        <td>
            @if($payment->type == 'cash')
                <span>{{__('students.cash')}}</span>                                                            
            @else
                <img src="https://cdn.payme.uz/logo/payme_color.svg" alt="PAYME" style="width: 50px;"/>
            @endif
        </td>
        <td>
            @if($payment->state == '1')
                <div class="badge bg-soft-warning text-warning">{{__('messages.group.waiting')}}</div>
            @elseif($payment->state == '2')
                <div class="badge bg-soft-success text-success">{{__('messages.group.paid')}}</div>
            @elseif($payment->state == '-2')
                <div class="badge bg-soft-danger text-danger">{{__('messages.general.cenceled')}}</div>
            @endif
        </td>
        <td>
            <div class="hstack gap-2 justify-content-end">
                <a href="{{route('payments.show',$payment->id)}}" class="avatar-text avatar-md">
                    <i class="feather feather-eye"></i>
                </a>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                        <i class="feather feather-more-horizontal"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="feather feather-edit-3 me-3"></i>
                                <span>{{__('messages.general.edit')}}</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item printBTN" href="javascript:void(0)">
                                <i class="feather feather-printer me-3"></i>
                                <span>Print</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="feather feather-clock me-3"></i>
                                <span>{{__('students.remind')}}</span>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="feather feather-trash-2 me-3"></i>
                                <span>{{__('messages.general.delete')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </td>
    </tr>
    @endforeach
@endif
