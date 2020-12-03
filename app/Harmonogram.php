<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harmonogram extends Model
{
    protected $table = "harmonogram";
    public $timestamps = true;
    protected $fillable = ['idLekuUzytkownika', 'data', 'godzina', 'potwierdzenie'];
}
