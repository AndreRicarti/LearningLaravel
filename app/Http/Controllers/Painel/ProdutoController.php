<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller
{
    private $product;
    private $totalPage = 10;

    public function __construct(\App\Product $product)
    {
        $this->product = $product;    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listagem dos produtos';
        $products = $this->product->paginate($this->totalPage);
        return view('painel.products.produto', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar novo produto';

        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];
        return view('painel.products.create-edit', compact('title', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        //dd($request->all());
        //dd($request->only(['name', 'number']));
        //dd($request->except(['token']));
        //dd($request->input(['name']));

        // Pega todos os dados do formulário
        $dataForm = $request->all();
        //$dataForm = $request->except('_token');

        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;

        //Valida o dados
        //$this->validate($request, $this->product->rules);
        /*
        $messages = [
            'name.required' => 'O campo nome é de preenchimento obrigatório',
            'number.numeric' => 'Precisa ser apenas números"',
            'number.required' => 'O campo numero é de preenchimento obrigatório'
        ];

        $validate = validator($dataForm, $this->product->rules, $messages);
        if( $validate->fails() ) {
            return redirect()
                            ->route('produtos.create')
                            ->withErrors($validate)
                            ->withInput();
        }*/
        //Faz o cadastro
        $insert = $this->product->create($dataForm);

        if ($insert) {
            return redirect()->route('produtos.index');
        } else {
            return redirect()->route('produtos.create');
            
        }

        //return 'cadastrando';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->find($id);

        $title = "Produto:  {$product->name}";

        return view('painel.products.show', compact('product', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Recupera o produto pelo seu id
        $product = $this->product->find($id);

        $title = "Editar Produto: {$product->name}";

        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.products.create-edit', compact('title', 'categorys', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        //Recupera todos os dados do formulário
        $dataForm = $request->all();
        //Recupera o item para editar
        $product = $this->product->find($id);
        //Verifica se o produto está ativado
        $dataForm['active'] = ( !isset($dataForm['active']) ) ? 0 : 1;
        //Altera os itens
        $update = $product->update($dataForm);
        //Verifica se realmente editou
        if ($update) {
            return redirect()->route('produtos.index');
        } else {
            return redirect()->route('produtos.edit', $id)->with(['errors' => 'Falha ao editar']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);
        $delete = $product->delete();

        if ($delete) {
            return redirect()->route('produtos.index');
        } else {
            return redirect()->route('produtos.show', $id)->with(['errors' => 'Fala ao deletar']);
        }
    }

    public function tests()
    {
        /*
        $prod = $this->product;
        //$this->product->insert();
        $prod->name = 'Nome do Produto';
        $prod->number = 131231;
        $prod->active = 1;
        $prod->image = 'c:';
        $prod->category = 'eletronicos';
        $prod->description = 'Description do produto aqui';

        $insert = $prod->save();

        if ($insert) {
            return 'Inserido com sucesso';
        } else {
            return 'Falha ao inserir';
        }
        */
        /*$insert = $this->product->insert([
            'name'          => 'Nome do Produto',
            'number'        => '123456',
            'active'        => '1',
            'image'         => 'c:',
            'category'      => 'eletronicos',
            'description'   => 'Descrição vem aqui'
        ]);

        if ($insert) {
            return 'Inserido com sucesso';
        } else {
            return 'Falha ao inserir';
        }*/

       /* $insert = $this->product->create([ 
            'name'          => 'Nome do Produto',
            'number'        => '123456',
            'active'        => '1',
            'image'         => 'c:',
            'category'      => 'eletronicos',
            'description'   => 'Descrição vem aqui'
        ]);

        if ($insert) {
            return "Inserido com sucesso, ID: {$insert->id}";
        } else {
            return 'Falha ao inserir';
        }*/

        /*$prod = $this->product->find(5);
        $prod->name = 'Update';
        $prod->number = 11111;
        $prod->active = 1;
        $prod->image = 'd:';
        $prod->category = 'eletronicos';
        $prod->description = 'Description Update';
        $update = $prod->save();

        if ($update) {
            return 'Alterado com sucesso';
        } else {
            return 'Falha ao alterar';
        }*/

        /*$prod = $this->product->find(6);
        $update = $prod->update([
            'name'          => 'Update 6',
            'number'        => '654321',
            'active'        => '2',
            'image'         => 'c:var',
        ]);

        if ($update) {
            return 'Alterado com sucesso';
        } else {
            return 'Falha ao alterar';
        }*/

        /*$update = $this->product
                        ->where('number', '=', '123456')
                        ->update([
                                    'image' => 'c:\image',
                                ]);

        if ($update) {
            return 'Alterado com sucesso2';
        } else {
            return 'Falha ao alterar';
        }*/

        /*$prod = $this->product->find(3)->delete();*/
        /*$prod = $this->product->destroy(3);*/
        
        /*$prod = $this->product->find(3);
        $delete = $prod->delete();*/

        /*$delete = $this->product->
                where('number', '123456')->
                delete();

        if ($delete) {
            return 'Deletado com sucesso';
        } else {
            return 'Falha ao deletar';
        }*/
    }
}
