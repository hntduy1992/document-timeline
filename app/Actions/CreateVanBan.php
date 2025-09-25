<?php

namespace App\Actions;

use App\Http\Requests\VanBanCreateRequest;
use App\Models\Tag;
use App\Models\VanBan;

class CreateVanBan
{
    public function execute(array $data): VanBan
    {
//        Kiểm tra tag
        $tags = $data['tag'];

//        Kiểm tra file
        return VanBan::create($request);
    }
}
