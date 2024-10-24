<style>
    nav.pagination {
        display: flex;
        justify-content: center;
        padding: 1em;

        ul {
            display: flex;
            align-items: center;
            gap: 1em;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-right: 1em;
        }
        
        a {
            color: #0A0F49;
            text-decoration: none;
        }
        
        a:hover {
            color: #2980b9;
        }
        
        span {
            color: #0A0F49;
        }
        
        span.bg-blue-500 {
            background-color: #0A0F49;
            color: #fff;
            padding: 0.5em 1em;
            border-radius: 0.5em;
        }
    }
</style>

<nav class="pagination">
    <ul>
        @if ($paginator->onFirstPage())
            <li>
                <span>&laquo;</span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->url(1) }}">&laquo;</a>
            </li>
        @endif

        @if ($paginator->onFirstPage())
            <li>
                <span>&lt;</span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}">&lt;</a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li>{{ $element }}</li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li>
                        @if ($page == $paginator->currentPage())
                            <span style="background-color: #0A0F49; color: #fff; padding: 0.5em 1em; border-radius: 0.5em;">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    </li>
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}">&gt;</a>
            </li>
        @endif

        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->url($paginator->lastPage()) }}">&raquo;</a>
            </li>
        @endif
    </ul>
</nav>