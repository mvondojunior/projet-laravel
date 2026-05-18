<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public function reserver()
    {
        return $this->belongsto(User::class);
    }
    use HasFactory;
    protected $fillable = [
        'code',
        'nom',
        'qte',
        'prix',
        'description'
    ];

}
