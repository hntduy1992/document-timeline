<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DonVi;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DonViController extends Controller
{
    public function index()
    {
        $listDonVi = DonVi::all();
        $tableHeaders = [
            ['title' => 'Logo', 'key' => 'logo', 'align' => 'end'],
            ['title' => 'Tên', 'key' => 'ten_don_vi', 'align' => 'start'],
            ['title' => 'Ngày tạo', 'key' => 'created_at', 'align' => 'start'],
            ['title' => 'Ngày cập nhật', 'key' => 'updated_at', 'align' => 'start'],
        ];
        return Inertia::render('Auth/DonVi/IndexPage', ['listDonVi' => $listDonVi, 'tableHeaders' => $tableHeaders]);
    }
}
