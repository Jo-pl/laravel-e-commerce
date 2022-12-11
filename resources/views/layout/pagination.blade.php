<div class="pagination-container">
    <div class="inline-stuff">
    @if(!$paginator->onFirstPage())
    <a href="{{$paginator->previousPageUrl()}}">Previous</a>
    @endif
    <p class="pagination-distance">Page {{$paginator->currentPage()}}</p>
    @if($paginator->hasMorePages())
    <a href="{{$paginator->nextPageUrl()}}">Next</a>
    @endif
    </div>
</div>