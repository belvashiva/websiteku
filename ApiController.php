<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cosmetics;

class ApiController extends Controller
{
    // Mengambil daftar semua kosmetik
    public function index()
    {
        return Cosmetics::all();
    }

    // Menyimpan kosmetik baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $cosmetics = Cosmetics::create($request->all());
        return response()->json($cosmetics, 201);
    }

    // Mengambil data kosmetik berdasarkan ID
    public function show($id)
    {
        return Cosmetics::findOrFail($id);
    }

    // Memperbarui data kosmetik berdasarkan ID
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'harga' => 'sometimes|required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $cosmetics = Cosmetics::findOrFail($id);
        $cosmetics->update($request->all());
        return response()->json($cosmetics, 200);
    }

    // Menghapus data kosmetik berdasarkan ID
    public function destroy($id)
    {
        Cosmetics::destroy($id);
        return response()->json(null, 204);
    }
}
