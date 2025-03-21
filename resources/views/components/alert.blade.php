@if (!empty($message))
    <div id="alert"
        class="fixed top-5 right-5 z-50 flex p-4 mb-4 text-sm rounded-lg shadow-lg 
               {{ $type === 'success' ? 'text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400' : 'text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400' }}"
        role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 1 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <div>
            <span class="font-medium">
                {{ $type === 'success' ? '¡Éxito!' : '¡Error!' }}
            </span>
            @if ($type === 'error' && is_array($message))
                <ul class="mt-1.5 list-disc list-inside">
                    @foreach ($message as $msg)
                        <li>{{ $msg }}</li>
                    @endforeach
                </ul>
            @else
                {{ $message }}
            @endif
        </div>
    </div>
@endif

<script>
    setTimeout(() => {
        const alert = document.getElementById('alert');
        if (alert) {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500); // Remover el elemento después de que se desvanezca
        }
    }, 10000);
</script>