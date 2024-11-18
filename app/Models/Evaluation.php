<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = ['module_id', 'titre', 'date', 'coefficient'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    //use HasFactory;
}
