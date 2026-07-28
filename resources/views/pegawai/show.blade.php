@extends('layouts.app')

@section('title', 'Detail Pegawai')
@section('page-title', 'Detail Pegawai')

@section('content')
    <div class="mx-auto max-w-3xl rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
        <div class="flex flex-col gap-4 border-b border-slate-200 pb-6 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold text-indigo-600">Profil Pegawai</p>
                <h2 class="mt-1 text-2xl font-bold text-slate-900">
                    {{ $pegawai->nama_pegawai }}
                </h2>
            </div>

            <a
                href="{{ route('pegawai.edit', $pegawai) }}"
                class="rounded-lg bg-amber-500 px-4 py-2.5 text-center text-sm font-semibold text-white hover:bg-amber-600"
            >
                Ubah Data
            </a>
        </div>

        <dl class="mt-6 grid gap-5 sm:grid-cols-2">
            <div class="rounded-xl bg-slate-50 p-4">
                <dt class="text-sm font-medium text-slate-500">Jenis Kelamin</dt>
                <dd class="mt-1 font-semibold text-slate-900">
                    {{ $pegawai->jenis_kelamin }}
                </dd>
            </div>

            <div class="rounded-xl bg-slate-50 p-4">
                <dt class="text-sm font-medium text-slate-500">Pendidikan Terakhir</dt>
                <dd class="mt-1 font-semibold text-slate-900">
                    {{ $pegawai->pendidikan_terakhir }}
                </dd>
            </div>

            <div class="rounded-xl bg-slate-50 p-4">
                <dt class="text-sm font-medium text-slate-500">Tanggal Lahir</dt>
                <dd class="mt-1 font-semibold text-slate-900">
                    {{ $pegawai->tanggal_lahir->translatedFormat('d F Y') }}
                </dd>
            </div>

            <div class="rounded-xl bg-slate-50 p-4">
                <dt class="text-sm font-medium text-slate-500">Usia</dt>
                <dd class="mt-1 font-semibold text-slate-900">
                    {{ $pegawai->usia }} tahun
                </dd>
            </div>
        </dl>

        <div class="mt-7 border-t border-slate-200 pt-5">
            <a
                href="{{ route('pegawai.index') }}"
                class="inline-flex rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50"
            >
                Kembali ke Daftar
            </a>
        </div>
    </div>
@endsection
