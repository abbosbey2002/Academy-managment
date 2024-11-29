@if ($paginator->hasPages())
<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="leadList_info" role="status" aria-live="polite">
            Showing 1 to 10 of 10 entries
        </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="leadList_paginate">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="paginate_button page-item previous disabled" id="leadList_previous">
                        <a aria-controls="leadList" data-dt-idx="previous" tabindex="0" class="page-link">@lang('pagination.previous')</a>
                    </li>
                    @else
                    <li class="paginate_button page-item previous" id="leadList_previous">
                        <a href="{{ $paginator->previousPageUrl() }}" aria-controls="leadList" rel="prev" data-dt-idx="previous" tabindex="0" class="page-link">@lang('pagination.previous')</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                            <li class="paginate_button page-item active">
                                <a aria-controls="leadList" data-dt-idx="0" tabindex="0" class="page-link">{{ $page }}</a>
                            </li>
                            @else
                                <li class="paginate_button page-item">
                                    <a href="{{ $url }}" aria-controls="leadList" data-dt-idx="0" tabindex="0" class="page-link">{{ $page }}</a>
                                </li>
                            @endif
                            @endforeach
                        @endif
                    @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="paginate_button page-item next" id="leadList_next">
                        <a href="{{ $paginator->nextPageUrl() }}" aria-controls="leadList" data-dt-idx="next" rel="next" tabindex="0" class="page-link">Next</a>
                    </li>
                    @else
                    <li class="paginate_button page-item next disabled" id="leadList_next">
                        <span aria-controls="leadList" data-dt-idx="next" tabindex="0" class="page-link">Next</span>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
@endif
