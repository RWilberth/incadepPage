@extends('layout')
@section('content')
<h2>Registro para capacitación</h2>
@if(isset($msjErrors))
<div class="bg-danger text-danger error">
    <ul>
        @foreach($msjErrors as $msjError)
        <li>{{$msjError}}</li>
        @endforeach
    </ul>
</div>
@endif
{{Form::open(array('url'=>'capacitado/registro','method'=>'post'))}}
<div class='form-group'>
    {{Form::label('father_last_name', 'Apellido paterno');}}
    {{Form::text('father_last_name', null, ['class'=>'form-control'])}}
</div>

<div class='form-group'>
    {{Form::label('mother_last_name', 'Apellido materno');}}
    {{Form::text('mother_last_name', null, ['class'=>'form-control'])}}
</div>

<div class='form-group'>
    {{Form::label('name', 'Nombre');}}
    {{Form::text('name', null, ['class'=>'form-control'])}}
</div>

<div class='form-group'>
    {{Form::label('email', 'Correo electronico');}}
    {{Form::email('email', null, ['class'=>'form-control'])}}
</div>
<div class='form-group'>
    {{Form::label('telephone', 'Telefono');}}
    {{Form::text('telephone', null, ['class'=>'form-control'])}}
</div>
<div class='form-group'>
    {{Form::label('celphone', 'Telefono celular');}}
    {{Form::text('celphone', null, ['class'=>'form-control'])}}
</div>
<div class='form-group'>
    {{Form::label('training_id', 'capacitacion');}}
    {{Form::select('training_id',$trainings,null, ['class'=>'form-control'])}}
</div>

<div>
{{Form::captcha(array('theme' => 'white','lang'=>'es'))}}
</div>
<div>
    {{Form::submit('Registrar',['class'=>'btn btn-primary']);}}
</div>
{{Form::close()}}
@stop