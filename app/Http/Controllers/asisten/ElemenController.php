<?php

namespace App\Http\Controllers\asisten;

use App\Models\Elemen;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ElemenController extends Controller
{
    public function index()
    {
        $elemen = Elemen::all();
        return view('pageasisten.dataelemen.index', compact('elemen'));
    }

    public function create()
    {
        return view('pageasisten.dataelemen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag_elemen' => 'required',
            'nama_elemen' => 'required',
            'deskripsi' => 'required',
            'icon_elemen' => 'required',
            'html_elemen' => 'required',
        ]);

        Elemen::create($request->all());

        Alert::success('Berhasil', 'Data Elemen berhasil ditambahkan');
        return redirect()->route('dataelemen.index');
    }

    public function show($id)
    {
        $elemen = Elemen::findOrFail($id);
        return view('pageasisten.dataelemen.show', compact('elemen'));
    }

    public function edit($id)
    {
        $elemen = Elemen::findOrFail($id);
        return view('pageasisten.dataelemen.edit', compact('elemen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tag_elemen' => 'required',
            'nama_elemen' => 'required',
            'deskripsi' => 'required',
            'icon_elemen' => 'required',
            'html_elemen' => 'required',
        ]);

        $elemen = Elemen::findOrFail($id);

        // Update data user
        $elemen = Elemen::find($elemen->id);
        $elemen->update([
            'tag_elemen' => $request->tag_elemen,
            'nama_elemen' => $request->nama_elemen,
            'deskripsi' => $request->deskripsi,
            'icon_elemen' => $request->icon_elemen,
            'html_elemen' => $request->html_elemen,
        ]);

        // Update data wali kelas
        $elemen->update([
            'tag_elemen' => $request->tag_elemen,
            'nama_elemen' => $request->nama_elemen,
            'deskripsi' => $request->deskripsi,
            'icon_elemen' => $request->icon_elemen,
            'html_elemen' => $request->html_elemen,
        ]);

        Alert::success('Berhasil', 'Data Elemen berhasil diperbarui');
        return redirect()->route('dataelemen.index');
    }

    public function destroy($id)
    {
        $elemen = Elemen::findOrFail($id);
        $elemen->delete();

        Alert::success('Berhasil', 'Data Elemen berhasil dihapus');
        return redirect()->route('dataelemen.index');
    }
}
