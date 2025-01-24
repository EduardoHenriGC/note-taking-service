@php
    // Breadcrumb padrão, caso nenhum seja passado
    $breadcrumbs = $breadcrumbs ?? [
        ['label' => 'Home', 'url' => route('dashboard')],
    ];
@endphp

<nav class="flex py-3" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        @foreach ($breadcrumbs as $breadcrumb)
            <li class="inline-flex items-center">
                @if (isset($breadcrumb['url']))
                    <a href="{{ $breadcrumb['url'] }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        {{ $breadcrumb['label'] }}
                    </a>
                @else
                    <span class="inline-flex items-center text-sm font-medium text-gray-700 dark:text-gray-400">
                        {{ $breadcrumb['label'] }}
                    </span>
                @endif

                @if (!$loop->last)
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
