<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VanBan extends Model
{
    protected $table = 'van_ban';
    protected $fillable = ['id_don_vi','id_user','ngay_ban_hanh','trang_thai','so_hieu','tieu_de','trich_yeu','tag'];
}
