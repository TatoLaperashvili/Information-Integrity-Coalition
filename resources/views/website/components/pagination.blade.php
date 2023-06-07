@if ($paginator->hasPages())
    <section class="container">
        <div class="pagination">
            <span class="page1">

                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" style="  list-style: none; padding:10px;">
                        {{ __('website.Pagination_prev') }}</li>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}">{{ __('website.Pagination_prev') }}</a>
                @endif
            </span>

            <ul>
                @if ($paginator->currentPage() > 3)
                    <li class="active pageNumber"><a href="{{ $paginator->url(1) }}" class="pag-number active-pagination">1</a></li>
                @endif
                @if ($paginator->currentPage() > 4)
                    <li><span>...</span></li>
                @endif

                @foreach (range(1, $paginator->lastPage()) as $i)
                    @if ($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                        @if ($i == $paginator->currentPage())
                            <li class="active pageNumber"><span>{{ $i }}</span></li>
                        @else
                            <li><a href="{{ $paginator->url($i) }}" class="pag-number active-pagination">{{ $i }}</a></li>
                        @endif
                    @endif
                @endforeach

                @if ($paginator->currentPage() < $paginator->lastPage() - 3)
                    <li><span>...</span></li>
                @endif
                @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                    <li><a href="{{ $paginator->url($paginator->lastPage()) }}"
                            class="pag-number active-pagination">{{ $paginator->lastPage() }}</a></li>
                @endif
            </ul>
            <span class="page2">
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}">{{ __('website.Pagination_next') }}</a>
                @else
                    <li class="page-item disabled" style="  list-style: none; padding:10px;">
                        {{ __('website.Pagination_next') }}</li>
                @endif
            </span>
        </div>
    </section>

@endif

