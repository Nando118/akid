<div role="alert" class="alert alert-{{ $type }} max-w-md mx-auto relative flex items-center">
    <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6 shrink-0 stroke-current mr-2"
        fill="none"
        viewBox="0 0 24 24">
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="@switch($type)
                @case('info')
                    M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z
                    @break
                @case('success')
                    M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z
                    @break
                @case('warning')
                    M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z
                    @break
                @case('error')
                    M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z
                    @break
                @default
                    M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z
             @endswitch" />
    </svg>
    <span class="flex-grow">{{ $message }}</span>
    <button type="button" class="text-gray-500 hover:text-gray-700" onclick="this.parentElement.style.display='none';">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
</div>
