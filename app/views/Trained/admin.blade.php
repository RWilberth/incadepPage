@extends('layout')
@section('addScripts')
<script type='text/javascript'>
    function search() {
        $.ajax({
            url: "{{url('search/capacitados')}}",
            type: 'post',
            dataType: 'html',
            data: $("#form").serialize(),
            success: function(data) {
                $('#table').empty();
                $('#table').append(data);
            }
        });
    }
    function deleteTrained(id){
        $.ajax({
            url: "../capacitados/"+id,
            type: 'delete',
            dataType: 'json',
            data: {id: id},
            success: function(data) {
               if(data=="success"){
                    search();
               }
            }
        });
    }
    $(document).ready(function() {
        $("#searchForm").toggle();
        $.ajax({
            url: "{{url('search/capacitados')}}",
            type: 'post',
            dataType: 'html',
            success: function(data) {
                $('#table').append(data);
            }
        });
        $("button#search").click(function() {
            $("#searchForm").toggle();
        });
        $("input#name").keyup(search);
        $("input#father_last_name").keyup(search);
        $("input#mother_last_name").keyup(search);
        $("input#email").keyup(search);
        $("select#training_id").change(search);
    });
</script>
@stop
@section('content')
<h1>Administración  de suscripción</h1>
<button id='search' class='btn btn-success'>Busqueda avanzada</button>
{{Form::open(array('url'=>'search/registro','method'=>'post', 'id'=>'form'))}}
<div id='searchForm'>
    <div class='form-group'>
        {{Form::label('name', 'Nombre');}}
        {{Form::text('name', null, ['class'=>'form-control'])}}
    </div>
    <div class='form-group'>
        {{Form::label('father_last_name', 'Apellido paterno');}}
        {{Form::text('father_last_name', null, ['class'=>'form-control'])}}
    </div>
    <div class='form-group'>
        {{Form::label('mother_last_name', 'Apellido materno');}}
        {{Form::text('mother_last_name', null, ['class'=>'form-control'])}}
    </div>
    <div class='form-group'>
        {{Form::label('email', 'Correo electronico');}}
        {{Form::text('email', null, ['class'=>'form-control'])}}
    </div>
</div>
<div class='form-group'>
    {{Form::label('training_id', 'capacitacion');}}
    {{Form::select('training_id',$trainings,'', ['class'=>'form-control'])}}
</div>
{{Form::close()}}
<div id='table'></div>
@stop
