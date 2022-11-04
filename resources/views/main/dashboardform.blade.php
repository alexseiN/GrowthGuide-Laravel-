  @include ('main.header');

  <style>
    label {
    /* Other styling... */
    text-align: right;
    clear: both;
    float:left;
    margin-right:15px;
    }
  </style>

  <section class="mt-20">
    <div class="Container">
      <div>
        <div class="col-md-12 col-sm-12 d-flex align-items-center justify-content-center">
          <form class="contact w-50" action="{{ route('form.respond') }}" method="POST">
            @csrf
            <h2>Dashboard Form</h2>
            @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>Error!</strong> validation error occurred
                    </div>
                @endif

                @if(session('mail_sent') == 1)
                    <div class="alert alert-success" role="alert">
                        <strong>Success!</strong> form data sent via email
                    </div>
                @endif

                @if(session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success!</strong> {{ session()->get('message') }}
                    </div>
                @endif

                <div class="card bg-light mb-3">
                    <div class="card-body">
                        @if(count($fields) > 0)
                            <form action="{{ route('submit.form') }}" method="post">
                                @csrf
                                <input type="hidden" name="form_id" value="{{ $form_id }}" />
                                <input type="hidden" name="field_ids" value="{{ $field_ids }}" />

                                @foreach($fields as $field)
                                    @php
                                        $options = $field->pivot->options? json_decode($field->pivot->options) : null;
                                        // $field_name = 'field_' . $field->pivot->id;
                                        $field_name = $options->label . ';' . $field->pivot->id;
                                        $id_for = 'input-fld-'. $loop->iteration;
                                    @endphp

                                    <div class="form-group">
                                        @if($options->label)
                                            <label for="{{ $id_for }}">{{ $options->label }}*</label>
                                        @endif

                                        @switch($field->field_type)
                                            @case("select")
                                                <select id="{{ $id_for }}" name={{ $field_name }} class="custom-select @error($field_name) is-invalid @enderror">
                                                    <option value="">Choose...</option>
                                                    @foreach(explode(",", $options->values) as $value)
                                                    <option value="{{ trim($value) }}" {{ old($field_name) == trim($value)? "selected" : "" }}>{{ trim($value) }}</option>
                                                    @endforeach
                                                </select>
                                                @break

                                            @case("textarea")
                                                <textarea class="form-control @error($field_name) is-invalid @enderror" id="{{ $id_for }}" name="{{ $field_name }}" rows="{{ $options->rows }}">{{ old($field_name) }}</textarea>
                                                @break

                                            @default
                                                <input type="{{ $options->type == 'date' ? 'text' : $options->type }}" class="form-control {{ $options->type == 'date'? 'datepicker' : '' }} @error($field_name) is-invalid @enderror" name="{{ $field_name }}" id="{{ $id_for }}" value="{{ old($field_name) }}" />
                                        @endswitch

                                        @error($field_name)
                                            <div class="invalid-feedback">
                                                {{ $errors->first($field_name) }}
                                            </div>
                                        @enderror
                                    </div>
                                @endforeach

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-success btn-lg btn-block w-100">
                                        <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit
                                    </button>
                                </div>
                            </form>
                        @endif

        </div>
      </div>
    </form>
        </div>
    </div>
</div>
</section>

  @include ('main.footer');
