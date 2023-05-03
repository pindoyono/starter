<x-modal formAction="save">
    <x-slot name="title">
        <div class="text-lg font-semibold font-gray-700">{{ $confirmationTitle }} </div>
    </x-slot>

    <x-slot name="content">
        <p>Kolom yang bertanda * wajib di isi</p>
        <div class="px-4 pt-5 pb-4 overflow-y-auto bg-white sm:p-6 sm:pb-4">
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                <div class="sm:col-span-3">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Perusahaan *</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="nama" id="nama" autocomplete="given-nama"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('nama')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="bidang_usaha" class="block text-sm font-medium text-gray-700">Bidang Usaha *</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="bidang_usaha" id="bidang_usaha"
                            autocomplete="given-bidang_usaha"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('bidang_usaha')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="no_telpon" class="block text-sm font-medium text-gray-700">No Telepon * </label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="no_telpon" id="no_telpon" autocomplete="given-no_telpon"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('no_telpon')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="fax" class="block text-sm font-medium text-gray-700">FAX</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="fax" id="fax" autocomplete="given-fax"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('fax')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="email" id="email" autocomplete="given-email"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="website" id="website" autocomplete="given-website"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('website')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="npwp" class="block text-sm font-medium text-gray-700">NPWP</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="npwp" id="npwp" autocomplete="given-npwp"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('npwp')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat *</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="alamat" id="alamat" autocomplete="given-alamat"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('alamat')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="rt" class="block text-sm font-medium text-gray-700">RT</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="rt" id="rt" autocomplete="given-rt"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('rt')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="rw" class="block text-sm font-medium text-gray-700">RW</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="rw" id="rw" autocomplete="given-rw"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('rw')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="nama_dusun" class="block text-sm font-medium text-gray-700">Nama Dusun</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="nama_dusun" id="nama_dusun"
                            autocomplete="given-nama_dusun"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('nama_dusun')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="kelurahan" class="block text-sm font-medium text-gray-700">Kelurahan</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="kelurahan" id="kelurahan"
                            autocomplete="given-kelurahan"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('kelurahan')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="kecamatan" id="kecamatan"
                            autocomplete="given-kecamatan"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('kecamatan')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="kabupaten" class="block text-sm font-medium text-gray-700">Kabupaten</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="kabupaten" id="kabupaten"
                            autocomplete="given-kabupaten"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('kabupaten')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode Pos *</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="kode_pos" id="kode_pos"
                            autocomplete="given-kode_pos"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('kode_pos')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="lintang" class="block text-sm font-medium text-gray-700">Lintang</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="lintang" id="lintang" autocomplete="given-lintang"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('lintang')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="bujur" class="block text-sm font-medium text-gray-700">Bujur</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="bujur" id="bujur" autocomplete="given-bujur"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('bujur')
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
