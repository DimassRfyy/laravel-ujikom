<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use App\Models\program;
use App\Models\t_biaya_rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index () {
        $transactionRentals = t_biaya_rental::with(['program', 'mobil'])->get();
        $programs = program::all();
        $mobils = mobil::all();

    foreach ($transactionRentals as $transaction) {
        
        $transaction->total_biaya = $transaction->program->hari * $transaction->mobil->biaya;
    }

    return view('rental', compact('transactionRentals','programs','mobils'));
    }

    public function store(Request $request)
{
    // validasi dulu data dari form yang ingin diinputkan
    $validatedData = $request->validate([
        'nama_penyewa' => 'required|string',
        'mobil_id' => 'required|exists:mobils,id',
        'program_id' => 'required|exists:programs,id',
    ]);

    $mobil = Mobil::findOrFail($validatedData['mobil_id']);
    $program = Program::findOrFail($validatedData['program_id']);

    //isi kolom lama_sewa dari hari dari program yang dipilih
    $lama_sewa = $program->hari;

    //isi kolom total_biaya dari lama_sewa dikali mobil->biaya
    $total_biaya = $lama_sewa * $mobil->biaya;

    //masukkan ke database t_biaya_rental
    t_biaya_rental::create([
        'nama_penyewa' => $validatedData['nama_penyewa'],
        'mobil_id' => $validatedData['mobil_id'],
        'program_id' => $validatedData['program_id'],
        'lama_sewa' => $lama_sewa,
        'total_biaya' => $total_biaya,
    ]);

    return redirect()->route('index')->with('success', 'Data berhasil dibuat!');
}

public function edit (t_biaya_rental $t_biaya_rental) {
    $programs = program::all();
    $mobils = mobil::all();
    return view('edit', compact('t_biaya_rental','programs','mobils'));
}

public function update(t_biaya_rental $t_biaya_rental, Request $request)
{
    $validatedData = $request->validate([
        'nama_penyewa' => 'required|string',
        'mobil_id' => 'required|exists:mobils,id',
        'program_id' => 'required|exists:programs,id',
    ]);

    $mobil = Mobil::findOrFail($validatedData['mobil_id']);
    $program = Program::findOrFail($validatedData['program_id']);

    $lama_sewa = $program->hari;

    $total_biaya = $lama_sewa * $mobil->biaya;

    $t_biaya_rental->update([
        'nama_penyewa' => $validatedData['nama_penyewa'],
        'mobil_id' => $validatedData['mobil_id'],
        'program_id' => $validatedData['program_id'],
        'lama_sewa' => $lama_sewa,
        'total_biaya' => $total_biaya,
    ]);

    // Alihkan ke halaman index setelah update
    return redirect()->route('index')->with('success', 'Data berhasil diperbarui!');
}



public function destroy(t_biaya_rental $t_biaya_rental) {
    
    $t_biaya_rental->delete();

    return redirect()->route('index')->with('success', 'Transaksi berhasil dihapus.');
}



}
