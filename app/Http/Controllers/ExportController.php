<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Lote;
use App\Models\PostoVacinacao;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CondidatoExport;
use App\Exports\LoteExport;
use App\Exports\PostoExport;
use Illuminate\Support\Facades\Gate;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('ver-export');
        $candidatos = Candidato::all()->count();
        $lotes = Lote::all()->count();
        $postos = PostoVacinacao::all()->count();
        return view('export.index', compact('candidatos', 'lotes', 'postos'));
    }

    public function exportCandidato()
    {
        Gate::authorize('baixar-export');
        return Excel::download(new CondidatoExport, 'candidatos.xlsx');
    }

    public function exportLote()
    {
        Gate::authorize('baixar-export');
        return Excel::download(new LoteExport, 'lotes.xlsx');
    }

    public function exportPosto()
    {
        Gate::authorize('baixar-export');
        return Excel::download(new PostoExport, 'postos.xlsx');
    }

    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }


}
