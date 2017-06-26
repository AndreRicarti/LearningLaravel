<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function __construct()
    {
        /*
        $this->middleware('auth')
                    ->only([
                        'contato',
                        'categoria'
                    ]);
        */

        /*
        $this->middleware('auth')
                    ->except([
                        'index',
                        'contato'
                    ]);
        */
    }

    public function index()
    {
        $teste = 123;
        $teste2 = 321;
        $teste3 = 132;

        $title = 'Titulo teste';

        $xss = '<script>alert("Ataque XSS")</script>';

        $var1 = '123';

        $arrayData = [];

        //return view('teste', ['teste' => $teste]);
        return view('site.home.index', compact('teste', 'teste2', 'teste3', 'title', 'xss', 'var1', 'arrayData'));
    }

    public function contato()
    {
        return view('site.contact.contact');;
    }

    public function categoria($id)
    {
        return "Listagem dos posts da categoria $id";
    }

    public function categoriaOp($id = 1)
    {
        return "Listagem dos posts da categoria {$id}";
    }
}
