<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller{
   private $product;
   private $totalPage = 3;

   public function __construct(Product $product){
    $this->product = $product;
   }

    public function index(){
        $title = 'Listagem de Produtos';
        $products = $this->product->paginate($this->totalPage);
        return view('painel.products.index',compact('products','title'));
    }

    public function create(){
        $title = 'cadastrar novo produto';
        $categorys = ['eletronico','moveis','limpeza'];
        return view('painel.products.create-edit',compact('title','categorys'));
    }

    public function store(ProductFormRequest $request){
        //pega todos os dados do form
        $dataForm = $request->all();
        //validando o active 
        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;

        //valida dados
        //$this->validate($request,$this->product->rules);

        //faz o cadastro
        $insert = $this->product->create($dataForm);
        if ($insert) 
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.create');    
    }

    public function show($id){
        $product =$this->product->find($id);
        $title = "Produto: $product->name";
        return view('painel.products.show', compact('product','title'));
    }

    public function edit($id){
        $product = $this->product->find($id);
        $title = "Editar Produto {$product->name}";
        $categorys = ['eletronico','moveis','limpeza'];
        return view('painel.products.create-edit',compact('title','categorys','product'));
    }

    public function update(ProductFormRequest $request, $id){
        //Recupera todos os dados do formulario
        $dataForm = $request->all();
        //Recupera o item para editar
        $product = $this->product->find($id);
        //Verifica se o produto esta ativo
        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;
        //altera os itens
        $update = $product->update($dataForm);
        //Verifica se realmente editou
        if ($update) 
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.edit',$id)->with(['errors'=>'Falha ao atualizar']);       
    }

    public function destroy($id){
        $product = $this->product->find($id);
        $delete = $product->delete();
        if ($delete)
          return redirect() ->route ('produtos.index');
        else
          return redirect() ->route ('produtos.show', $id) -> with (['errors' => 'Falha ao Editar' ]);
    }

    public function tests(){
        /*$prod = $this->product;
        $prod->name = "Perfume";
        $prod->number = 123;
        $prod->active = true;
        $prod->description = "Primeira qualidade";
        $insert = $prod->save();
        if ($insert)
            return "inserido";
        else
            return "falha";*/

        /*$insert = $this->product->create([
            'name' => 'Computador',
            'number' => 123456,
            'active'=> false,
            'category' => 'eletronico',
            'description'=> 'Processador bom'
        ]);
        if ($insert)
            return "inserido";
        else
            return "falha";
    }*/

    /*$prod = $this->product->find(3);
    $update = $prod->update([
            'name' => 'Netbook ',
            'number' => 122,
        ]);
        if ($update)
            return "atualizado";
        else
            return "falha";*/

    $prod = $this->product->find(3);
    $delete = $prod->delete();
        if ($delete)
            return "deletado";
        else
            return "falha";
    }
}
