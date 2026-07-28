@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Pegawai')

@section('content')
    <section aria-labelledby="ringkasan-title">
        <div class="mb-5">
            <h2 id="ringkasan-title" class="text-lg font-bold text-slate-900">
                Ringkasan Data
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Statistik pegawai berdasarkan data yang tersimpan.
            </p>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
            <article class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <p class="text-sm font-medium text-slate-500">Total Pegawai</p>
                <p class="mt-2 text-4xl font-bold text-slate-900"> {{ $totalPegawai }}</p>
            </article>

            <article class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <p class="text-sm font-medium text-slate-500">Laki-laki</p>
                <p class="mt-2 text-4xl font-bold text-slate-900"> {{ $totalLakilaki }}</p>
            </article>

            <article class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <p class="text-sm font-medium text-slate-500">Perempuan</p>
                <p class="mt-2 text-4xl font-bold text-blue-600">{{ $totalPerempuan }}</p>
            </article>
        </div>
    </section>

    <section class="mt-8 grid gap-6 xl:grid-cols-2" aria-label="Grafik statistik pegawai">
        <article class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <div>
                <h2 class="font-bold text-slate-900">Jenis Kelamin</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Perbandingan jumlah pegawai laki-laki dan perempuan.
                </p>
            </div>

            <div class="mt-6 h-80">
                <canvas id="gender-chart"></canvas>
            </div>
            <script type="application/json" id="gender-chart-data">
                    @json($genderChart)
                </script>
        </article>


        <article class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <div>
                <h2 class="font-bold text-slate-900">Pendidikan Terakhir</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Jumlah pegawai pada setiap jenjang pendidikan.
                </p>
            </div>

            <div class="mt-6 h-80">
                <canvas id="education-chart"></canvas>
            </div>
            <script type="application/json" id="education-chart-data">
                        @json($educationChart)
                    </script>
        </article>

        <article class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 xl:col-span-2">
            <div>
                <h2 class="font-bold text-slate-900">Kelompok Usia</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Distribusi pegawai berdasarkan usia saat ini.
                </p>
            </div>

            <div class="mt-6 h-80">
                <canvas id="age-chart"></canvas>
            </div>
            <script type="application/json" id="age-chart-data">
                        @json($ageChart)
                    </script>
        </article>
    </section>
@endsection
