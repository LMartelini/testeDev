<?php

namespace App\Models;
use App\Models\Bandeira;
use App\Models\Colaborador;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unidade extends Model
{
    use HasFactory;

    protected $table = 'unidades';
    protected $fillable = ['nome_fantasia', 'razao_social', 'cnpj', 'bandeira_id'];

    public function bandeira()
    {
        return $this->belongsTo(Bandeira::class, 'bandeira_id', 'id');
    }

    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class, 'unidade_id', 'id');
    }
}