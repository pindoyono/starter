<x-modal formAction="save">
    <x-slot name="title">
        <div class="text-lg font-semibold font-gray-700">{{ $confirmationTitle }} </div>
    </x-slot>

    <x-slot name="content">
        <p>Kolom yang bertanda * wajib di isi</p>
        <div class="px-4 pt-5 pb-4 overflow-y-auto bg-white sm:p-6 sm:pb-4">
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                <div class="sm:col-span-3">
                    <label for="job_title" class="block text-sm font-medium text-gray-700">Judul Lowongan *</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="job_title" id="job_title" autocomplete="given-job_title"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('job_title')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="sm:col-span-12">
                    <label for="job_contact" class="block text-sm font-medium text-gray-700">Deskripsi
                        Pekerjaan</label>
                    <div class="mt-1">
                        <textarea wire:model.defer="job_description" class="w-full " id="exampleFormControlTextarea1" rows="3"
                            placeholder=""></textarea>
                        <span class="text-red-500">
                            @error('job_description')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="job_location" class="block text-sm font-medium text-gray-700">Lokasi *</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="job_location" id="job_location"
                            autocomplete="given-job_location"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('job_location')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="job_salary" class="block text-sm font-medium text-gray-700">Gaji </label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="job_salary" id="job_salary"
                            autocomplete="given-job_salary"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('job_salary')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="job_contact" class="block text-sm font-medium text-gray-700">Kontak * </label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="job_contact" id="job_contact"
                            autocomplete="given-job_contact"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('job_contact')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>


                <div class="sm:col-span-12">
                    <label for="job_requirements" class="block text-sm font-medium text-gray-700">Kontak *</label>
                    <div class="mt-1">
                        <textarea wire:model.defer="job_requirements" class="w-full " id="exampleFormControlTextarea1" rows="3"
                            placeholder=""></textarea>
                        <span class="text-red-500">
                            @error('job_requirements')
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
