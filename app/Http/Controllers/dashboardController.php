<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class dashboardController extends Controller
{
    public function index(): View {
        $pegawai = Pegawai::query()
            ->select([
                'id',
                'jenis_kelamin',
                'pendidikan_terakhir',
                'tanggal_lahir',
            ])
            ->get();

        $jumlahJenisKelamin = $this->jumlahPerKategori(
            $pegawai,
            'jenis_kelamin',
            config('pegawai.jenis_kelamin')
        );

        $jumlahPendidikan = $this->jumlahPerKategori(
            $pegawai,
            'pendidikan_terakhir',
            config('pegawai.pendidikan_terakhir')
        );

        $jumlahUsia = collect(config('pegawai.kelompok_usia'))
            ->mapWithKeys(fn (string $label)=> [$label => 0])
            ->toArray();

        foreach ($pegawai as $item) {
            $label = $this->penentuKelompokUsia($item->tanggal_lahir->age);
            $jumlahUsia[$label]++;
        }

        return view('dashboard', [
            'totalPegawai' => $pegawai->count(),
            'totalLakilaki' => $jumlahJenisKelamin->get('Laki-laki', 0),
            'totalPerempuan' => $jumlahJenisKelamin->get('Perempuan', 0),
            'genderChart' => $this->formatChart($jumlahJenisKelamin),
            'educationChart' => $this->formatChart($jumlahPendidikan),
            'ageChart' => $this->formatChart($jumlahUsia),
        ]);

    }
        private function jumlahPerKategori(
            Collection $pegawai,
            string $atribut,
            array $kategori
        ): Collection {
            $hasil = collect($kategori)
                ->mapWithKeys(fn(string $label) => [$label => 0]);

            foreach ($pegawai as $item) {
                $nilai = $item->{$atribut};

                if ($hasil->has($nilai)) {
                    $hasil= $pegawai->countBy($atribut);
                }
            }

            return $hasil;
        }

        private function penentuKelompokUsia(int $usia): string {

            return match (true){
                $usia < 20 => 'Di bawah 20 tahun',
                $usia <= 29 => '20-29 tahun',
                $usia <= 39 => '30-39 tahun',
                $usia <= 49 => '40-49 tahun',
                default => '50 tahun ke atas',
            };
        }

        private function formatChart(Collection $data): array {

            return[
                'labels' => $data->keys()->values()->all(),
                'values' =>$data->values()->all(),
            ];
        }
}
