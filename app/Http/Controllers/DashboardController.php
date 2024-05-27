<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Produto;

class DashboardController extends Controller
{
    public function index() {
        $usuarios = User::all()->count();

        // grafico 1 - usuarios
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total')
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();
        // preparar arrays

        foreach ($usersData as $user) {
            $ano[] = $user -> ano;
            $total[] = $user -> total;

            // formatar para chatsjs
            $userLabel = "'Comparativo de cadastros de usuários'";
            $userAno = implode(',', $ano);
            $userTotal = implode(',', $total);

            // grafico 2 - categorias
            $catData = Categoria::all();

            // preparar array
            foreach ($catData as $cat) {
                $catNome[] = "'".$cat -> name;
                $catTotal[] = Produto::where("id_categoria", $cat->id)->count();
            }
            

            // formatar para chartjs
            $catLabel = implode(',', $catNome);
            $catLabel = implode(',', $catTotal);

        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
}