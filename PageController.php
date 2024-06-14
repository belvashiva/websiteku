<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cosmetics;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function cosmetics()
    {
        $cosmetics = Cosmetics::orderBy('id', 'desc')->get();
        return view('cosmetics', compact('cosmetics'));
    }

    public function addcosmetics()
    {
        return view('addcosmetics');
    }

    public function savecosmetics(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jenis' => 'required|string',
            'merek' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->storeAs('public', $imageName);

        Cosmetics::create([
            'name' => $request->name,
            'jenis' => $request->jenis,
            'merek' => $request->merek,
            'foto' => $imageName,
        ]);

        return redirect()->route('cosmetics')->with('success', 'Cosmetic added successfully.');
    }

    public function editcosmetics($id)
    {
        $cosmetics = Cosmetics::findOrFail($id);
        return view('editcosmetics', compact('cosmetics'));
    }

    public function updatecosmetics(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jenis' => 'required|string',
            'merek' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $cosmetics = Cosmetics::findOrFail($id);

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('public', $imageName);
            $cosmetics->foto = $imageName;
        }

        $cosmetics->name = $request->name;
        $cosmetics->jenis = $request->jenis;
        $cosmetics->merek = $request->merek;
        $cosmetics->save();

        return redirect()->route('cosmetics')->with('success', 'Cosmetic updated successfully.');
    }

    public function deletecosmetics($id)
    {
        Cosmetics::destroy($id);
        return redirect()->route('cosmetics')->with('success', 'Cosmetic deleted successfully.');
    }
}
