<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VanBanFile extends Model
{
    protected $table = 'van_ban_file';
    protected $fillable = ['id_van_ban','name', 'extension','size','path'];
}
