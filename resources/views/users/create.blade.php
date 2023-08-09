@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (Cookie::get('api'))
                    <div class="col-12">
                        <div class="col-mb-3">
                            <p>
                                <h3>Crear Usuarios</h3>
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <form method="POST" action="{{ route('userApiCreate') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <h5>Datos de acceso</h5>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombres Completos:') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico:') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <h5>Datos Personales</h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="personalData['blood_type']" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de Sangre:') }}</label>
    
                                <div class="col-md-6">
                                    <input id="personalData['blood_type']" type="text" class="form-control" name="personalData['blood_type']" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="personalData['phone_number']" class="col-md-4 col-form-label text-md-end">{{ __('Número de Teléfono:') }}</label>
    
                                <div class="col-md-6">
                                    <input id="personalData['phone_number']" type="text" class="form-control" name="personalData['phone_number']" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="personalData['address']" class="col-md-4 col-form-label text-md-end">{{ __('Dirección de residencia:') }}</label>
    
                                <div class="col-md-6">
                                    <input id="personalData['address']" type="text" class="form-control" name="personalData['address']" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="personalData['birth']" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Nacimiento:') }}</label>
    
                                <div class="col-md-6">
                                    <input id="personalData['birth']" type="date" class="form-control" name="personalData['birth']" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                
                                <div class="col-md-12 text-center" id="divPermisions">
                                    <h5>Permisos:</h5>
                                    <input type="checkbox" class="btn-check" value="1" id="roleCreate" name="rol[]">
                                    <label class="btn btn-secondary" for="roleCreate">Crear Usuarios</label>

                                    <input type="checkbox" class="btn-check" value="2" id="roleUpdate" name="rol[]">
                                    <label class="btn btn-secondary" for="roleUpdate">Actualizar Usuarios</label>

                                    <input type="checkbox" class="btn-check" value="3" id="roleDelete" name="rol[]">
                                    <label class="btn btn-secondary" for="roleDelete">Borrar Usuarios</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crear Usuario') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

