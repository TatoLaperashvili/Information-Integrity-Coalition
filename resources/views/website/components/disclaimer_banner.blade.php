
@if (isset($disclaimer_banner))
<section class="container">
    <div class="eu-disclaimer">
        <div class="eu-img">

            <a href="{{ $disclaimer_banner->translate(app()->getlocale())->Link }}" target="blamk">
                <img src="{{ image($disclaimer_banner->translate(app()->getlocale())->image) }}" alt="img">
            </a>
        </div>
        <div class="eu-text">
            {{ $disclaimer_banner->translate(app()->getlocale())->desc }}
        </div>
    </div>
</section>
@endif