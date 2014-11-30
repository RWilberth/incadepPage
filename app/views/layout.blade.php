<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Laravel PHP Framework</title>
        {{HTML::script('jquery/jquery-1.11.1.js')}}
        {{HTML::style('bootstrap-3.2.0/css/bootstrap.css')}}
        {{HTML::script('bootstrap-3.2.0/js/bootstrap.js')}}
        {{HTML::style('css/site.css')}}
        {{HTML::style('extension/social_feed/css/jquery.socialfeed.css')}}
        {{HTML::script('extension/social_feed/js/jquery.socialfeed.js')}}
        {{HTML::style('extension/bootstrap-social/assets/css/font-awesome.css')}}
        {{HTML::style('extension/bootstrap-social/assets/css/docs.css')}}
        {{HTML::script('extension/bootstrap-social/assets/js/docs.js')}}
        {{HTML::style('extension/bootstrap-social/bootstrap-social.css')}}
        @yield('addScripts')
        <script type='text/javascript'>
            $('#menu a').click(function(e) {
                e.preventDefault();

                var url = $(this).attr("data-url");
                var href = this.hash;
                var pane = $('#container');

                // ajax load from data-url
                $(href).load(url, function(result) {
                    pane.html(result);
                });
            });
        </script>
    </head>
    <body>
        {{HTML::image('img/incadep_logo.jpg','logo',['class'=>'img-responsive',  'style'=> 'height: 150px;'])}}
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header" id='menu'>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Incadep</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="{{$page==UIConstants::ID_PAGE_INDEX?'active':''}}"><a href="{{url('home/')}}">¿Quienes somos?</a></li>
                        <li class="{{$page==UIConstants::ID_PAGE_CAPACITACION?'active':''}}"><a href="{{url('capacitaciones')}}">Capacitaciones</a></li>
                        <li class="{{$page==UIConstants::ID_PAGE_GALERIA?'active':''}}"><a href="{{url('galeria')}}">Galeria</a></li>
                        <li class="{{$page==UIConstants::ID_PAGE_CONTACTO?'active':''}}"><a href="{{url('contacto')}}">Contacto</a></li>
                        <li class="{{$page==UIConstants::ID_PAGE_REGISTRO?'active':''}}"><a href="{{url('capacitado/registro')}}">Registro</a></li>
                        <li class=""><a href="{{url('admin/capacitados')}}">Administación de capacitados</a></li>
                        @if(Auth::check())
                            <li><a href="{{url('usuario/logout')}}">Cerrar session</a></li>
                        @endif
                    </ul>

                    <ul class="nav navbar-nav navbar-right" >
                        <li>
                            <a class="btn btn-block btn-social btn-facebook" style='color: #FFF;'>
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-block btn-social btn-twitter" style='color: #FFF;'>
                                <i class="fa fa-twitter"></i>
                            </a></li>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container" id='container'>
            @yield('content')
        </div>
    </body>
    <script>
        $(document).ready(function() {
            $('.social-feed-container').socialfeed({
                // FACEBOOK
                facebook: {
                    accounts: ['@dolomiti'],
                    limit: 2,
                    access_token: '150849908413827|a20e87978f1ac491a0c4a721c961b68c'
                },
               
                length: 200,
                show_media: true,
                // Moderation function - if returns false, template will have class hidden
                moderation: function(content) {
                    return  (content.text) ? content.text.indexOf('fuck') == -1 : true;
                },
                //update_period: 5000,
                // When all the posts are collected and displayed - this function is evoked
                callback: function() {
                    console.log('all posts are collected');
                }
            });
        });
    </script>
</html>
