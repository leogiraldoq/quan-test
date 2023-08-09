@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (Cookie::get('api'))
                        <div class="alert alert-success" role="alert">
                            {{ $user['message'] }}
                        </div>
                    @endif
                    <div class="col-12">
                        <div class="col-8">
                            <p>
                                <h3>Módulo Usuarios</h3>
                                @if(in_array('Create',$user['permisions']))
                                    <a href="{{ route('usercreate') }}" class="btn btn-outline-success">Crear Usuario</a>
                                @endif
                            </p>
                        </div>
                        
                    </div>
                    <div class="col-12">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Permisos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user['list'] as $person)
                                    <td>{{$person['name']}}</td>
                                    <td>{{$person['email']}}</td>
                                    <td>{{$person['personal_user_data'][0]['phone_number']}}</td>
                                    <td>
                                        <table>
                                            <tbody>
                                                @foreach ($person['roles'] as $rol)
                                                    <tr>
                                                        <td><u>{{ $rol['group']}}:</u> {{ $rol['rol'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            <tbody>
                                                @if (in_array('Update',$user['permisions']))
                                                <tr>
                                                    <td><a href="userupdate/{{$person['id']}}" class="btn btn-warning">Actualizar</a></td>
                                                </tr>
                                                @endif
                                                @if (in_array('Delete',$user['permisions']))
                                                <tr>
                                                    <td><a href="userdelete/{{$person['id']}}" class="btn btn-danger">Eliminar</a></td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

