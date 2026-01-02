<?php

namespace App\Http\Controllers;

use App\Models\PenerimaBantuan;
use App\Models\ProgramBantuan;
use App\Models\Warga;
use Illuminate\Http\Request;

class PenerimaBantuanController extends Controller
{
    public function index()
    {
        $data = PenerimaBantuan::with(['program', 'warga'])->get();
        return view('pages.penerima_bantuan.index', compact('data'));
    }

    // ✅ TAMBAHAN WAJIB (INI YANG ERROR TADI)
    public function create()
    {
        $programs = ProgramBantuan::all();
        $wargas   = Warga::all();

        return view('pages.penerima_bantuan.create', compact('programs', 'wargas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required',
            'warga_id'   => 'required',
            'keterangan' => 'nullable'
        ]);

        PenerimaBantuan::create($request->all());
        return redirect()->route('penerima-bantuan.index');
    }

    public function show($id)
    {
        return PenerimaBantuan::with(['program', 'warga'])
               ->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $data = PenerimaBantuan::findOrFail($id);
        $data->update($request->all());
        return $data;
    }

    public function destroy($id)
    {
        PenerimaBantuan::findOrFail($id)->delete();
        return redirect()->route('penerima-bantuan.index');
    }
}
