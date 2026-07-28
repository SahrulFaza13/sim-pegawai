<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use App\Models\Pegawai;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->string('search')->trim()->toString();

        $pegawai = Pegawai::query()
            ->when(
                $search !== '',
                fn($query) => $query->where(
                    'nama_pegawai',
                    'like',
                    "%{$search}%"
                )
            )
            ->orderBy('nama_pegawai')
            ->paginate(10)
            ->WithQueryString();

        return view('pegawai.index', compact('pegawai', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pegawai.create', [
            'pegawai' => new Pegawai(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePegawaiRequest $request)
    {
        Pegawai::create($request->validated());

        return to_route('pegawai.index')
                ->with('success', 'Data pegawai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai): View
    {
        return view('pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai): View
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai):RedirectResponse
    {
        $pegawai->update($request->validated());

        return to_route('pegawai.index')
            ->with('success', 'Data pegwai berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai):RedirectResponse
    {
        $namaPegawai = $pegawai->nama_pegawai;

        $pegawai->delete();

        return to_route('pegawai.index')
            ->with('sucess', "Data {$namaPegawai} berhasil dihapus.");
    }
}
