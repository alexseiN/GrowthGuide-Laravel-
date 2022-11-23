<style>
    td {
        padding: 20px;
    }
    .status-0 {
        color: red;
    }
    .status-1 {
        color: green;
    }
    .status-2 {
        color: blue;
    }
    .hidden {
        display: none;
    }

    .alert{position:relative;padding:1rem 1rem;margin-bottom:1rem;border:1px solid transparent;border-radius:10px}.alert-heading{color:inherit}.alert-link{font-weight:700}.alert-dismissible{padding-right:3rem}.alert-dismissible .btn-close{position:absolute;top:0;right:0;z-index:2;padding:1.25rem 1rem}.alert-primary{color:#013979;background-color:#ccdff4;border-color:#b3cfef}.alert-primary .alert-link{color:#012e61}.alert-secondary{color:#055460;background-color:#cff6fc;border-color:#b6f2fb}.alert-secondary .alert-link{color:#04434d}.alert-success{color:#0f5132;background-color:#d1e7dd;border-color:#badbcc}.alert-success .alert-link{color:#0c4128}.alert-info{color:#055160;background-color:#cff4fc;border-color:#b6effb}.alert-info .alert-link{color:#04414d}.alert-warning{color:#664d03;background-color:#fff3cd;border-color:#ffecb5}.alert-warning .alert-link{color:#523e02}.alert-danger{color:#842029;background-color:#f8d7da;border-color:#f5c2c7}.alert-danger .alert-link{color:#6a1a21}.alert-light{color:#626365;background-color:#fdfdfe;border-color:#fcfdfe}.alert-light .alert-link{color:#4e4f51}.alert-dark{color:#0d1524;background-color:#d0d3d8;border-color:#b9bdc5}.alert-dark .alert-link{color:#0a111d}@keyframes progress-bar-stripes{0%{background-position-x:1rem}}

</style>

<div>
    <div class="section mb-5">
        <div class="row">
            <div class="col-sm-12 col-md-8 offset-md-2 mt-5">
                <table>
                <thead>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        @continue($order->field_name === 'reference')
                        @continue($order->field_name === 'message')
                        @continue(is_null($order->field_value))
                        <tr>
                            <td class="col-sm-6 col-md-6">
                                {{ $order->field_name }}
                            </td>
                            <td class="col-sm-6 col-md-6">
                                @if($order->field_type == "file")
                                    @php
                                        $extension = substr($order->field_value, strpos($order->field_value, ".") + 1);
                                    @endphp
                                    <a href="{{ env('APP_URL').$order->field_value }}" download="{{ $order->field_name.'.'.$extension }}"><Button class="btn btn-info">Download</Button></a>
                                    {{ $order->field_name.'.'.$extension }}
                                @else
                                    {{ $order->field_value }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Status</td>
                        <td class="status-{{ $status }}">{{ $status === 0 ? 'Pending' : $status === 1 ? 'In Progress':'Completed'}}</td>
                    </tr>
                </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="header"></div>

    <div class="section mb-5">
        <div class="row">
            <div class="col-sm-12 col-md-8 offset-md-2 mt-5">
                @if(isset($admin) && $admin)
                    <form action="{{ route('orders.response') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input class="hidden" value="{{ $user_id }}" name="user_id">
                    <div class="form-group">
                    <table>
                        <thead>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            @continue($order->field_name !== 'reference' && $order->field_name !== 'message')
                            <tr>
                                <td class="col-sm-6 col-md-6">
                                    {{ $order->field_name }}
                                </td>
                                <td class="col-sm-6 col-md-6">
                                    @if($order->field_type == "file")
                                        @php $extension = substr($order->field_value, strpos($order->field_value, ".") + 1); @endphp
                                        @if(is_null($order->field_value) == false)
                                            <a href="{{ env('APP_URL').$order->field_value }}" download="{{ $order->field_name.'.'.$extension }}">Download</a>
                                            {{ $order->field_name.'.'.$extension }}
                                        @endif
                                        @if(isset($admin) && $admin)
                                            <input class="form-control" type="{{ $order->field_type }}" name="{{ $order->field_name }}" value="{{ old($order->field_name) }}">
                                        @endif
                                    @else
                                        <textarea class="form-control" name="{{ $order->field_name }}" rows="5" cols="33">{{ $order->field_value }}</textarea>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <input type="submit" class="btn btn-success btn-lg btn-block">
                @else
                    <form action="{{ route('orders.sendMessage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input class="hidden" value="{{ $user_id }}" name="user_id">
                        <div class="form-group">
                        <table>
                            <thead>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                @continue($order->field_name !== 'reference' && $order->field_name !== 'message')
                                <tr>
                                    <td class="col-sm-6 col-md-6">
                                        {{ $order->field_name }}
                                    </td>
                                    <td class="col-sm-6 col-md-6">
                                        @if($order->field_type == "file")
                                            @php $extension = substr($order->field_value, strpos($order->field_value, ".") + 1); @endphp
                                            @if(is_null($order->field_value) == false)
                                                <a href="{{ env('APP_URL').$order->field_value }}" download="{{ $order->field_name.'.'.$extension }}">Download</a>
                                                {{ $order->field_name.'.'.$extension }}
                                            @endif
                                            @if(isset($admin) && $admin)
                                                <input class="form-control" type="{{ $order->field_type }}" name="{{ $order->field_name }}" value="{{ old($order->field_name) }}">
                                            @endif
                                        @else
                                            <textarea class="form-control" name="{{ $order->field_name }}" rows="5" cols="33">{{ $order->field_value }}</textarea>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <input type="submit" class="btn btn-success btn-lg btn-block" value="send message to admin">
                    @endif
                </div>
            </form>
            </div>
        </div>
    </div>

    @if(session()->has('success-alert'))
    <div class="alert alert-info" role="alert">
        <strong>{{session()->get('success-alert')}}</strong>
    </div>
    @php Session::forget('success-alert'); @endphp
    @endif



</div>
