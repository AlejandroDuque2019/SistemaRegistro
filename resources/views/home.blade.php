@extends('layouts.app')

@section('content')

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script  src="{{asset('js/create.js')}}">  </script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de activiades</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   

                    <a class="nav-link" href="{{ url('registro',array('accion'=>$registro)) }}">
                        <button name="btnRegistro" id="btnRegistro" type="button" class="btn btn-primary btn-lg btn-block">{{$registro}}</button>
                    </a>

                    @if (session()->has('success'))
                    <div class="col-sm-12">
                        <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                          {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif

                    <a class="nav-link collapsed text-truncate" href="#submenuReporte" data-toggle="collapse" data-target="#submenuReporte">
                        <button name="btnReporte" id="btnReporte" type="button" class="btn btn-primary btn-lg btn-block">Reporte</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse" id="submenuReporte">
        <table class="table table-hover table-listing">
            <thead>
                <tr>
                    <td>NOMBRE</td>
                    <td>EMAIL</td>
                    <td>FECHA DE CREACION</td>
                    <td>REPORTE</td>
                </tr>
            </thead>
            <tbody>
            @if($usuariosAsistencia->count())
            @foreach($usuariosAsistencia as $repoAsis)
            <tr>
                <td>{{$repoAsis->name}}</td>
                <td>{{$repoAsis->email}}</td>
                <td>{{$repoAsis->created_at}}</td>
                <td>
                    <a id="detalle" name="detalle" class="btn btn-color" href="{{ url('/reporteRegistroIndividual',['id'=>$repoAsis->id]) }}"  target="_blank"> <button>Individual</button></a>

                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspn="8"> No existen información del Oficio </td>
            </tr>
            @endif
            </tbody>
        </table>
        <a class="nav-link" href="{{ url('/reporteRegistroGeneral') }}" target="_blank">
            <button name="btnReporte" id="btnReporte" type="button" class="btn btn-primary btn-lg btn-block">Generar</button>
        </a>
    </div>
</div>
@endsection
