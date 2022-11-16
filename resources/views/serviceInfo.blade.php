@extends('layouts.main')

@push('styles')

@endpush

@section('content')
    <div class="section mb-5">

        <div class="col-12 col-lg-12 col-md-6">
            @if(session()->has('success1'))
                <div class="alert alert-info" role="alert">
                    <strong>{{session()->get('success1')}}</strong>
                </div>
                @endif
            <form method="POST" action="{{ route('save.serviceinfo') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                        <label class="lead" for="Category_list"> Select Service </label>
                        <select name="ser_id" id="ser_id" style="width:100%">
                        @foreach($services as $service)
                            @if(array_key_first($_GET) == $service->id)
                                <option value="{{$service->id}}" selected>{{$service->service_name}}</option>
                            @else
                               <option value="{{$service->id}}">{{$service->service_name}}</option>
                            @endif
                        @endforeach
                        </select>
                      @if($errors->has('service_list'))
                      <p class="text-danger">{{$errors->first('service_list')}}</p>
                      @endif
                </div>

                <div class="service-content card mt-5">
                    <div class="card-header">Content</div>
                    <div class="card-body">
                        <label>Title</label> <br/>
                        <input type="text" size="100" name="title" value={{ isset($service_detail)?$service_detail->title:null }}> <br/>
                        <label>Subtitle</label><br/>
                        <textarea  cols="100" name="subtitle" >
                            {{ isset($service_detail)?$service_detail->subtitle:null }}
                        </textarea><br/>

                        @php
                            $content_arr = array('','','','','');
                            $detail_arr = array('','','','','');
                            if (isset($service_detail)) {
                                $content_arr[0] = $service_detail->content_1;
                                $content_arr[1] = $service_detail->content_2;
                                $content_arr[2] = $service_detail->content_3;
                                $content_arr[3] = $service_detail->content_4;
                                $content_arr[4] = $service_detail->content_5;
                                $detail_arr[0] = $service_detail->detail_1;
                                $detail_arr[1] = $service_detail->detail_2;
                                $detail_arr[2] = $service_detail->detail_3;
                                $detail_arr[3] = $service_detail->detail_4;
                                $detail_arr[4] = $service_detail->detail_5;
                            }
                        @endphp

                        @for ($i = 0; $i < 5; $i ++)
                            <label>Content (Part {{ $i+1 }})</label> <br/>
                            <input type="text" size="100" name="content_{{ $i+1 }}" value={{ $content_arr[$i] }}> <br/>
                            <label>Detail (Part {{ $i+1 }})</label><br/>
                            <textarea  cols="100" name="detail_{{ $i+1 }}">{{ $detail_arr[$i] }}</textarea><br/>
                        @endfor
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit Service Information">

                </div>
            </form>

    </div>
</div>





@endsection
@push('scripts')

<script>
    window._rav = window._rav || {};
    _rav.save_route = "{{ route('save.serviceinfo') }}";
</script>


<script>
    var select = document.querySelector('#ser_id');
    select.addEventListener('change', function(){
        window.location.href="/service-info?"+select.value;
    })
</script>
@endpush
