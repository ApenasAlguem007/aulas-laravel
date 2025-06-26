<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contatos;
use App\Http\Requests\FormRequestContatos;

class ContatosController extends Controller
{
    public function __construct(Contatos $contatos){
        $this->contato = $contatos;
    }


    public function index(Request $request){
      $pesquisar = $request->pesquisar;
      $findContatos = $this->contato->getFiltrosPaginate(search: $pesquisar ?? "");

       return view('pages.contatos.index', compact('findContatos'));
    }

    public function delete($idUser){
     $buscaRegistro = Contatos::find($idUser);
        $buscaRegistro->delete();
            return back();

    }

    public function create(FormRequestContatos $request){

        //condicional para o entendimento do envid dos dados para o banco de dados
        if($request->method() == "POST"){
            $data = $request->all();
            Contatos::create($data);

            return redirect('/contatos');
        }

        return view('pages.contatos.create');
    }
       
    public function update(FormRequestContatos $request, $idContato){
        if($request->method() == 'PUT'){
            $data = $request->all();
            $buscaRegistro = Contatos::find($idContato);
            $buscaRegistro->update($data);

            return redirect('/contatos');
        }

        $findContatos = Contatos::where('id', '=', $idContato)->first();

        return view('pages.contatos.update', compact('findContatos'));
    }


}


