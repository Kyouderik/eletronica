<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    use HasFactory;
    protected $table = 'ordens_servico';

    protected $fillable = [
        'tecnico_id', 'nome_cliente', 'telefone_cliente', 'observacoes', 'tipo_aparelho'
    ];

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }
}
