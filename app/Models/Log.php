<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //use HasFactory;
    /**
     * Define a tabela associada à classe.
     *
     * @var string
     */
    protected $table = 'logs';
    public $timestamps = false;

    protected $guarded = [];

    /**
     * Define uma relação entre Log e Solicitação.
     * Um log apenas pertence a uma solicitação.
     */
    public function solicitacao(){
        return $this->belongsTo(Solicitacao::class);
    }
}
