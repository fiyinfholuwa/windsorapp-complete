@if ($paginator->lastPage() > 1)
   
    <div class="col-lg-12">
        <div class="room-pagination">
            <a href="{{ $paginator->url($paginator->currentPage()-1) }}">Previous</a>
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
           
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
           
            @endfor
           
            <a href="{{ $paginator->url($paginator->currentPage()+1) }}">Next <i class="fa fa-long-arrow-right"></i></a>
        </div>
    </div>
@endif

                