<?php

namespace App\Http\Controllers;

use App\Models\VanBan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VanBanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $van_ban = new VanBan();
        return Inertia::render('Auth/VanBan/CreateVanBanPage',['van_ban'=>$van_ban]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(VanBan $vanBan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VanBan $vanBan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VanBan $vanBan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VanBan $vanBan)
    {
        //
    }
}
