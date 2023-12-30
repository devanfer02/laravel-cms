<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    private const TABLE_NAME = 'data_buku';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataBuku = DB::table(self::TABLE_NAME)->paginate(5);

        return view('buku/index', [
            'list_buku' => $dataBuku
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku/add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        DB::table(self::TABLE_NAME)->insert([
            'nama' => $validated['nama'],
            'kategori' => $validated['kategori'],
            'penerbit' => $validated['penerbit'],
            'tahun' => $validated['tahun'],
            'jumlah_buku' => $validated['jumlah_buku']
        ]);

        return redirect('/buku')->with('success', 'data buku berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('buku/update', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate($this->rules());

        $buku->fill($request->post())->save();

        return redirect('buku')->with('success', 'data buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect('buku')->with('success', 'data buku berhasil dihapus');
    }

    private function rules() {
        return [
            'nama' => 'required|string|max:35',
            'kategori' => 'string',
            'penerbit' => 'string',
            'tahun' => 'required|numeric|digits:4',
            'jumlah_buku' => 'required|numeric|min:1'
        ];
    }
}
