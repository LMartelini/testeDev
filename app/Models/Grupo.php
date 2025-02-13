<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Bandeira;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'grupos';
    protected $fillable = ['nome'];

    public function bandeiras()
    {
        return $this->hasMany(Bandeira::class, 'grupo_economico_id', 'id');
    }
}
