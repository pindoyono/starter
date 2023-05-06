<div class="p-3">
    <div class="text-lg font-semibold font-gray-700">{{ $confirmationTitle }}</div>

    <div class="py-2">
        @if ($lowonganName)
            Nama Lowongan : {{ $lowonganName }}
        @endif
        @if ($lowonganNames)
            Nama Lowongan :
            @foreach ($lowonganNames as $names)
                <span
                    class="inline-block whitespace-nowrap rounded-[0.27rem] bg-warning-100 px-[0.65em] pt-[0.35em] pb-[0.25em] text-center align-baseline text-[0.75em] font-bold leading-none text-warning-800">
                    {{ $names['job_title'] }}
                </span>
            @endforeach
        @endif
        <div class="font-normal text-gray-600">{{ $confirmationDescription }}</div>
        <div class="flex justify-end mt-3 space-x-2">
            <button class="px-3 py-2 m-1 text-sm text-black bg-gray-200 border border-gray-400 rounded cursor-pointer"
                wire:click="cancel">
                Cancel
            </button>
            <button class="px-3 py-2 m-1 text-sm text-white bg-indigo-500 rounded cursor-pointer" wire:click="confirm">
                Confirm
            </button>
        </div>
    </div>

</div>
