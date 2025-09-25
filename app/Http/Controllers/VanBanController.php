<?php

namespace App\Http\Controllers;

use App\Actions\CreateVanBan;
use App\Http\Requests\VanBanCreateRequest;
use App\Models\Tag;
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
        $tags = Tag::query()->get(['id','name']);
        return Inertia::render('Auth/VanBan/CreateVanBanPage',['van_ban'=>$van_ban, 'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VanBanCreateRequest $request)
    {
        $validatedField = $request->validated();

//        $vanban = (new CreateVanBan())->execute($validatedField);
//
        return response()->json(['data'=>$validatedField]);
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
