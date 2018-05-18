<?php

namespace App\Http\Controllers;
use App\Empresa;
use Illuminate\Http\Request;
use DB;

class EmpresaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
      $empresas = Empresa::all();
      return response()->json($empresas);
    }

    public function empresaxmatricula($matricula){
      /*
      * state 0 -> sin resultados
      * state 1 -> empresa encontrada
      */

      $empresa = Empresa::where('matricula', $matricula)->first();
      if(count($empresa)){
        return response()->json(
          [
              'message' => 'Empresa encontrada',
              'state' => '1',
              'empresa' => $empresa->razon_social
          ]
        );
      }else{
        return response()->json(
          [
              'message' => 'No se encontro la empresa',
              'state' => '0'
          ]
        );
      }

    }
}
