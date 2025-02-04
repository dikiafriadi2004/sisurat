@if ($paginator->hasPages())

    <div class="col-sm">
        <div class="text-muted">
            Showing
            <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
            to
            <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
            of
            <span class="fw-semibold">{{ $paginator->total() }}</span>
            results
        </div>
    </div>

    <div class="col-sm-auto mt-3 mt-sm-0">
        <ul class="pagination pagination-rounded m-0">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link"><i class='bx bx-left-arrow-alt'></i></span>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link"><i
                            class='bx bx-left-arrow-alt'></i></a>
                </li>
            @endif

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span
                            class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a href="#" class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link"><i
                            class='bx bx-right-arrow-alt'></i></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link"><i class='bx bx-right-arrow-alt'></i></span>
                </li>
            @endif

        </ul>
    </div>

@endif
