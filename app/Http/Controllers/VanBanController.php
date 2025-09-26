<?php

namespace App\Http\Controllers;

use App\Http\Requests\VanBanCreateRequest;
use App\Models\Tag;
use App\Models\VanBan;
use App\Models\VanBanFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $tags = Tag::query()->get(['id', 'name']);
        return Inertia::render('Auth/VanBan/CreateVanBanPage', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VanBanCreateRequest $request)
    {
//        Xác thực
        $validatedField = $request->validated();
        $vanBan = VanBan::create($request->all());
//        Lưu file vào database
        if ($request->hasFile('file')) {
            $fileUpload = $request->file('file');
            $fileName = Str::slug($validatedField['so_hieu'] . '-' . $validatedField['ngay_ban_hanh']);
            $path = $fileUpload->store('uploads/files/documents/temp', 'public');
            VanBanFile::create([
                'id_van_ban' => $vanBan->id,
                'name' => $fileName,
                'path' => $path,
                'extension' => $fileUpload->clientExtension(),
                'size' => $fileUpload->getSize()
            ]);
        }
        return redirect()->route('van-ban.create')->with(['flash'=>['type'=>'success','message'=>'Thêm mới văn bản thành công!']]);
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
