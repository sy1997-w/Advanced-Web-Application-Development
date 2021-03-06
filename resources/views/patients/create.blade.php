<?php
    use App\Common;
?>
@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- New Patient Form -->
        {!! Form::model($patient, [ 'route' => ['patient.store'], 'class' => 'form-horizontal' ]) !!}
       
        <!-- patient_no -->
        <div class="form-group row">
            {!! Form::label('patient-patient_no', 'Patient ID', ['class' => 'control-label col-sm-3',]) !!}
            <div class="col-sm-9">
                {!! Form::text('patient_no', null, ['id' => 'patient-patient_no','class' => 'form-control','maxlength' => 10,]) !!}
                <small class="form-text text-muted">Format: PID-XXXXX </small>
            </div>
        </div>

        <!-- Name -->
        <div class="form-group row">
                {!! Form::label('patient-name', 'Name', ['class' => 'control-label col-sm-3',]) !!}
                <div class="col-sm-9">
                    {!! Form::text('name', null, ['id' => 'patient-name','class' => 'form-control','maxlength' => 100,]) !!}
                </div>
        </div>

        <!-- NRIC -->
        <div class="form-group row">
            {!! Form::label('patient-nric', 'Nric', ['class' => 'control-label col-sm-3',]) !!}
                <div class="col-sm-9">
                    {!! Form::text('nric', null, ['id' => 'patient-nric','class' => 'form-control','maxlength' => 14,]) !!}
                    <small id="nricformat" class="form-text text-muted">Format: XXXXXX-XX-XXXX </small>
                </div>
        </div>

        <!-- Gender -->
        <div class="form-group row">
            {!! Form::label('patient-gender', 'Gender', ['class' => 'control-label col-sm-3',]) !!}
        
            <div class="col-sm-9">
            <!--{!! Form::select('gender', Common::$genders, null, ['class' => 'form-control','placeholder' => '- Select Gender -',]) !!}-->
                
                    @foreach(Common::$genders as $key => $val)
                    {!! Form::radio('gender', $key) !!} {{$val}}
                    @endforeach
            </div>
        </div> 

        <!-- Phone -->
        <div class="form-group row">
            {!! Form::label('patient-phone', 'Phone', ['class' => 'control-label col-sm-3',]) !!}
                <div class="col-sm-9">
                    {!! Form::text('phone', null, ['id' => 'patient-phone','class' => 'form-control','maxlength' => 20,]) !!}
                    <small class="form-text text-muted">Format: XXX-XXXXXXX </small> 
                </div>
        </div>

        <!-- Address -->
        <div class="form-group row">
            {!! Form::label('patient-address', 'Address', ['class' => 'control-label col-sm-3',]) !!}
                <div class="col-sm-9">
                    {!! Form::textarea('address', null, ['id' => 'patient-address','class' => 'form-control',]) !!}
                </div>
        </div>
    
        <!-- Postcode -->
        <div class="form-group row">
            {!! Form::label('patient-postcode', 'Postcode', ['class' => 'control-label col-sm-3',]) !!}
            <div class="col-sm-9">
                {!! Form::text('postcode', null, ['id' => 'patient-postcode','class' => 'form-control','maxlength' => 5,]) !!}
            </div>
        </div>
        
        <!-- City -->
        <div class="form-group row">
            {!! Form::label('patient-city', 'City', ['class' => 'control-label col-sm-3',]) !!}
            <div class="col-sm-9">
                {!! Form::text('city', null, ['id' => 'patient-city','class' => 'form-control','maxlength' => 50,]) !!}
            </div>
        </div>
        
        <!-- State -->
        <div class="form-group row">
            {!! Form::label('patient-state', 'State', ['class' => 'control-label col-sm-3',]) !!}
            <div class="col-sm-9">
                {!! Form::select('state', Common::$states,null, ['class' => 'form-control','placeholder' => '- Select State -',]) !!}
            </div>
        </div>
    
        <!-- Submit Button -->
        <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
                {!! Form::button('Save', ['type' => 'submit','class' => 'btn btn-primary',]) !!}
            </div>
        </div>
            {!! Form::close() !!}
    </div>

@endsection