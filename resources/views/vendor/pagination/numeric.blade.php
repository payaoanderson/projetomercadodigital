@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            <!-- Link para a página inicial -->
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Primeira</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">Primeira</a></li>
            @endif

            <!-- Link para páginas anteriores -->
            @if ($paginator->currentPage() > 1)
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">&laquo;</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            @endif

            <!-- Links para páginas numéricas -->
            @foreach ($elements[0] as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach

            <!-- Link para páginas seguintes -->
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">&raquo;</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            @endif

            <!-- Link para a última página -->
            @if ($paginator->lastPage() != $paginator->currentPage())
                <li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">Última</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">Última</span></li>
            @endif
        </ul>
    </nav>
@endif
