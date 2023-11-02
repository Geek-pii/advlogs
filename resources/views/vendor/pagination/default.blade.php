<?php
// config
$linkLimit = 5; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($paginator->lastPage() > 1)
  <ul class="pagination">
    <a class="page-link" href="{{ $paginator->url(1) }}">
      <span style="white-space: nowrap">{{ trans('pagination.previous') }}</span>
    </a>
    @if($paginator->currentPage() > 2)
      <li class="page-item"><span>...</span></li>
    @endif
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
          <?php
          $halfTotalLinks = floor($linkLimit / 2);
          $from = $paginator->currentPage() - $halfTotalLinks;
          $to = $paginator->currentPage() + $halfTotalLinks;
          if ($paginator->currentPage() < $halfTotalLinks) {
              $to += $halfTotalLinks - $paginator->currentPage();
          }
          if ($paginator->lastPage() - $paginator->currentPage() < $halfTotalLinks) {
              $from -= $halfTotalLinks - ($paginator->lastPage() - $paginator->currentPage()) - 1;
          }
          ?>
      @if ($from < $i && $i < $to)
        @if($paginator->currentPage() == $i)
          <li class="page-item">
            <a class="page-link">{{ $i }}</a>
          </li>
        @else
          <li class="page-item">
            <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
          </li>
        @endif
      @endif
    @endfor
    @if($paginator->currentPage() < $paginator->lastPage() - 1)
      <li class="page-item"><span>...</span></li>
    @endif
    <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">
      <span style="white-space: nowrap">{{ trans('pagination.next') }}</span>
    </a>
  </ul>
@endif