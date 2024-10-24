<nav class="flex justify-center py-4">
    <ul class="flex items-center gap-4">
        @if ($paginator->onFirstPage())
            <li class="mr-1">
                <span class="text-blue-500 hover:text-blue-700">&laquo;</span>
            </li>
        @else
            <li class="mr-1">
                <a href="{{ $paginator->url(1) }}" class="text-blue-500 hover:text-blue-700">&laquo;</a>
            </li>
        @endif

        @if ($paginator->onFirstPage())
            <li class="mr-1">
                <span class="text-blue-500 hover:text-blue-700">&lt;</span>
            </li>
        @else
            <li class="mr-1">
                <a href="{{ $paginator->previousPageUrl() }}" class="text-blue-500 hover:text-blue-700">&lt;</a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="mr-1">{{ $element }}</li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li class="mr-1">
                        @if ($page == $paginator->currentPage())
                            <span class="bg-blue-500 text-white px-4 py-2 rounded">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="text-blue-500 hover:text-blue-700">{{ $page }}</a>
                        @endif
                    </li>
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="mr-1">
                <a href="{{ $paginator->nextPageUrl() }}" class="text-blue-500 hover:text-blue-700">&gt;</a>
            </li>
        @endif

        @if ($paginator->hasMorePages())
            <li class="mr-1">
                <a href="{{ $paginator->url($paginator->lastPage()) }}" class="text-blue-500 hover:text-blue-700">&raquo;</a>
            </li>
        @endif
    </ul>
</nav>