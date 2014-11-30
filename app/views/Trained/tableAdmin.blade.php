<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Celular</th>
            <th>Facebook</th>
            <th>Twitter</th>
            <th>Taller inscrito</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($traineds as $trained)
        <tr>
            <td>
                {{$trained->father_last_name." ".$trained->mother_last_name." ".$trained->name}}
            </td>
            <td>
                {{$trained->email}}
            </td>
            <td>
                {{$trained->celphone}}
            </td>
            <td>
                {{$trained->telephone}}
            </td>
            <td>
                {{$trained->facebook}}
            </td>
            <td>
                {{$trained->twitter}}
            </td>
            <td>
                {{$trained->training->name}}
            </td>
            <td>
                <button id="eliminar" onclick="deleteTrained({{$trained->id}});" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
