<?php 

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use estoque\Produto;
use Request;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller {

    public function adiciona(ProdutosRequest $request){
        Produto::create($request::all());
        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }

    public function novo(){
        return view('produtos.formulario');
    }
    
    public function lista(){
        $produtos = Produto::all();      
        return  view('produtos/listagem')->with('produtos', $produtos);
    }
    
    public function mostra($id){
        $resposta = Produto::find($id);
        if(empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('produtos/detalhes')->with('p', $resposta);
    }

    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
        ->action('ProdutoController@lista');
    }


}