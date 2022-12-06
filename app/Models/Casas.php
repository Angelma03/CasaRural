<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reservas;

class Casas extends Model
{
    use HasFactory;
    protected $fillable=['nombre','dueño','descripcion','direccion','precio','capacidad','imagen'];

    protected static function boot(){   
        parent::boot();
        self:: creating(function($table){
            if(!app()->runningInConsole()){
            $table->user_id = auth()->id();
            }
        }
         );
        }
      public function user(){
        return $this->belongsTo(User::class);
    }
    public function reservas(){
        return $this->hasMany(Reservas::class);
    }
}
