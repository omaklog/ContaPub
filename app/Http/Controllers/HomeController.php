<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Localidad;
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
    public function index()
    {
        return view('clientes');
    }

    public function createFile(){
        $ar=fopen("LocalidadesTableSeeder.php","a") or die( ("Error al crear"));
        $localidades='App\Localidad'::all();
        foreach ($localidades as $localidad){
        $cad="Localidad::Create(['id'=>".$localidad->id.",'municipio_id'=>".$localidad->municipio_id.",'nombre'=>'".str_replace("'","`",$localidad->nombre)."']);\n";

        fwrite($ar,$cad);

        }
        echo "se creo correctamente el archivo de texto";

    }
}
