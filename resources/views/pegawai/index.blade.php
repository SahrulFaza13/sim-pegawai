@extends('layouts.app')

@section('title', 'Data Pegawai')
@section('page-title', 'Data Pegawai')

@section('content')
    <div class="rounded-2xl bg-white shadow-sm ring-1 ring-slate-200">
        <div class="flex flex-col gap-4 border-b border-slate-200 p-5 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-bold text-slate-900">Daftar Pegawai</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Kelola seluruh data pegawai.
                </p>
            </div>

            <a href="{{ route('pegawai.create') }}"
                class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Tambah Pegawai
            </a>
        </div>

        <div class="p-5">
            <form action="{{ route('pegawai.index') }}" method="GET" class="mb-5 flex flex-col gap-3 sm:flex-row">
                <label for="search" class="sr-only">Cari nama pegawai</label>
                <input id="search" name="search" type="search" value="{{ $search }}" placeholder="Cari nama pegawai..."
                    class="min-w-0 flex-1 rounded-lg border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">

                <button type="submit"
                    class="rounded-lg bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-800">
                    Cari
                </button>

                @if ($search !== '')
                    <a href="{{ route('pegawai.index') }}"
                        class="rounded-lg border border-slate-300 px-4 py-2.5 text-center text-sm font-semibold text-slate-700 hover:bg-slate-50">
                        Reset
                    </a>
                @endif
            </form>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">No.
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">Nama
                                Pegawai</th>
                            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">Jenis
                                Kelamin</th>
                            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                Pendidikan</th>
                            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                Tanggal Lahir</th>
                            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">Usia
                            </th>
                            <th class="px-4 py-3 text-right text-xs font-bold uppercase tracking-wider text-slate-500">Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse ($pegawai as $item)
                            <tr class="hover:bg-slate-50">
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-slate-500">
                                    {{ $pegawai->firstItem() + $loop->index }}
                                </td>
                                <td class="px-4 py-4 text-sm font-semibold text-slate-900">
                                    {{ $item->nama_pegawai }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-slate-600">
                                    {{ $item->jenis_kelamin }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-slate-600">
                                    {{ $item->pendidikan_terakhir }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-slate-600">
                                    {{ $item->tanggal_lahir->translatedFormat('d F Y') }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-slate-600">
                                    {{ $item->usia }} tahun
                                </td>
                                <td class="whitespace-nowrap px-4 py-4 text-right text-sm">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('pegawai.show', $item) }}"
                                            class="rounded-md border border-slate-300 px-3 py-1.5 font-medium text-slate-700 hover:bg-slate-50">
                                            Detail
                                        </a>
                                        <a href="{{ route('pegawai.edit', $item) }}"
                                            class="rounded-md bg-amber-500 px-3 py-1.5 font-medium text-white hover:bg-amber-600">
                                            Ubah
                                        </a>
                                        <button type="button"
                                            data-url="{{ route('pegawai.destroy', ['pegawai' => $item->id]) }}"
                                            data-name="{{ $item->nama_pegawai }}"
                                            class=" btn-delete rounded-md bg-red-600 px-3 py-1.5 font-medium text-white hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-12 text-center">
                                    <p class="font-semibold text-slate-700">Data pegawai tidak ditemukan.</p>
                                    <p class="mt-1 text-sm text-slate-500">
                                        Tambahkan pegawai baru atau ubah kata pencarian.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($pegawai->hasPages())
                <div class="mt-6 border-t border-slate-200 pt-5">
                    {{ $pegawai->links() }}
                </div>
            @endif
        </div>
    </div>

    <div id="delete-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4" role="dialog"
        aria-modal="true" aria-labelledby="delete-modal-title">
        <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-2xl">
            <div class="grid size-12 place-items-center rounded-full bg-red-100 text-2xl text-red-600">
                !
            </div>

            <h2 id="delete-modal-title" class="mt-4 text-lg font-bold text-slate-900">
                Hapus data pegawai?
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-600">
                Data
                <strong id="delete-employee-name" class="text-slate-900"></strong>
                akan dihapus permanen dan tidak dapat dikembalikan.
            </p>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" data-delete-close
                    class="rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                    Batal
                </button>

                <form id="delete-form" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="rounded-lg bg-red-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-red-700">
                        Ya, hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
