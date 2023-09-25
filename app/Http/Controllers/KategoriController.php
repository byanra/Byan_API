<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = kategori::all();
        return response()->json([
            'status' => true,
            'msg' => 'Data List Kategori',
            'data' => $kategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'dkr' => 'required',
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }
        $kategori = kategori::create($request->all());
        return response()->json([
            'status' => true,
            'msg' => 'data berhasil disimpan',
            'data' => $kategori
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        return response()->json([
            'status' => true,
            'msg' => 'Data list detail',
            'data' => $kategori
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori $kategori)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'dkr' => 'required',
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }
        $kategori->update($request->all());
        return response()->json([
            'status' => true,
            'msg' => 'data berhasil diubah',
            'data' => $kategori
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        $kategori->delete();
        return response()->json([
            'status' => true,
            'msg' => 'data berhasil dihapus',
            'data' => $kategori
        ]);
    }
}
