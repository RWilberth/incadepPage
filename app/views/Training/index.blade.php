@extends('layout')
@section('addScripts')
<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
{{HTML::style('extension/Bootstrap-Gallery-3.1.1/css/bootstrap-image-gallery.min.css')}}
@if(Auth::check())
    <script type="text/javascript">
        $(document).ready(function() {
            $(".toogle-checkbox").change(function() {
                $.ajax({
                    url: './capacitacion/activar-desactivar',
                    type: 'post',
                    data: {
                        'id': $(this).val(),
                        'is_active': $(this).is(":checked")
                    },
                    success: function(data) {
                        alert(data);
                    }
                });
            });
        });
    </script>
@endif
@stop
@section('content')
@if(Auth::check())
{{HTML::linkAction('TrainingController@create', 'Registrar taller',null, ['class'=>'btn btn-primary']);}}
@endif
<div id="blueimp-gallery" class="blueimp-gallery" data-use-bootstrap-modal="true">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <p class="description"></p>
    <a class="close">×</a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <p class="description"></p>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>
<div id="links">
    @foreach($trainings as $training)
    <h4>
        {{$training->name}}
    </h4>
    <a data-description="{{$training->description}}" data-gallery="" title="{{$training->name}}" 
       href="{{ServerConstants::TRAINING_IMG_PATH.$training->url_image}}">
        <img src="{{ServerConstants::TRAINING_IMG_PATH.$training->url_image}}">
    </a>
    <span class='fieldDescription'>
        {{$training->description}}
    </span>
    @if(Auth::check())
    <div>
        {{Form::checkbox('training',$training->id,$training->is_active, ['class'=>'toogle-checkbox'])}}
        Activar/Desactivar
        <a href="{{URL::action('TrainingController@edit', ['id'=>$training->id])}}" class='btn btn-primary'><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
    </div>
    @endif
    <br />

    @endforeach
</div>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
{{HTML::script('extension/Bootstrap-Gallery-3.1.1/js/bootstrap-image-gallery.min.js')}}

@stop;