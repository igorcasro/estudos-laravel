<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{
    private $clientes = [
        ['id' => 1, 'nome' => 'Ademir'],
        ['id' => 2, 'nome' => 'José']
    ];

    public function __construct()
    {
        $clientes = session('clientes');
        if (!isset($clientes))
            session(['clientes' => $this->clientes]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = session('clientes');
        // A utilização do compact é para compactar tudo que está dentro de clientes e passar em um array para a view
        // O código compact(['clientes']) é o mesmo que passar ['clientes' => $this->clientes]
        // return view('clientes.index', compact(['clientes']));
        // return view('clientes.index')
        //     ->with('clientes', $clientes)
        //     ->with('titulo', "Todos os clientes");
        return view('clientes.index', ['clientes' => $clientes, 'titulo' => "Todos os clientes"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = session('clientes');
        $ids = array_column($clientes, 'id');
        $id = end($ids) + 1;
        $nome = $request->nome;
        $dados = ["id" => $id, "nome" => $nome];
        $clientes[] = $dados;
        // dd($clientes);
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');

        // Para ver todos os dados da request, bem como a estrutura dela
        // $dados = $request->all();
        // dd($dados);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];
        return view('clientes.show', compact(['cliente']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];
        return view('clientes.edit', compact(['cliente']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $clientes[$index]['nome'] = $request->nome;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        array_splice($clientes, $index, 1);
        session(['clientes' => $clientes]);

        return redirect()->route('clientes.index');
    }

    private function getIndex($id, $clientes)
    {
        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
        return $index;
    }
}
