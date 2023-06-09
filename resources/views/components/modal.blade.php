@props(['formAction' => false])

<div>
    @if ($formAction)
        <form wire:submit.prevent="{{ $formAction }}">
    @endif
    <div class="p-4 bg-white border-b sm:px-6 sm:py-4 border-gray-150">
        @if (isset($title))
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                {{ $title }}
            </h3>
        @endif
    </div>
    <div class="px-4 bg-white sm:p-6">
        <div class="space-y-6">
            {{ $content }}
        </div>
    </div>

    {{-- <div class="px-4 pb-5 bg-white sm:px-4 sm:flex">
        {{ $buttons }}
    </div> --}}
    <div
        class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t-2 border-opacity-100 rounded-b-md border-neutral-100 dark:border-opacity-50">
        {{ $buttons }}
    </div>
    @if ($formAction)
        </form>
    @endif
</div>
