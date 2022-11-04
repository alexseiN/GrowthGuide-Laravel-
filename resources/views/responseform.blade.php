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
                                    @php $extension = explode('.', $order->field_value)[1] @endphp
                                    @if(is_null($order->field_value) == false)
                                        <a href="{{ env('APP_URL').$order->field_value }}" download="{{ $order->field_name.'.'.$extension }}">Download</a>
                                        {{ $order->field_name.'.'.$extension }}
                                    @endif
                                    @if($admin)
                                        <input class="form-control" type="{{ $order->field_type }}" name="{{ $order->field_name }}" value="{{ old($order->field_name) }}">
                                    @endif
                                @else
                                    <textarea class="form-control" name="{{ $order->field_name }}" class="form-control" rows="5" cols="33">
                                        {{ $order->field_value }}
                                    </textarea>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($admin)
                    <input type="submit" class="btn btn-success btn-lg btn-block">
                @endif
                </div>
            </form>
            </div>
        </div>
    </div>




</div>
