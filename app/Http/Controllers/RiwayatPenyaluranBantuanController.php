<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPenyaluranBantuan;
use App\Models\ProgramBantuan;
use App\Models\PenerimaBantuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RiwayatPenyaluranBantuanController extends Controller
{
    public function index()
    {
        $riwayat = RiwayatPenyaluranBantuan::with(['program', 'penerima'])->get();

        return view('pages.riwayat_penyaluran.index', compact('riwayat'));
    }

    public function create()
    {
        $program = ProgramBantuan::all();
        $penerima = PenerimaBantuan::all();

        return view('pages.riwayat_penyaluran.create', compact('program', 'penerima'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required',
            'penerima_id' => 'required',
            'tahap_ke' => 'required|integer',
            'tanggal' => 'required|date',
            'nilai' => 'required|numeric',
            'bukti_penyaluran' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('bukti_penyaluran')) {
            $data['bukti_penyaluran'] = $request
                ->file('bukti_penyaluran')
                ->store('penyaluran_bantuan', 'public');
        }

        RiwayatPenyaluranBantuan::create($data);

        return redirect()
            ->route('riwayat-penyaluran.index')
            ->with('success', 'Data penyaluran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $riwayat = RiwayatPenyaluranBantuan::findOrFail($id);
        $program = ProgramBantuan::all();
        $penerima = PenerimaBantuan::all();

        return view(
            'pages.riwayat_penyaluran.edit',
            compact('riwayat', 'program', 'penerima')
        );
    }

    public function update(Request $request, $id)
    {
        $riwayat = RiwayatPenyaluranBantuan::findOrFail($id);

        $request->validate([
            'program_id' => 'required',
            'penerima_id' => 'required',
            'tahap_ke' => 'required|integer',
            'tanggal' => 'required|date',
            'nilai' => 'required|numeric',
            'bukti_penyaluran' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('bukti_penyaluran')) {
            // hapus file lama
            if ($riwayat->bukti_penyaluran) {
                Storage::disk('public')->delete($riwayat->bukti_penyaluran);
            }

            $data['bukti_penyaluran'] = $request
                ->file('bukti_penyaluran')
                ->store('penyaluran_bantuan', 'public');
        }

        $riwayat->update($data);

        return redirect()
            ->route('riwayat-penyaluran.index')
            ->with('success', 'Data penyaluran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $riwayat = RiwayatPenyaluranBantuan::findOrFail($id);

        if ($riwayat->bukti_penyaluran) {
            Storage::disk('public')->delete($riwayat->bukti_penyaluran);
        }

        $riwayat->delete();

        return redirect()
            ->route('riwayat-penyaluran.index')
            ->with('success', 'Data penyaluran berhasil dihapus');
    }
}
