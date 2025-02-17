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

        $sortBy = $request->query('sort_by', 'created_at'); 
        $sortOrder = $request->query('sort_order', 'asc');   
        
        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc';
        }
        
        $colaboradores = Colaborador::with('unidade')
            ->where('created_at', '>=', $startDate)
            ->orderBy($sortBy, $sortOrder)  
            ->get();

        return view('relatorios.index', compact('colaboradores', 'days', 'sortBy', 'sortOrder'));
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
