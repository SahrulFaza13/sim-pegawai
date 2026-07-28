@csrf

@if ($method !== 'POST')
    @method($method)
@endif

<div class="grid gap-5 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <label for="nama_pegawai" class="mb-2 block text-sm font-semibold text-slate-700">
            Nama Pegawai <span class="text-red-600">*</span>
        </label>
        <input
            id="nama_pegawai"
            name="nama_pegawai"
            type="text"
            value="{{ old('nama_pegawai', $pegawai->nama_pegawai) }}"
            maxlength="100"
            required
            autofocus
            @class([
                'w-full rounded-lg border px-4 py-2.5 outline-none transition focus:ring-2',
                'border-red-400 focus:border-red-500 focus:ring-red-100' => $errors->has('nama_pegawai'),
                'border-slate-300 focus:border-indigo-500 focus:ring-indigo-100' => !$errors->has('nama_pegawai'),
            ])
        >
        @error('nama_pegawai')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="jenis_kelamin" class="mb-2 block text-sm font-semibold text-slate-700">
            Jenis Kelamin <span class="text-red-600">*</span>
        </label>
        <select
            id="jenis_kelamin"
            name="jenis_kelamin"
            required
            @class([
                'w-full rounded-lg border bg-white px-4 py-2.5 outline-none transition focus:ring-2',
                'border-red-400 focus:border-red-500 focus:ring-red-100' => $errors->has('jenis_kelamin'),
                'border-slate-300 focus:border-indigo-500 focus:ring-indigo-100' => !$errors->has('jenis_kelamin'),
            ])
        >
            <option value="">Pilih jenis kelamin</option>
            @foreach (config('pegawai.jenis_kelamin') as $jenisKelamin)
                <option
                    value="{{ $jenisKelamin }}"
                    @selected(old('jenis_kelamin', $pegawai->jenis_kelamin) === $jenisKelamin)
                >
                    {{ $jenisKelamin }}
                </option>
            @endforeach
        </select>
        @error('jenis_kelamin')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="pendidikan_terakhir" class="mb-2 block text-sm font-semibold text-slate-700">
            Pendidikan Terakhir <span class="text-red-600">*</span>
        </label>
        <select
            id="pendidikan_terakhir"
            name="pendidikan_terakhir"
            required
            @class([
                'w-full rounded-lg border bg-white px-4 py-2.5 outline-none transition focus:ring-2',
                'border-red-400 focus:border-red-500 focus:ring-red-100' => $errors->has('pendidikan_terakhir'),
                'border-slate-300 focus:border-indigo-500 focus:ring-indigo-100' => !$errors->has('pendidikan_terakhir'),
            ])
        >
            <option value="">Pilih pendidikan</option>
            @foreach (config('pegawai.pendidikan_terakhir') as $pendidikan)
                <option
                    value="{{ $pendidikan }}"
                    @selected(old('pendidikan_terakhir', $pegawai->pendidikan_terakhir) === $pendidikan)
                >
                    {{ $pendidikan }}
                </option>
            @endforeach
        </select>
        @error('pendidikan_terakhir')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="tanggal_lahir" class="mb-2 block text-sm font-semibold text-slate-700">
            Tanggal Lahir <span class="text-red-600">*</span>
        </label>
        <input
            id="tanggal_lahir"
            name="tanggal_lahir"
            type="date"
            value="{{ old('tanggal_lahir', $pegawai->tanggal_lahir?->format('Y-m-d')) }}"
            max="{{ now()->format('Y-m-d') }}"
            required
            @class([
                'w-full rounded-lg border px-4 py-2.5 outline-none transition focus:ring-2',
                'border-red-400 focus:border-red-500 focus:ring-red-100' => $errors->has('tanggal_lahir'),
                'border-slate-300 focus:border-indigo-500 focus:ring-indigo-100' => !$errors->has('tanggal_lahir'),
            ])
        >
        @error('tanggal_lahir')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mt-7 flex flex-col-reverse gap-3 border-t border-slate-200 pt-5 sm:flex-row sm:justify-end">
    <a
        href="{{ route('pegawai.index') }}"
        class="rounded-lg border border-slate-300 px-5 py-2.5 text-center text-sm font-semibold text-slate-700 hover:bg-slate-50"
    >
        Batal
    </a>

    <button
        type="submit"
        class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
    >
        {{ $submitLabel }}
    </button>
</div>
