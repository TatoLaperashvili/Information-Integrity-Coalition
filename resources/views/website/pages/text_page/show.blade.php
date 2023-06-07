@extends('website.master')
@section('main')

	
@if(isset($model->translate(app()->getlocale())->locale_additional['cover'] ))
<section>
    <div class="about-banner">
        <img src="{{ image($model->translate(app()->getlocale())->locale_additional['cover'] )}}" alt="{{$model->translate(app()->getlocale())->locale_additional['alt_text'] }}" >
    </div>
</section>
@else
<div class="banner-margin"></div>
@endif


@if(isset($breadcrumbs))
<section class="container">
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
</section>
@endif
<section class="container">
    <div class="about-us_main">

        <div class="about-us">
            <div class="about-us_title-div"><span class="about-us_title">{{ $post->translate()->title }}</span></div>
            <div class="about-us_text">{!! $post->translate()->text !!}</div>
            <div class="partner">
                @foreach ($partners_banner as $partner)
                @if (in_array($partner->id, $post->coalition_banner))
                <div class="partner-div">
                   <a  href=" {{ $partner->translate(app()->getlocale())->Link }}" class="@if (isset($partner->translate(app()->getlocale())->Link)) clicked @endif" target="blank">
                        <img src="{{ image($partner->thumb) }}" alt="partner-img">
                    </a>
                </div>
                @endif
            @endforeach
            </div>
            @if(isset($post->files) && count($post->files) > 0)
            <div class="about-gallery">
                @foreach ($post->files as $image)
                    @if(isset($image->title))
                <a href="{{ $image->title }}" data-fancybox="gallery">
                   <img class="gallery-img" src="{{ image($image->file) }}" alt="{{$image['file_additional'][app()->getlocale()]}}">
                   
                    <span class="video-button"><img src="/assets/images/img/Polygon_2.png" alt="{{$image['file_additional'][app()->getlocale()]}}"></span>
                </a>
                @else
                <a href="{{ image($image->file) }}" data-fancybox="gallery">
                    <img src="{{ image($image->file) }}" alt="{{$image['file_additional'][app()->getlocale()]}}">
                </a>
                @endif
                @endforeach

            </div>
            @endif
            <div class="share">
                    <span class="share-share">{{ trans('website.Icon_Share') }}:</span>
           <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
              <a class="a2a_button_facebook"></a>
              <a class="a2a_button_twitter"></a>
              <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
</div>
                </div>
                 
                            
            </div>
        <div class="updates-heandler">
            <span class="icon-Vector-21"></span>
        </div>

        <div class="updates">
           @if(isset($updates_posts))
            <div class="latest-updates_titel-div"><span class="latest-updates_titel">{{$updates->translate(app()->getlocale())->title}}</span></div>
            <div class="latest-updates_main">
                
                <div class="latest-updates">
                    @foreach ($updates_posts as $updates_post)
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
                    @endforeach
                </div>
            </div>
            @endif

            @if(isset($latest_publications))
            <div class="latest-publications_main">
                <div class="updates-heandler">
                    <span class="icon-Vector-21"></span>
                </div>
                <div class="latest-publications_title-div"><span class="latest-publications_title">{{$publications->translate(app()->getlocale())->title}}</span></div>
                <div class="latest-updates">
                    @foreach ($latest_publications as $latest_publication)
                    <div class="latest-updates_info">
                        <a href="/{{ $latest_publication->getFullSlug() }}">
                            <div class="latest-updates_text">
                                {{ $latest_publication->translate(app()->getlocale())->title }}
                            </div>
                            <div class="latest-updates_date">
                                <span>{{ \Carbon\Carbon::parse($latest_publication->date)->format('d') }}</span>
                                  @if ('ka' == app()->getLocale())
                              <span>{{ \Carbon\Carbon::parse($latest_publication->date)->translatedFormat('M') }}</span>
                              @else
                               <span>{{ \Carbon\Carbon::parse($latest_publication->date)->translatedFormat('F') }}</span>
                            @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>
</section>

@endsection