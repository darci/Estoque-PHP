<?php 

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller {

    public function adiciona(){
        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');
        //DB::insert('insert into produtos(nome, quantidade, valor, descricao) values (?,?,?,?)',array($nome, $quantidade, $valor, $descricao));
        DB::table('produtos')->insert(
            [   'nome' => $nome,
                'valor' => $valor,
                'descricao' => $descricao,
                'quantidade' => $quantidade
            ]
        );
        return redirect('/produtos')->withInput(Request::only('nome'));
    }

    public function novo(){
        return view('produtos.formulario');
    }
    
    public function lista(){
        $produtos = DB::select('select * from produtos');       
        return  view('produtos/listagem')->with('produtos', $produtos);
    }
    
    public function mostra($id){
        $resposta = DB::select('select * from produtos where id = ?',[$id]);
        if(empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('produtos/detalhes')->with('p', $resposta[0]);
    }
}