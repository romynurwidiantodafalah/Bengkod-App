<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\Obat;
use App\Models\DetailPeriksa;

class PeriksaController extends Controller
{
    public function index()
    {
        // Ambil semua data pemeriksaan yang terkait dengan dokter yang sedang login
        $periksas = Periksa::where('id_dokter', auth()->user()->id)
            ->with('pasien', 'detailPeriksa.obat') // Mengambil data pasien dan detail obat
            ->get();

        // Kirim data periksas ke view
        return view('dokter.periksa.index', compact('periksas'));
    }

    public function show($id)
    {
        $periksa = Periksa::with(['pasien', 'dokter', 'detailPeriksa.obat'])->findOrFail($id);
        $obats = Obat::all(); // Ambil data obat untuk pilihan

        // Kirim data periksa dan obats ke view
        return view('dokter.periksa.show', compact('periksa', 'obats'));
    }

    public function store(Request $request, $periksa)
    {
        // Validasi input
        $request->validate([
            'obat_id' => 'nullable|array', // Jangan wajibkan obat_id, biar bisa kosong
            'biaya_periksa' => 'nullable|numeric',
            'diagnosa' => 'nullable|string', // Validasi untuk diagnosa
        ]);

        // Update biaya_periksa dan diagnosa di tabel periksas
        $periksaModel = Periksa::findOrFail($periksa);
        $periksaModel->update([
            'biaya_periksa' => $request->biaya_periksa,
            'diagnosa' => $request->diagnosa,
        ]);

        // Simpan data ke detail_periksas jika ada obat
        if ($request->has('obat_id') && !empty($request->obat_id)) {
            foreach ($request->obat_id as $obat) {
                DetailPeriksa::create([
                    'id_periksa' => $periksa,
                    'id_obat' => $obat,
                    'biaya_periksa' => $request->biaya_periksa,
                ]);
            }
        }

        return redirect()->route('dokter.periksa.index')->with('success', 'Data berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'biaya_periksa' => 'required|numeric|min:0',
        ]);

        // Cari data pemeriksaan berdasarkan ID
        $periksa = Periksa::findOrFail($id);

        // Update biaya periksa
        $periksa->biaya_periksa = $request->input('biaya_periksa');
        $periksa->save();

        // Redirect ke menu periksa dengan pesan sukses setelah update
        return redirect()->route('dokter.periksa.index')  // redirect ke daftar periksa dokter
                         ->with('success', 'Biaya periksa berhasil diperbarui');
    }
}
