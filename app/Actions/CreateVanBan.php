<?php

namespace App\Actions;

use App\Models\VanBan;

class CreateVanBan
{
    public function __invoke($request)
    {
        // TODO: Implement __invoke() method.

        return VanBan::create($request->all());
    }
}
