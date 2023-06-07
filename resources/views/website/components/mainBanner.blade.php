<section class="main_slider">
    <div class="main-slider">
        @if(isset($mainBanner))
        @foreach ($mainBanner as $banner)
        <div class="main-slide">
            <a href="#">
                <img src="{{ image($banner->translate(app()->getlocale())->image) }}" alt="img">
                <div class="main-slider__text">
                    <div class="container">
                        <div>{{ $banner->translate(app()->getlocale())->title }}</div>
                        <button>{!! $banner->translate(app()->getlocale())->button !!}</button>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @endif
    </div>
</section>