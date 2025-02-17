<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Colaborador;
use Illuminate\Foundation\Testing\WithFaker;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Tests\TestCase;

class ExportTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        Colaborador::factory()->count(3)->create();
    }

    public function test_index_page_returns_correct_data()
    {
        $this->actingAs($this->user);

        $response = $this->get(route('relatorios.index'));

        $response->assertStatus(200)
                 ->assertViewIs('relatorios.index')
                 ->assertViewHas('colaboradores');
    }

    public function test_export_excel_downloads_correct_file()
    {
        $this->actingAs($this->user);

        Excel::fake(); 

        $response = $this->get(route('export.excel'));

        $response->assertStatus(200);

        Excel::assertDownloaded('colaboradores.xlsx');
    }

    public function test_export_pdf_returns_correct_file()
    {
        $this->actingAs($this->user);

        $response = $this->get(route('export.pdf'));

        $response->assertStatus(200)
                 ->assertHeader('Content-Type', 'application/pdf');
    }
}
