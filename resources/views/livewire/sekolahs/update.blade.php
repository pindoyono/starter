<x-modal formAction="update">
    <x-slot name="title">
        <div class="text-lg font-semibold font-gray-700">{{ $confirmationTitle }} </div>
    </x-slot>

    <x-slot name="content">
        <div class="px-4 pt-5 pb-4 overflow-y-auto bg-white sm:p-6 sm:pb-4">
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Sekolah</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="nama" value="asfaksfakjs" id="nama"
                            autocomplete="given-nama"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('nama')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Sekolah</label>
                    <div class="mt-1">
                        <input id="alamat" wire:model.defer="alamat" type="text" autocomplete="alamat"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('alamat')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="tipe" class="block text-sm font-medium text-gray-700">Tipe Sekolah</label>

                    <select wire:model.defer="tipe" id="tipe" autocomplete="tipe" data-te-select-init>
                        <option>Pilih Tipe Sekolah</option>
                        <option value="Negeri">Sekolah Negeri</option>
                        <option value="Swasta">Sekolah Swasta</option>
                    </select>
                    <span class="text-red-500">
                        @error('tipe')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="sm:col-span-3">
                    <label for="kurikulum" class="block text-sm font-medium text-gray-700">Kurikulum Sekolah</label>
                    <div class="mt-1">
                        <select wire:model.defer="kurikulum" id="kurikulum" autocomplete="kurikulum"
                            data-te-select-init>
                            <option>Pilih Kurikulum Sekolah</option>
                            <option value="Kurikulum 2013">Kurikulum 2013</option>
                            <option value="Kurikulum Merdeka">Kurikulum Merdeka</option>
                        </select>
                        <span class="text-red-500">
                            @error('kurikulum')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="no_hp" class="block text-sm font-medium text-gray-700">No Tlp Sekolah</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="no_hp" id="no_hp" autocomplete="no_hp"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('no_hp')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="provinsi" id="provinsi" autocomplete="provinsi"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('provinsi')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="kabupaten" class="block text-sm font-medium text-gray-700">Kabupaten</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="kabupaten" id="kabupaten" autocomplete="kabupaten"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('kabupaten')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="logo" class="block text-sm font-medium text-gray-700">logo</label>
                    <div class="mt-1">
                        {{-- preview_logo --}}
                        @if ($logo)
                            <img src="{{ $logo->temporaryUrl() }}" alt="Preview Image" width="200">
                        @else
                            <img src="{{ asset('storage/' . $preview_logo) }}" alt="Preview Image" width="200">
                        @endif

                        <input type="file" wire:model.defer="logo" id="logo" autocomplete="logo"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('logo')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button
            class="mx-2 inline-block rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
            type="submit">
            Simpan
        </button>
        <button type="button" wire:click="$emit('closeModal')"
            class="mx-2 inline-block rounded bg-danger px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)]">
            Kembali
        </button>
    </x-slot>
</x-modal>
