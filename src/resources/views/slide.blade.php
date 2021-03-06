<div class="slide">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @if ($slides->count())
            @foreach ($slides as $index => $slide)
            @if ($index === 0)
            <li data-target="#slider" class="active" data-slide-to="{!! $index !!}" class=""></li>
            @else
            <li data-target="#slider" data-slide-to="{!! $index !!}" class=""></li>
            @endif
            @endforeach
            @endif
        </ol>
        <div class="carousel-inner">
            @if ($slides->count())
            @foreach ($slides as $index => $slide)
            @if ($index === 0)
            <div class="carousel-item active" data-interval="6000">
                <a href="{{url(asset('/slides/'.$slide->slug))}}"><img class="img-fluid" src="{!! $slide->thumbnail !!}"></a>
            </div>
            @else
            <div class="carousel-item" data-interval="6000">
                <a href="{{url(asset('/slides/'.$slide->slug))}}"><img class="img-fluid" src="{!! $slide->thumbnail !!}"></a>
            </div>
            @endif
            @endforeach
            @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
