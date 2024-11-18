<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'nom', 'coefficient'];
    //use HasFactory;

    public function evaluation(){
        return $this->hasMany(Evaluation::class);
    }
}
