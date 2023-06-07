@extends('website.master')
@section('main')

<section class="container">
    <div class="update-detail">
        <div class="update-detail-info">

              @if (isset($model->parent->translate(app()->getlocale())->locale_additional['cover'] ))
                    <div class="update-detail_banner">
                        <img src="{{ image($model->parent->translate(app()->getlocale())->locale_additional['cover'] ) }}" alt="{{ $model->parent->translate(app()->getlocale())->locale_additional['alt_text'] }}"
                            title="{{ $post->translate(app()->getlocale())->title }}">
                    </div>
 
                @endif

            @if (isset($breadcrumbs))
            <div class="pagepath">
                <div class="pagepath-title">
                    <a href="/"><span class="icon-material-symbols_arrow-right-alt-rounded"></span>{{ trans('website.home') }}</a>
                </div>
                @foreach ($breadcrumbs as $breadcrumb)
                <div class="pagepath-title">
                    <a href="/{{ $breadcrumb['url'] }}"><span class="icon-material-symbols_arrow-right-alt-rounded"></span>
                        {{ $breadcrumb['name'] }}</a>
                </div>
                @endforeach

            </div>
            @endif
            <div class="update-detail_info campaingn-update-info">
                <h2>{{ $post->translate(app()->getlocale())->title }}</h2>
                <div class="update-detail_text">{!! $post->translate(app()->getlocale())->text !!}</div>

                @if (isset($post->files) && count($post->files) > 0)
                <div class="campaingn-slider-back">

                    <div class="campaingn-detail_slider">
                        @foreach ($post->files as $image)

                        @if(isset($image->title))
                        <div class="campaingn-detail_slide">
                            <a href="{{ $image->title }}" data-fancybox="gallery">
                                <img class="campaingn-detail_slide-img" src="{{ image($image->file) }}" alt="{{$image['file_additional'][app()->getlocale()]}}">
                                <span class="video-button"><img src="/assets/images/img/Polygon_2.png" alt="{{$image['file_additional'][app()->getlocale()]}}"></span>
                            </a>
                        </div>
                        @else
                        <div class="campaingn-detail_slide">
                        <a href="{{ image($image->file) }}" data-fancybox="gallery">
                            <img src="{{ image($image->file) }}" alt="{{$image['file_additional'][app()->getlocale()]}}">
                        </a>
                        </div>
                 
                        @endif
                        @endforeach
                    </div>

                </div>
                @endif

            </div>

            <div class="share">
                <span class="share-share">{{ trans('website.Icon_Share') }}:</span>
              <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
              <a class="a2a_button_facebook"></a>
              <a class="a2a_button_twitter"></a>
              <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
</div>
        </div>
        @if(isset($updates_posts))
        <div class="update-latest-updates">
            <div class="latest-updates_titel-div"><span class="latest-updates_titel">{{$updates->translate(app()->getlocale())->title}}</span></div>
            <div class="latest-updates_main">
                <div class="updates-heandler">
                    <span class="icon-Vector-21"></span>
                </div>
                <div class="latest-updates">
                    @foreach ($updates_posts as $updates_post)
                    @if($updates_post->id != $post->id)
                    <div class="latest-updates_info">
                        <a href="/{{ $updates_post->getFullSlug() }}">
                            <div class="latest-updates_text">
                                {{ $updates_post->translate(app()->getlocale())->title }}
                            </div>
                            <div class="latest-updates_date">
                                <span>{{ \Carbon\Carbon::parse($updates_post->date)->format('d') }}</span>
                                @if ('ka' == app()->getLocale())
                                  <span>{{ \Carbon\Carbon::parse($updates_post->date)->translatedFormat('M') }}</span>
                                  @else
                                   <span>{{ \Carbon\Carbon::parse($updates_post->date)->translatedFormat('F') }}</span>
                                @endif
                            </div>
                        </a>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection