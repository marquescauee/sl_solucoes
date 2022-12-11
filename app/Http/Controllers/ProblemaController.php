<?php

namespace App\Http\Controllers;

use App\Models\Problema;
use Illuminate\Http\Request;
use App\Models\Gerente;
use Illuminate\Support\Facades\Auth;

class ProblemaController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problemas = Problema::all()->sortBy('descricao', SORT_NATURAL|SORT_FLAG_CASE);

        $gerente = Gerente::where('id_gerente', Auth::user()->id)->first();

        return view('problemas.index', ['problemas' => $problemas, 'gerente' => $gerente]);
    }
}
