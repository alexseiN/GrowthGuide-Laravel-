<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSC</title>
    <link rel="stylesheet" href="css/formdashboard.css">
    <link rel="stylesheet" href="css/header1.css">
    <script src="https://kit.fontawesome.com/283605f283.js" crossorigin="anonymous"></script>
</head>

<body>
 @include('assets.header1');
 <br>
 <br>
    <div class="container">
        <div class="typewriter">
            <h1>Digital Signature Certificate</h1>
        </div>
    <div class="contain">
    <form method="POST" action="{{ route('submit.order') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="form_id" value="{{ $form_id }}" />
        <input type="hidden" name="field_ids" value="{{ $field_ids }}" />
        <input type="hidden" name="service_id" value="{{ $service_id }}" />

        @foreach($fields as $field)
            @php
                $options = $field->pivot->options? json_decode($field->pivot->options) : null;
                // $field_name = 'field_' . $field->pivot->id;
                $field_name = $options->label . ';' . $field->pivot->id;
                $id_for = 'input-fld-'. $loop->iteration;
            @endphp
            <div class="row">
                @if($options->label)
                <div class="col-25">
                    <label for="{{ $id_for }}">{{ $options->label }}*</label>
                </div>
                @endif
                <div class="col-75">
                    @switch($field->field_type)
                        @case("select")
                            <select id="{{ $id_for }}" name={{ strtolower($options->label) }} class="custom-select @error($field_name) is-invalid @enderror">
                                <option value="">Choose...</option>
                                @foreach(explode(",", $options->values) as $value)
                                <option value="{{ trim($value) }}" {{ old($field_name) == trim($value)? "selected" : "" }}>{{ trim($value) }}</option>
                                @endforeach
                            </select>
                            @break

                        @case("textarea")
                            <textarea class="form-control @error($field_name) is-invalid @enderror" id="{{ $id_for }}" name={{ strtolower($options->label) }} rows="{{ $options->rows }}">{{ old($field_name) }}</textarea>
                            @break

                        @default
                            <input type="{{ $options->type == 'text' ? 'text' : $options->type }}"  name={{ strtolower($options->label) }} id="{{ $id_for }}"/>
                    @endswitch
                </div>
                @error($field_name)
                    <div class="invalid-feedback">
                        {{ $errors->first($field_name) }}
                    </div>
                @enderror
            </div>
        @endforeach
        <br>
        <div class="row">
        <div id="div2"></div>
        <input type="submit" id="btnok" onclick="addText();" value="Submit" />
        <br />
        </div>
        <script type="text/javascript" src="js/form.js"></script>
</form>
<h6><B>*</B>Fields with " * " marked are compulsary</h6>
</div>

</body>

</html>
