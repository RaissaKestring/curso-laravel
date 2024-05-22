<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class SiteController extends Controller
{
    public function index()
    {
        // return "index";

        $produtos = Produto::paginate(3);

        return view('site.home', compact('produtos')); // especificando pastas
    }

    public function details($slug)
    {

        $produto = Produto::where('slug', $slug)->first();

        return view('site.details', compact('produto'));
    }
}
