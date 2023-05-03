<x-modal formAction="save">
    <x-slot name="title">
        <div class="text-lg font-semibold font-gray-700">{{ $confirmationTitle }} </div>
    </x-slot>

    <x-slot name="content">
        <div class="px-4 pt-5 pb-4 overflow-y-auto bg-white sm:p-6 sm:pb-4">
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="name" value="asfaksfakjs" id="name"
                            autocomplete="given-name"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>

                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <div class="mt-1">
                        <input id="email" wire:model.defer="email" type="email" autocomplete="email"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="title" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1">
                        <input type="password" wire:model.defer="password" id="password" autocomplete="job-title"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="title" class="block text-sm font-medium text-gray-700">Komfirmasi Password</label>
                    <div class="mt-1">
                        <input type="password" wire:model.defer="confir_password" id="confir_password"
                            autocomplete="job-title"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="text-red-500">
                            @error('confir_password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="title" class="block text-sm font-medium text-gray-700">Role</label>
                    <span class="text-red-500">
                        @error('role_user')
                            {{ $message }}
                        @enderror
                    </span>

                    @foreach ($roles as $role)
                        <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                            <input
                                class="relative float-left mt-[0.15rem] mr-[6px] -ml-[1.5rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:ml-[0.25rem] checked:after:-mt-px checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-t-0 checked:after:border-l-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:ml-[0.25rem] checked:focus:after:-mt-px checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-t-0 checked:focus:after:border-l-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary"
                                type="checkbox" wire:model.defer="role_user" value="{{ $role['name'] }}"
                                id="{{ $role['id'] }}" />
                            <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="checkboxDefault">
                                {{ $role['name'] }}
                            </label>
                        </div>
                    @endforeach
                </div>

                {{-- <div class="sm:col-span-3">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <div class="mt-1">
                        <select id="role" wire:model.defer="role"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="Member">Member</option>
                            <option value="Moderator">Moderator</option>
                            <option value="Administrator">Administrator</option>
                        </select>
                    </div>
                </div> --}}

                {{-- <div class="sm:col-span-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Notes</label>
                    <div class="mt-1">
                        <textarea rows="4" x-data="SupportsWepInsert({ types: [ & quot;user & quot;, & quot;command & quot;] })" x-bind="insertInput" ;="" wire:model.defer="notes"
                            placeholder="Use the @ sign to mention one of the other users or enter a / to trigger insert commands."
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>

                    </div>
                </div> --}}
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
