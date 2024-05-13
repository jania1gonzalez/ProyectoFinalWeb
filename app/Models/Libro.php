<?php

namespace App\Models;

use App\Mail\CorreoLibro;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Editorial;
use Illuminate\Support\Facades\Mail;

class Libro extends Model
{


    use HasFactory;
    use SoftDeletes;

    public function editoriales(){
        return $this->belongsTo(Editorial::class);
    }

    protected static function boot()
{
    parent::boot();

    // Evento para enviar correo cuando se crea un libro
    static::created(function ($libro) {
        $user = auth()->user();
        if ($user) {
            Mail::to($user->email)->send(new CorreoLibro($libro));
        }
    });

    // Evento para enviar correo cuando se actualiza un libro
    static::updated(function ($libro) {
        $user = auth()->user();
        if ($user) {
            Mail::to($user->email)->send(new CorreoLibro($libro));
        }
    });
}
}