<x-guru-layout>

    <x-slot:title>Edit Penilaian</x-slot:title>

    <x-slot:header>
        <div>
            <h2 class="text-[14px] lg:text-[15px] font-bold text-white">
                Edit Penilaian
            </h2>
            <p class="text-[11px] hidden sm:block" style="color: var(--text-muted);">
                Perbarui penilaian siswa
            </p>
        </div>
    </x-slot:header>


    <div class="max-w-3xl mx-auto">

        <div class="bg-white/[0.02] border border-white/5 rounded-2xl p-5 sm:p-7">

            <div class="mb-7">

                <p class="text-[10px] uppercase tracking-wider font-bold text-indigo-400">
                    Siswa PKL
                </p>

                <h1 class="text-xl font-bold text-white mt-1">
                    {{ $penilaian->siswa->nama }}
                </h1>

                <p class="text-xs text-slate-500 mt-1">
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

                        <label class="block text-xs font-semibold text-slate-300 mb-2">
                            {{ $label }}
                        </label>

                        <input
                            type="number"
                            name="{{ $field }}"
                            min="0"
                            max="100"
                            value="{{ old($field, $penilaian->$field) }}"
                            required
                            class="w-full rounded-xl bg-white/[0.03]
                                border border-white/10
                                px-4 py-3 text-sm text-white
                                outline-none focus:border-indigo-500"
                        >

                        @error($field)
                            <p class="text-xs text-red-400 mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                @endforeach


                <div>

                    <label class="block text-xs font-semibold text-slate-300 mb-2">
                        Catatan Guru
                    </label>

                    <textarea
                        name="catatan"
                        rows="5"
                        class="w-full rounded-xl bg-white/[0.03]
                            border border-white/10
                            px-4 py-3 text-sm text-white
                            outline-none focus:border-indigo-500"
                    >{{ old('catatan', $penilaian->catatan) }}</textarea>

                </div>


                <div class="flex flex-wrap gap-3 pt-3">

                    <a
                        href="{{ route('guru.penilaian.show', $penilaian->id) }}"
                        class="rounded-xl border border-white/10
                            px-5 py-3 text-sm font-semibold
                            text-slate-300 hover:bg-white/5 transition"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="rounded-xl bg-indigo-600
                            px-5 py-3 text-sm font-semibold
                            text-white hover:bg-indigo-500 transition"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-guru-layout>