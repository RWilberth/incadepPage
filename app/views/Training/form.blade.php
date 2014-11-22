
@extends('layout')
@section('addScripts')

<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
{{HTML::style('extension/jQuery-File-Upload-9.8.0/css/jquery.fileupload.css')}}
{{HTML::style('extension/jQuery-File-Upload-9.8.0/css/jquery.fileupload-ui.css')}}
{{HTML::script('extension/jQuery-File-Upload-9.8.0/js/vendor/jquery.ui.widget.js')}}
@stop
@section('content')
<div class='row-fluid'>
    @if(isset($msjErrors))
    <div class="bg-danger text-danger error">
        <ul>
            @foreach($msjErrors as $msjError)
            <li>{{$msjError}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{Form::open(array('url'=>'capacitacion/registro','method'=>'post', 'id'=>'fileupload','files'=>true))}}
    <div class='form-group'>
        <div class="row fileupload-buttonbar">
            <div class="col-lg-7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    {{Form::file('url_image',['class'=>'file', 'id'=>'imgFile'])}}
                </span>
                <span class="fileupload-process"></span>
            </div>
            <div class="col-lg-5 fileupload-progress fade">
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <div class="progress-extended">&nbsp;</div>
            </div>
            <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>

        </div>
    </div>
    <div class='form-group'>
        {{Form::text('name',null, ['class'=>'form-control'])}}
    </div>
    <div class='form-group'>
        {{Form::textarea('description', null, ['class'=>'form-control'])}}
    </div>
    <div class='form-group'>
        {{Form::submit('Registrar',['class'=>'btn btn-primary'])}}
    </div>
    {{Form::close()}}
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
    <td>
    <span class="preview"></span>
    </td>
    <td>
    <p class="name">{%=file.name%}</p>
    <strong class="error text-danger"></strong>
    </td>
    <td>
    <p class="size">Processing...</p>
    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
    </td>
    <td>
    </tr>
    {% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
    <td>
    <span class="preview">
    {% if (file.thumbnailUrl) { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
    {% } %}
    </span>
    </td>
    <td>
    <p class="name">
    {% if (file.url) { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
    {% } else { %}
    <span>{%=file.name%}</span>
    {% } %}
    </p>
    {% if (file.error) { %}
    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
    {% } %}
    </td>
    <td>
    <span class="size">{%=o.formatFileSize(file.size)%}</span>
    </td>
    <td>
    {% if (file.deleteUrl) { %}
    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
    <i class="glyphicon glyphicon-trash"></i>
    <span>Delete</span>
    </button>
    <input type="checkbox" name="delete" value="1" class="toggle">
    {% } else { %}
    <button class="btn btn-warning cancel">
    <i class="glyphicon glyphicon-ban-circle"></i>
    <span>Cancel</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
</script>

<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- blueimp Gallery script -->
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
{{HTML::script('extension/jQuery-File-Upload-9.8.0/js/jquery.iframe-transport.js')}}
{{HTML::script('extension/jQuery-File-Upload-9.8.0/js/jquery.fileupload.js')}}
{{HTML::script('extension/jQuery-File-Upload-9.8.0/js/jquery.fileupload-process.js')}}
{{HTML::script('extension/jQuery-File-Upload-9.8.0/js/jquery.fileupload-image.js')}}
{{HTML::script('extension/jQuery-File-Upload-9.8.0/js/jquery.fileupload-validate.js')}}
{{HTML::script('extension/jQuery-File-Upload-9.8.0/js/jquery.fileupload-ui.js')}}
<script type='text/javascript'>
    /*
    * jQuery File Upload Plugin JS Example 8.9.1
    * https://github.com/blueimp/jQuery-File-Upload
    *
    * Copyright 2010, Sebastian Tschan
    * https://blueimp.net
    *
    * Licensed under the MIT license:
    * http://www.opensource.org/licenses/MIT
    */

    /* global $, window */

    $(function() {
    'use strict';

    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
    'singleFileUploads':true,
    'limitMultiFileUploads':1,
    'replaceFileInput':false,
    'fileInput':$('input#imgFile')
    });




    });
</script>
@stop
