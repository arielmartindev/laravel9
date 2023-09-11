<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /* SOLO ESTOS CAMPOS ESTAN HABILITADOS */
    //protected $fillable = ['title', 'body'];

    /* NINGUN CAMPO ESTA DESHABILITADO */
    //protected $guarded = []

    /* 
    CONFIGURAR EN: App/Providers/AppServiceProvider.php

    public function boot(): void
    {
        Model::unguard();
    }
    */
}
