<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use DB;
use App\Registro;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //dd($request, Auth::user());
        $ingreso = DB::table('registro')->where([['fechaRegistro', '>=', now()->format('Y-'.'m-'.'d')],['id_user', '=', Auth::user()->id]])->get();

        $var = 'no';
        for($i=0;$i<$ingreso->count();$i++)
        {
            $var = $ingreso[$i]->tipoRegistro;
        }
        //dd($var);
        if($var == 'no')
            $registro = 'Ingreso';
        else
        {
            //dd('aca');
            if($var == 'Ingreso')
                $registro = 'InicioAlmuerzo';
            if($var == 'InicioAlmuerzo')
                $registro = 'FinAlmuerzo';
            if($var == 'FinAlmuerzo')
                $registro = 'Salida';
            if($var == 'Salida')
                $registro = 'Ingreso';
        }

        $usuariosAsistencia = DB::table('users')->get();
        $reporteAsistencia = DB::table('users')->join('registro', 'users.id', '=', 'registro.id_user')->select('users.name', 'registro.tipoRegistro', 'registro.horaRegistro')->get();
        

        //dd($var);
        return view('home',compact('registro','usuariosAsistencia','reporteAsistencia'));
    }

    public function registro(Request $request, $accion)
    {
        //dd($request,$accion,Auth::user()->email);
        //dd(Auth::user()->id,$accion,now()->format('Y-'.'m-'.'d'),now()->format('Y-'.'m-'.'d'.' '. 'H:'.'i:'.'s'));
        if($accion == 'Ingreso')
        {
            $ingreso = DB::table('registro')->where([['fechaRegistro', '>=', now()->format('Y-'.'m-'.'d')],['id_user', '=', Auth::user()->id]])->get();

            $cont = 0;
            for($i=0;$i<$ingreso->count();$i++)
            {
                $cont = $cont + 1;
            }
            if ($cont == 4)
            {
                $usuariosAsistencia = DB::table('users')->get();
                $reporteAsistencia = DB::table('users')->join('registro', 'users.id', '=', 'registro.id_user')->select('users.name', 'registro.tipoRegistro', 'registro.horaRegistro')->get();
                $registro = 'Ingreso';
                return view('home',compact('registro','usuariosAsistencia','reporteAsistencia'));                
            }

            DB::table('registro')->insert(['id_user' => Auth::user()->id, 'tipoRegistro' => $accion, 'fechaRegistro' => now()->format('Y-'.'m-'.'d'), 'horaRegistro' => now()->format('Y-'.'m-'.'d'.' '. 'H:'.'i:'.'s')]);
            $registro = 'InicioAlmuerzo';
        }
        if($accion == 'InicioAlmuerzo')
        {
            DB::table('registro')->insert(['id_user' => Auth::user()->id, 'tipoRegistro' => $accion, 'fechaRegistro' => now()->format('Y-'.'m-'.'d'), 'horaRegistro' => now()->format('Y-'.'m-'.'d'.' '. 'H:'.'i:'.'s')]);
            $registro = 'FinAlmuerzo';
        }
        if($accion == 'FinAlmuerzo')
        {
            DB::table('registro')->insert(['id_user' => Auth::user()->id, 'tipoRegistro' => $accion, 'fechaRegistro' => now()->format('Y-'.'m-'.'d'), 'horaRegistro' => now()->format('Y-'.'m-'.'d'.' '. 'H:'.'i:'.'s')]);
            $registro = 'Salida';
        }
        if($accion == 'Salida')
        {
            DB::table('registro')->insert(['id_user' => Auth::user()->id, 'tipoRegistro' => $accion, 'fechaRegistro' => now()->format('Y-'.'m-'.'d'), 'horaRegistro' => now()->format('Y-'.'m-'.'d'.' '. 'H:'.'i:'.'s')]);
            $registro = 'Ingreso';
        }

        $usuariosAsistencia = DB::table('users')->get();
        $reporteAsistencia = DB::table('users')->join('registro', 'users.id', '=', 'registro.id_user')->select('users.name', 'registro.tipoRegistro', 'registro.horaRegistro')->get();
        return view('home',compact('registro','usuariosAsistencia','reporteAsistencia'));
    }


    public function proceso()
    {
        $ingresoRegistro = DB::table('registro')->where([['fechaRegistro', '>=', now()->format('Y-'.'m-'.'d')],['id_user', '=', Auth::user()->id]])->get();
        return $ingresoRegistro;
    }

    public function detalle($id)
    {
        $reporteIndividualVar = DB::table('users')->join('registro', 'users.id', '=', 'registro.id_user')->where('registro.id_user',$id)->select('users.name', 'registro.tipoRegistro', 'registro.horaRegistro')->get();
        $grupo = 'INDIVIDUAL';
        //dd($reporteIndividualVar);
        return view('reporteIndividual',compact('reporteIndividualVar','grupo'));
    }

    public function general(Request $request)
    {
        //dd('hola jon');
        $reporteIndividualVar = DB::table('users')->join('registro', 'users.id', '=', 'registro.id_user')->select('users.name', 'registro.tipoRegistro', 'registro.horaRegistro')->get();
        $grupo = 'GENERAL';
        //dd($reporteIndividualVar);
        return view('reporteIndividual',compact('reporteIndividualVar','grupo'));
    }
}
