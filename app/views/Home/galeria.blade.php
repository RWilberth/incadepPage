@extends('layout')
@section('content')
<div class="row">
    <div class="col-md">
        <div class="top-header">
            <h1 class="page-header">Galeria</h1>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div id="blueimp-gallery" class="blueimp-gallery" data-use-bootstrap-modal="false">
                    <!-- The container for the modal slides -->
                    <div class="slides"></div>
                    <!-- Controls for the borderless lightbox -->
                    <h3 class="title"></h3>
                    <a class="prev">‹</a>
                    <a class="next">›</a>
                    <a class="close">×</a>
                    <a class="play-pause"></a>
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left prev">
                                        <i class="glyphicon glyphicon-chevron-left"></i>
                                        Previous
                                    </button>
                                    <button type="button" class="btn btn-primary next">
                                        Next
                                        <i class="glyphicon glyphicon-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="links">
                    @foreach($rows as $imagesPaths)
                    <div class='row'>
                        @foreach($imagesPaths as $imagePath)
                        <a href="{{$imagePath}}" data-gallery="multiimages" data-title="" class="col-md-4">
                            <img src="{{$imagePath}}" class="img-responsive">
                        </a>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
{{HTML::script('extension/Bootstrap-Gallery-3.1.1/js/bootstrap-image-gallery.min.js')}}
@stop

@section('addScripts')
<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
{{HTML::style('extension/Bootstrap-Gallery-3.1.1/css/bootstrap-image-gallery.min.css')}}
@stop