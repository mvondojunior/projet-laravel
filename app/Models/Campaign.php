<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model{
   public function donations()
{
    return $this->hasMany(Donation::class);
} 
}