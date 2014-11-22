<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        {{HTML::script('jquery/jquery-1.11.1.js')}}
        {{HTML::style('bootstrap-3.2.0/css/bootstrap.css')}}
        {{HTML::script('bootstrap-3.2.0/js/bootstrap.js')}}
        {{HTML::style('css/site.css')}}
        <script type='text/javascript'>
        </script>
    </head>
    <body>
        <div class="modal show">
            <div class="modal-dialog">
                <div class="modal-content">
                    {{Form::open(array('url'=>'login','method'=>'post'))}}
                    <div class="modal-header">
                        <h4 class="modal-title">Iniciar sesion</h4>
                    </div>
                    <div class="modal-body">
                        <div class='form-group'>
                            {{Form::label('email', 'Correo electronico');}}
                            {{Form::text('email', null, ['class'=>'form-control'])}}
                        </div>

                        <div class='form-group'>
                            {{Form::label('password', 'Contraseña');}}
                            {{Form::password('password', ['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{Form::submit('Iniciar sesion',['class'=>'btn btn-primary']);}}
                    </div>
                    {{Form::close()}}
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </body>
</html>