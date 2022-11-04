<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator, DB, Mail};
use App\{Form, FormField, DbFormField, Field};
use App\Mail\FormSubmitted;
use App\Models\category;
use App\Models\service;
use App\Models\verifiedUser;

class FormBuilder extends Controller
{
    /**
     * show the builder
     */
    public function showBuilder(Request $request) {
        $service_id = $request->keys()[0];

        $form_id = Form::where('service_id', $service_id)->pluck('id');

        $fields = Field::all()->mapWithKeys(function ($field) {
            return [$field->field_type => $field->id];
        });

        $id = -1;
        if (count($form_id)) $id = $form_id[0];

        $builder_fields = FormField::where('form_id', $id)->orderBy('id', 'asc');

        if($builder_fields->exists()) {
            $field_data = $builder_fields->get()->map(function($field) use ($fields) {
                switch ($fields->search($field->field_id)) {
                    case 'select':
                        $field_config_data = [
                            'type'=> 'select',
                            'additionalConfig'=> [
                                'listOptions' => $field->options->values
                            ]
                        ];

                        break;

                    case 'textarea':
                        $field_config_data = [
                            'type'=> 'textarea',
                            'additionalConfig'=> [
                                'textAreaRows' => $field->options->rows
                            ]
                        ];

                        break;

                    default:
                        if($field->options->type != "date") {
                            $field_config_data = [
                                'type'=> 'input',
                                'additionalConfig'=> [
                                    'inputType' => $field->options->type
                                ]
                            ];
                        }
                        else {
                            $field_config_data = [
                                'type'=> 'date',
                                'additionalConfig'=> []
                            ];
                    }

                }

                $common_data = [
                    'id' => $field->id,
                    'label'=> $field->options->label,
                    'isRequired'=> $field->options->validation->required == 1? true : false,
                ];

                return [array_merge($common_data, $field_config_data)];
            });
        }
        $categories=category::all();
        $services=service::all();

        $data = [
            'title' => 'form builder',
            'builder_data' => $builder_fields->exists()? $field_data->flatten(1)->toArray() : []
        ];
        //return View::make('builder', $data);
        return view('builder', $data , ['categories'=>$categories,'services'=>$services]);
    }


    public function showDashboardBuilder(Request $request) {
        $service_id = $request->keys()[0];

        $form_id = Form::where('service_id', $service_id)->pluck('id');


        $fields = Field::all()->mapWithKeys(function ($field) {
            return [$field->field_type => $field->id];
        });

        $id = -1;
        if (count($form_id)) $id = $form_id[0];

        $builder_fields = DbFormField::where('form_id', $id)->orderBy('id', 'asc');

        if($builder_fields->exists()) {
            $field_data = $builder_fields->get()->map(function($field) use ($fields) {
                switch ($fields->search($field->field_id)) {
                    case 'select':
                        $field_config_data = [
                            'type'=> 'select',
                            'additionalConfig'=> [
                                'listOptions' => $field->options->values
                            ]
                        ];

                        break;

                    case 'textarea':
                        $field_config_data = [
                            'type'=> 'textarea',
                            'additionalConfig'=> [
                                'textAreaRows' => $field->options->rows
                            ]
                        ];

                        break;

                    case 'file':
                        $field_config_data = [
                            'type'=> 'file',
                            'additionalConfig' => []
                        ];
                        break;

                    default:
                        if($field->options->type != "date") {
                            $field_config_data = [
                                'type'=> 'input',
                                'additionalConfig'=> [
                                    'inputType' => $field->options->type
                                ]
                            ];
                        }
                        else {
                            $field_config_data = [
                                'type'=> 'date',
                                'additionalConfig'=> []
                            ];
                    }

                }

                $common_data = [
                    'id' => $field->id,
                    'label'=> $field->options->label,
                    'isRequired'=> $field->options->validation->required == 1? true : false,
                ];

                return [array_merge($common_data, $field_config_data)];
            });
        }
        $categories=category::all();
        $services=service::all();

        $data = [
            'title' => 'Dashboard Form builder',
            'builder_data' => $builder_fields->exists()? $field_data->flatten(1)->toArray() : []
        ];
        //return View::make('builder', $data);
        return view('dashboardbuilder', $data , ['categories'=>$categories,'services'=>$services]);
    }



    /**
     * show the form
     */
    public function showForm(Request $request) {

        $service_id = $request->keys()[0];

        $form_id_toshow = Form::where('service_id', $service_id)->pluck('id');
        $categories=category::all();
        $services=service::all();

        if(count($form_id_toshow) == 0) {
            return view('main.return', ['categories'=>$categories,'services'=>$services]);
        }


        $the_form = Form::findOrFail($form_id_toshow[0]);

        $field_map_ids = FormField::where('form_id', $form_id_toshow[0])->select('id')->pluck('id')->toArray();

        $data = [
            'title' => 'the form',
            'fields' => $the_form->fields()->where('form_id', $form_id_toshow[0])->orderBy('form_fields.id', 'asc')->get(),
            'form_id' => $form_id_toshow[0],
            'field_ids' => implode(",", $field_map_ids)
        ];

        //return view('form', $data);
        return view('main.dbform', $data, ['categories'=>$categories,'services'=>$services]);
    }

    /**
     * show the form
     */
    public function showDashboardForm() {

        $user = Auth::user();
        $service_id = verifiedUser::where('email', $user->email)->pluck('provider_id')[0];

        $form_id_toshow = Form::where('service_id', $service_id)->pluck('id');
        $categories=category::all();
        $services=service::all();

        if(count($form_id_toshow) == 0) {
            return view('main.return', ['categories'=>$categories,'services'=>$services]);
        }


        $the_form = Form::findOrFail($form_id_toshow[0]);

        $field_map_ids = DbFormField::where('form_id', $form_id_toshow[0])->select('id')->pluck('id')->toArray();

        $data = [
            'title' => 'the form',
            'fields' => $the_form->dbfields()->where('form_id', $form_id_toshow[0])->orderBy('db_form_fields.id', 'asc')->get(),
            'form_id' => $form_id_toshow[0],
            'field_ids' => implode(",", $field_map_ids)
        ];

        //return view('form', $data);
        return view('dashboard', $data, ['categories'=>$categories,'services'=>$services, 'service_id'=>$service_id]);
    }


    /**
     * handle form submit request
     */
    public function handleFormRequest(Request $request) {
        // must have data
        $validator = Validator::make($request->all(), [
            'form_id' => 'required|integer|exists:forms,id',
            'field_ids' => 'required|string',
        ]);

        abort_if($validator->fails(), 422, "Data error");

        // generating validation rules based on dynamic field config data
        $field_map_ids = explode(",", $request->input('field_ids'));

        $field_required_rules = collect($field_map_ids)->mapWithKeys(function($id){
            $field_options = FormField::findOrFail($id)->options;
            if($field_options->validation->required == 1) {
                $rules = ['required'];
                if(isset($field_options->type) && $field_options->type == "email") $rules[] = 'email';

                return [
                    'field_'. $id => implode("|", $rules)
                ];
            }
            else {
                return ['field_'. $id => 'nullable'];
            }
        });

        // validation based on dynamic data
        $dynamic_validator = Validator::make($request->all(), $field_required_rules->toArray(), [
            'required' => "field can't be left blank",
            'email' => 'field must be a valid email address'
        ]);

        if ($dynamic_validator->fails()) {
            return redirect()->back()
                        ->withErrors($dynamic_validator)
                        ->withInput();
        }

        // gather the form data as field_name => [ label, data ]
        $form_data = collect($field_map_ids)->mapWithKeys(function($id) use ($request){
            $field_options = FormField::findOrFail($id)->options;
            $field_name = 'field_'. $id;
            return [
                $field_name => [
                    $field_options->label, $request->input($field_name)
                ]
            ];
        });


        Mail::to("kumawat.k@shim-bi.com")->send(new FormSubmitted($form_data));
         //return new FormSubmitted($form_data);

        return redirect()->back()->with('mail_sent', 1);
    }

    /**
     * handle form data ajax request save
     */
    public function saveForm(Request $request) {
        $request->validate([
            'form_fields_data' => 'required|json',
            'ser_id' => 'required|string'
        ]);

        $service_id = $request->ser_id;

        $fields = Field::all()->mapWithKeys(function ($field) {
            return [$field->id => $field->field_type];
        });

        // data from ajax request
        $field_data = collect(json_decode($request->form_fields_data));

        $config = $field_data->map(function($field) use ($fields){
            switch ($field->type) {
                case 'input':
                    $field_id = $fields->search('input');

                    $additional_config = ['type' => $field->additionalConfig->inputType];
                    break;

                case 'select':
                    $field_id = $fields->search('select');

                    $values = collect($field->additionalConfig->listOptions)->map(function($opt){
                        return trim($opt);
                    })->implode(',');

                    $additional_config = ['values' => $values, 'type' => 'select'];
                    break;

                case 'textarea':
                    $field_id = $fields->search('textarea');

                    $additional_config = ['rows' => $field->additionalConfig->textAreaRows, 'type'=>'textarea'];
                    break;

                case 'date':
                    $field_id = $fields->search('input');
                    $additional_config = ['type' => 'date'];
                    break;

                case 'file':
                    $field_id = $fields->search('input');
                    $additional_config = ['type' => 'file'];
                    break;


                default:
                    $field_id = 0;
                    $additional_config = [];
                    break;
            }

            $common_data = [
                'label' => $field->label,
                'validation' => [
                    'required' => $field->isRequired ? 1 : 0
                ]
            ];

            return ['field' => $field_id, 'options' => array_merge($common_data, $additional_config)];
        });

        // attempt data save
        $save_success = 1;

        DB::transaction(function () use ($config, $service_id) {
            $form = Form::updateOrCreate(['service_id' => $service_id], ['form_name' => 'Test Form']);
            // $form->service_id = $service_id;
            // $form->save();

            try {
                $form->fields()->detach();
                $config->each(function($item) use ($form){
                    $form->fields()->attach($item['field'],
                    [
                        'options' => json_encode($item['options']),
                    ]);
                });
            } catch (Exception $e) {
                $save_success = 0;
            }
        });

        return response()->json([
            'success' => $save_success
        ]);
    }

        /**
     * handle form data ajax request save
     */
    public function saveDashboardForm(Request $request) {

        $request->validate([
            'form_fields_data' => 'required|json',
            'ser_id' => 'required|string'
        ]);

        $service_id = $request->ser_id;

        $fields = Field::all()->mapWithKeys(function ($field) {
            return [$field->id => $field->field_type];
        });

        // data from ajax request
        $field_data = collect(json_decode($request->form_fields_data));

        $config = $field_data->map(function($field) use ($fields){
            switch ($field->type) {
                case 'input':
                    $field_id = $fields->search('input');

                    $additional_config = ['type' => $field->additionalConfig->inputType];
                    break;

                case 'select':
                    $field_id = $fields->search('select');

                    $values = collect($field->additionalConfig->listOptions)->map(function($opt){
                        return trim($opt);
                    })->implode(',');

                    $additional_config = ['values' => $values, 'type' => 'select'];
                    break;

                case 'textarea':
                    $field_id = $fields->search('textarea');

                    $additional_config = ['rows' => $field->additionalConfig->textAreaRows, 'type' => 'textarea'];
                    break;

                case 'date':
                    $field_id = $fields->search('input');
                    $additional_config = ['type' => 'date'];
                    break;

                case 'file':
                    $field_id = $fields->search('input');
                    $additional_config = ['type' => 'file'];
                    break;


                default:
                    $field_id = 0;
                    $additional_config = [];
                    break;
            }

            $common_data = [
                'label' => $field->label,
                'validation' => [
                    'required' => $field->isRequired ? 1 : 0
                ]
            ];

            return ['field' => $field_id, 'options' => array_merge($common_data, $additional_config)];
        });

        // attempt data save
        $save_success = 1;

        DB::transaction(function () use ($config, $service_id) {
            $form = Form::updateOrCreate(['service_id' => $service_id], ['form_name' => 'Test Form']);
            // $form->service_id = $service_id;
            // $form->save();

            try {
                $form->dbfields()->detach();
                $config->each(function($item) use ($form){
                    $form->dbfields()->attach($item['field'],
                    [
                        'options' => json_encode($item['options']),
                    ]);
                });
            } catch (Exception $e) {
                $save_success = 0;
            }
        });

        return response()->json([
            'success' => $save_success
        ]);
    }

}
