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
            <form method="POST" action="/save-dashboardform/{'ser_id'}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                        <label class="lead" for="Category_list"> Select Service Type</label>
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
            </form>
    </div>
</div>




    <div class="section">
        {{-- react app root --}}
        <div class="row" id="builder-app"></div>

        <div id="modal-root"></div>
    </div>

@endsection

@push('scripts')
    <script>
        window._rav = window._rav || {};
        _rav.save_route = "{{ route('save.dashboardform') }}";
        _rav.boardData = @json($builder_data);
    </script>

        <script src="{{ asset('js/formbuilder/main.js') }}"></script>
    <script>
        var select = document.querySelector('#ser_id');
        select.addEventListener('change', function(){
            window.location.href="/form-dashboard?"+select.value;
        })
    </script>
@endpush
