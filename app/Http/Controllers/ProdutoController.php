<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Produto;
use App\Marca;
use Validator;
;

class ProdutoController extends Controller
{
    //função para validar o form
    protected function validarProduto($request){
        $validator = Validator::make($request->all(), [
            "descricao" => "required",
            "preco"=> "required | numeric",
            "cor" => "required",
            "peso" => "required | numeric",
            "marca_id" => "required | numeric",
        ]);
        return $validator;
    }
    //
    public function index(Request $request){

        //verifica o produto
        $qtd = $request['qtd'] ?: 5;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];

        //verifica a paginação
        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });

        if($buscar){
            $produtos = Produto::where('descricao','=', $buscar)->paginate($qtd);
        }else{  
            $produtos = Produto::paginate($qtd);

        }
        $produtos = $produtos->appends(Request::capture()->except('page'));
        return view('produto.index', compact('produtos'));

    }

    //chama a view de adicionar
    public function adicionar()
    {
        $marcas = Marca::all();
        return view('produto.adicionar', compact('marcas'));

    }

    //
    public function salvar(Request $request)
    {
        $validator = $this->validarProduto($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        $dados = $request->all();
        $produto = Produto::create($dados);
        return redirect()->route('produto.index');
    }

    public function editar($id)
    {
        $produto = Produto::find($id);
        $marcas = Marca::all(); 
        return view('produto.editar', compact('produto', 'marcas'));
    }

    public function atualizar(Request $request, $id)
    {
        $validator = $this->validarProduto($request);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $produto = Produto::find($id);
        $dados = $request->all();
        $produto->update($dados);
        
        return redirect()->route('produto.index');
    }

    
//chama a view de detalhe
    public function detalhe($id)
    {
        $produto = Produto::find($id);
        
        return view('produto.detalhe', compact('produto'));
    }

    //função para apagar
    public function deletar($id)
    {
        Produto::find($id)->delete();
        return redirect()->route('produto.index');
    }

    //chama a ID para remover
    public function remover($id)
    {
        $produto = Produto::find($id);

        return view('produto.remove', compact('produto'));
    }
}
