<x-guru-layout>

    <x-slot:title>Edit Penilaian</x-slot:title>

    <x-slot:header>
        <div>
            <h2 class="text-[14px] lg:text-[15px] font-bold text-slate-800">
                Edit Penilaian
            </h2>
            <p class="text-[11px] hidden sm:block text-slate-500">
                Perbarui penilaian siswa
            </p>
        </div>
    </x-slot:header>


    <div class="max-w-3xl mx-auto">

        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-7 shadow-sm">

            <div class="mb-7 pb-5 border-b border-slate-100">

                <p class="text-[10px] uppercase tracking-wider font-bold text-indigo-600">
                    Siswa PKL
                </p>

                <h1 class="text-xl font-bold text-slate-900 mt-1">
                    {{ $penilaian->siswa->nama }}
                </h1>

                <p class="text-xs text-slate-500 mt-1 font-mono">
                    NIS: {{ $penilaian->siswa->nis ?? '-' }}
                </p>

            </div>


            <form
                action="{{ route('guru.penilaian.update', $penilaian->id) }}"
                method="POST"
                class="space-y-5"
            >

                @csrf
                @method('PUT')


                @php
                    $aspeks = [
                        'disiplin' => 'Disiplin',
                        'komunikasi' => 'Komunikasi',
                        'kerjasama' => 'Kerja Sama',
                        'tanggung_jawab' => 'Tanggung Jawab',
                        'keterampilan' => 'Keterampilan',
                    ];
                @endphp


                @foreach($aspeks as $field => $label)

                    <div>

                        <label class="block text-xs font-semibold text-slate-700 mb-2">
                            {{ $label }}
                        </label>

                        <input
                            type="number"
                            name="{{ $field }}"
                            min="0"
                            max="100"
                            value="{{ old($field, $penilaian->$field) }}"
                            required
                            style="background-color: #f8fafc !important; color: #0f172a !important;"
                            class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm placeholder-slate-400 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all"
                        >

                        @error($field)
                            <p class="text-xs text-rose-500 mt-1 font-medium">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                @endforeach


                <div>

                    <label class="block text-xs font-semibold text-slate-700 mb-2">
                        Catatan Guru
                    </label>

                    <textarea
                        name="catatan"
                        rows="5"
                        style="background-color: #f8fafc !important; color: #0f172a !important;"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm placeholder-slate-400 outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all"
                    >{{ old('catatan', $penilaian->catatan) }}</textarea>

                </div>


                <div class="flex flex-wrap gap-3 pt-3">

                    <a
                        href="{{ route('guru.penilaian.show', $penilaian->id) }}"
                        class="rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-indigo-600 shadow-sm transition-all duration-200"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white hover:bg-indigo-700 shadow-sm active:scale-[0.98] transition-all duration-200"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-guru-layout>