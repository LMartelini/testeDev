<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\ColaboradorExport;
use PDF;
use App\Models\Colaborador;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RelatorioController extends Controller
{
    public function index(Request $request)
    {
        $days = $request->query('days', 30); 
        $startDate = Carbon::now()->subDays($days);

        $colaboradores = Colaborador::with('unidade')
            ->where('created_at', '>=', $startDate)
            ->get();

        return view('relatorios.index', compact('colaboradores', 'days'));
    }

    public function exportExcel()
    {
        return Excel::download(new ColaboradorExport, 'colaboradores.xlsx');
    }

    public function exportPdf()
    {
        $colaboradores = Colaborador::with('unidade')->get();
        $pdf = Pdf::loadView('relatorios.export', compact('colaboradores'));

        return $pdf->download('colaboradores.pdf');
    }

}
