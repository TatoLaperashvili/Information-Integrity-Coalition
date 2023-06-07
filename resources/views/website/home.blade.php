@extends('website.master')

@section('main')
    <section class="main_slider">
        <div class="main-slider">
            @if (isset($mainBanner))
                @foreach ($mainBanner as $banner)
                    <div class="main-slide">
                        <a href="{{ $banner->translate()->locale_additional['Redirect_link'] }}" target="_blank">
                            <img src="{{ image($banner->translate(app()->getlocale())->image) }}" alt="{{ $banner->translate(app()->getlocale())['locale_additional']['alt_text'] }}">
                            <div class="main-slider__text">
                                <div class="container">
                                    <div>{{ $banner->translate(app()->getlocale())->desc }}</div>
                                    <button>{!! $banner->translate()->locale_additional['button'] !!}</button>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
    <section class="container">
        <div class="main-update_info">
            @if (isset($updates_posts) && count($updates_posts) > 0)
                <div class="main-update_contain">
                    <div class="main-update_info-title">

                        <span>{{ __('website.Home_Page_Updates') }}</span>

                        <span>
                            <a href="/{{ $updates->getFullSlug() }}">{{ __('website.See_All') }}</a>
                        </span>
                    </div>

                    <div class="main-update_table">


                        @foreach ($updates_posts as $post)
                        
                            <div class="main-update_div">
                                <a href="/{{ $post->getFullSlug() }}">
                                    <div class="main-update_div-img">
                                        @foreach($post->files as $file)
                                        <img src="{{ image($post->thumb) }}" alt="{{$file['file_additional'][app()->getlocale()]}}">
                                        @endforeach
                                    </div>
                                    <div class="main-update_div-title">
                                      @if(app()->getlocale() == 'ka')
                                        <div>  {{ str_limit($post->translate(app()->getlocale())->desc, 75 , '...') }} </div>
                                      @else
                                       <div>  {{ str_limit($post->translate(app()->getlocale())->desc, 90 , '...') }} </div>
                                      @endif
                                        <div class="main-update_div-date">
                                            <span class="date-span">{!! getDates($post->date) !!}</span>
                                          
                                           
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif
            @if (isset($sidebanners))
                <div class="useful-info_contain">
                    <span class="useful-info_table-title">{{ __('website.Home_Page_Useful_info') }}</span>

                    <div class="useful-info_table">
                        @foreach ($sidebanners as $sidebanner)
                            @if (image($sidebanner->translate(app()->getlocale())->image) != '')
                                <div class="useful-info_div">
                                    <a href="{{ $sidebanner->translate(app()->getlocale())->link }}">
                                        <div class="useful-info_div-img">
                                            <img src="{{ image($sidebanner->translate(app()->getlocale())->image) }}"
                                            alt="{{$banner->translate(app()->getlocale())->locale_additional['alt_text']}}">
                                        </div>
                                        <div class="useful-info_div-title">
                                            <span>{{ $sidebanner->translate(app()->getlocale())->title }}</span>
                                            <span>{{ $sidebanner->translate(app()->getlocale())->desc }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    <section class="gradient">

        <div class="container main-info">

            @if (isset($disinfo_posts) && count($disinfo_posts) > 0)
                <div class="eudisinfo-table">
                    <div class="main-update_info-title2">
                        <span>
                            <a href="{{ settings('eu_vs_disinfo_logo_link') }}" target="blank">
                                <img src="{{ asset(config('config.icon_path') . settings('eu_vs_disinfo_logo')) }}"
                                    alt="">
                            </a>
                        </span>
                        <span>
                            <a href="/{{ $disinfo->getFullSlug() }}">{{ __('website.See_All') }}</a>
                        </span>
                    </div>
                    <div class="eudisinfo-table2">
                        @foreach ($disinfo_posts as $key => $post)
                            @if ($key == 0)
                                <div class="eudisinfo-div1">
                                    <a href="/{{ $post->getFullSlug() }}">
                                        <div class="eudisinfo-div2-title">
                                            <div>
                                                <span>
                                                    {{ \Carbon\Carbon::parse($post->date)->format('d') }}
                                                    {{ \Carbon\Carbon::parse($post->date)->translatedFormat('M') }}
                                                </span>
                                            </div>
                                            <div> {{ str_limit($post->translate(app()->getlocale())->desc, 60 , '...') }}</div>
                                        </div>
                                        <div class="eudisinfo-div1-img">
                                            @foreach($post->files as $file)
                                            <img src="{{ image($post->thumb) }}" alt="{{$file['file_additional'][app()->getlocale()]}}">
                                            @endforeach
                                            
                                        </div>
                                        <div class="eudisinfo-div1-title">
                                            <span>{{ str_limit($post->translate(app()->getlocale())->desc, 80 , '...') }}</span>
                                            <span>{{ \Carbon\Carbon::parse($post->date)->translatedFormat('d F') }}</span>
                                        </div>
                                    </a>
                                </div>
                            @else
                                <div class="eudisinfo-div2">
                                    <a href="#">
                                        <div class="eudisinfo-div2-title">
                                            <div>
                                            <span>
                                                {{ \Carbon\Carbon::parse($post->date)->translatedFormat('d F') }}
                                            </span>
                                            </div>
                                            <div>{{ $post->translate(app()->getLocale())->desc }}</div>
                                        </div>
                                        <div class="eudisinfo-div2-img">
                                            @foreach($post->files as $file)
                                            <img src="{{ image($post->thumb) }}" alt="{{$file['file_additional'][app()->getlocale()]}}">
                                            @endforeach
                                           
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            @endif
          @if(app()->getlocale() == 'ka')
            <div class="facebook-frame">
                <div class="facebook-header">
                    <span class="icon-Path-171"></span>
                    <span>Facebook</span>
                </div>
                <div id="facebook" class="facebook">
                 <iframe id="IFRAMEID" src="{{ settings('facebook_Plugin') }}" frameborder="0"></iframe>
                </div>
            </div>
          @else
          <div class="facebook-frame">
                
                <div class="twitter-header">
                    <span class="icon-Path-172"></span>
                    <span>Twitter</span>
                </div>
                <div id="facebook" class="facebook">
               
                 <a class="twitter-timeline" data-width="500" data-height="650" href="https://twitter.com/infointegrityco?ref_src=twsrc%5Etfw">Tweets by infointegrityco</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
          @endif
        </div>
    </section>

    @if (isset($about_posts))
        <section class="container">
            <div class="disclaimer-div">
                <div class="disclaimer-title">
                    <a href="/{{ $about_posts->getFullSlug() }}">
                        {{ $about_posts->translate(app()->getlocale())->title }}</a>
                </div>
                <div class="disclaimer-text">
                    {{ $about_posts->translate(app()->getlocale())->desc }}
                </div>
            </div>
        </section>


        <section class="partner-section">
            <div class="container">
                <div class="partner-slider">
                    @foreach ($partners_banner as $partner)

                       @if (isset($about_posts->coalition_banner) && in_array($partner->id, $about_posts->coalition_banner))
                            <div class="partner-slider-div">
                                <a  href=" {{ $partner->translate(app()->getlocale())->Link }}" class="@if (isset($partner->translate(app()->getlocale())->Link)) clicked @endif" target="blank">
                                    <img src="{{ image($partner->thumb) }}" alt="img">
                                </a>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </section>
    @endif
@endsection
