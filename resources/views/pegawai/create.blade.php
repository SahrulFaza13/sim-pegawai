@extends('layouts.app')

@section('title', 'Tambah Pegawai')
@section('page-title', 'Tambah Pegawai')

@section('content')
    <div class="mx-auto max-w-3xl rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
        <div class="mb-6">
            <h2 class="text-lg font-bold text-slate-900">Form Data Pegawai</h2>
            <p class="mt-1 text-sm text-slate-500">
                Lengkapi seluruh kolom bertanda bintang.
            </p>
        </div>

        <form action="{{ route('pegawai.store') }}" method="POST">
            @include('pegawai._form', [
                'method' => 'POST',
                'submitLabel' => 'Simpan Pegawai',
            ])
        </form>
    </div>
@endsection

resources/views/pegawai/edit.blade.php

@extends('layouts.app')

@section('title', 'Ubah Pegawai')
@section('page-title', 'Ubah Pegawai')

@section('content')
    <div class="mx-auto max-w-3xl rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
        <div class="mb-6">
            <h2 class="text-lg font-bold text-slate-900">Ubah Data Pegawai</h2>
            <p class="mt-1 text-sm text-slate-500">
                Perbarui data {{ $pegawai->nama_pegawai }}.
            </p>
        </div>

        <form action="{{ route('pegawai.store', $pegawai) }}" method="POST">
            @include('pegawai._form', [
                'method' => 'PUT',
                'submitLabel' => 'Simpan Perubahan',
            ])
        </form>
    </div>
@endsection
