<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;

class ProdutoController extends Controller
{
    private $product;

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
        $products = $this->product->all();
        return view('painel.products.produto', compact('products'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

        $update = $this->product
                        ->where('number', '=', '123456')
                        ->update([
                                    'image' => 'c:\image',
                                ]);

        if ($update) {
            return 'Alterado com sucesso2';
        } else {
            return 'Falha ao alterar';
        }
    }
}
