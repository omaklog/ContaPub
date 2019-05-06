<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('clientes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return Client::all();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $cliente = new Client();
            $cliente->vencimientoFiel=$request->vencimientoFiel;
            $cliente->nombre=$request->nombre;
            $cliente->rfc=$request->rfc;
            $cliente->satPassword=$request->satPassword;
            $cliente->fielPassword=$request->fielPassword;
            $cliente->assitePassword=$request->assitePassword;
            $cliente->vencimientoFiel=$request->vencimientoFiel;
            $cliente->fechaPemex=$request->fechaPemex;
            $cliente->tipoContrato=$request->tipoContrato;
            $cliente->movil=$request->movil;
            $cliente->notas=$request->notas;

            $saved = $cliente->save();

            $data=[];
            $data["success"]=$saved;

            if($saved){
                $data["message"]="Se guardó correctamente";
            }else{
                $data["message"]="Imposible guardar";
            }
            return $data;
        }
        catch (Exception $e){
            $data=[];
            $data["success"]=false;
            $data["message"]="Imposible guardar";
            return $data;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
