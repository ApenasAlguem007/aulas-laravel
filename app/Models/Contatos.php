<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contatos extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "numero",
        "email",
    ];

    //  Filtro de pesquisa

    public function getFiltrosPaginate(string $search = ''){
        $contato = $this->where(function ($query) use ($search){
            if($search){
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%($search)%");
            }
        })->get();

        return $contato;
    }
}
