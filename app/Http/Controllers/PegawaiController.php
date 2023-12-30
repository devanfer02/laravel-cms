<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private const NAMA_TABEL = 'data_pegawai';

    public function index()
    {
        $dataPegawai = DB::table(self::NAMA_TABEL)->paginate(5);

        return view('pegawai/index', [
            'list_pegawai' => $dataPegawai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai/add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        DB::table(self::NAMA_TABEL)->insert([
            'nama' => $validated['nama'],
            'nomor_telfon' => $validated['nomor_telfon'],
            'alamat' => $validated['alamat'],
            'posisi' => $validated['posisi']
        ]);


        return redirect('pegawai')->with('success', 'data pegawai berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai/update', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate($this->rules());

        $pegawai->fill($request->post())->save();

        return redirect('pegawai')->with('success', 'data pegawai berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect('pegawai')->with('success', 'data pegawai berhasil dihapus');
    }

    private function rules() {
        return [
            'nama' => 'required|string|max:255',
            'nomor_telfon' => 'required|string|numeric',
            'alamat' => 'string',
            'posisi' => 'string',
        ];
    }
}
