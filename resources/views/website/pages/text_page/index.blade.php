@extends('website.master')
@section('main')

<main>

    <div class="scroll-top-button">
        
    </div>

  @if(isset($model->translate(app()->getlocale())->locale_additional['cover'] ))
<section>
    <div class="about-banner">
        <img src="{{ image($model->translate(app()->getlocale())->locale_additional['cover'] )}}" alt="{{$model->translate(app()->getlocale())->locale_additional['alt_text'] }}" >
    </div>
</section>
@else
<div class="banner-margin"></div>
@endif
    <section>
        <div class="container">
            @foreach ($breadcrumbs as $breadcrumb)
            <div class="brc-cont">
                <a href="/{{app()->getlocale()}}">{{ trans('website.home') }}</a>
                <span> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="10.07" height="17.14" viewBox="0 0 10.07 17.14">
                        <g id="right-arrow_1_" data-name="right-arrow (1)" transform="translate(-101.478)">
                        <g id="Group_213" data-name="Group 213" transform="translate(101.478)">
                            <path id="Path_140" data-name="Path 140" d="M111.274,7.9,103.647.274a.94.94,0,0,0-1.326,0l-.562.562a.939.939,0,0,0,0,1.326l6.405,6.405-6.412,6.412a.94.94,0,0,0,0,1.326l.562.561a.94.94,0,0,0,1.326,0l7.635-7.635a.946.946,0,0,0,0-1.331Z" transform="translate(-101.478 0)" fill="#29607e"/>
                        </g>
                        </g>
                    </svg> 
                </span>
                <a href="/{{ $breadcrumb['url'] }}" class="brc-active">{{ $breadcrumb['name'] }}</a>
            </div>
            @endforeach
        </div> 
    </section>

    <section>
        <div class="about-page-text-side">
            <div class="important-title">
                <img src="/website/assets/img/title-img.png" alt="title-img">
                <h1>{{ $model->translate(app()->getlocale())->title }}</h1>
            </div>
            <div class="container">
                <div class="about-content-text">
                 {!! $post->translate(app()->getlocale())->text !!}
                </div>
            </div>
        </div>
        <div class="home-about-us-section">
            <div class="about-us-home">
                <div class="container">
                    <div class="about-relatve-cont">
                        <div class="left-about-box">
                            <div class="important-title about-section-title about-page-title">
                                <img src="/website/assets/img/title-img.png" alt="title-img">
                                <h1>ჩვენ შესახებ</h1>
                            </div>
                            <div class="__about-left-image-box">
                                <a href="/website/assets/img/about1.png" data-fancybox="about-gall">
                                    <img src="/website/assets/img/about1.png" alt="about"> 
                                </a> 
                            </div>
                        </div> 
                        <div class="right-about-box">
                            <div class="right-about-image">
                                <a href="/website/assets/img/about2.png" data-fancybox="about-gall">
                                    <img src="/website/assets/img/about2.png" alt="about2"> 
                                </a>  
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="vacancy-section" style="background-image: url(/website/assets/img/vacancy-background.png)"> 
            <div class="vacancy-blur"></div>
            <div class="vacancy-cont">
                <div class="container">
                    <div class="row row_resp_vacancy">
                        <div class="col-lg-6 col-md-6   col-12">
                            <div class="vacancy-box">
                                <div class="important-title vacancy-title">
                                    <img src="/website/assets/img/title-img.png" alt="title-img">
                                   
           
                                    <h1>{{ $vacancy->translate(app()->getlocale())->title  }}</h1>
                                   
                                </div>
                             
                                <div class="vacancy-type-list">
                                    @foreach($vacancy->posts as $post)
                                    @php
                                    $count = 0; 
                                @endphp
                                   
                                    @if($post->populars == 0 && $count < 4)
                                   
                                    <a href="/{{ $post->getFullSlug() }}" class="vacancy-item">
                                        <div class="icon-vacancy">
                                            <img src="/website/assets/img/vac-0000.svg" alt="icon">
                                        </div>
                                        <span>
                                            {{$post->translate(app()->getlocale())->title}}
                                        </span>
                                    </a>
                                    @endif
                                   
                                   
                                    @endforeach
                                  
                                </div>
                            </div>
                            <div class="see-all-link resp-link-show">
                                <a href="/{{ $vacancy->getFullSlug() }}">
                                    {{ __('website.See_All') }}
                                </a>
                            </div>
                        </div>
                       
                        <div class="col-lg-6 col-md-6 col-sm-7 col-12 pos-rel">
                            @if(isset($popular_vacancy) && $popular_vacancy != '')
                            
                            <div class="vacancy-right-box">
                                <div class="vacancy-right-img">
                                    <img src="{{ image($popular_vacancy->thumb) }}" alt="vacancy-img">
                                    <div class="vacancy-time-box">
                                        {{ $popular_vacancy->start_date }} - {{ $popular_vacancy->end_date }}
                                    </div>
                                </div>
                                <div class="vacancy-context">
                                    <h1>{{ $popular_vacancy->translate(app()->getlocale())->title }}</h1>
                                    <div class="text">
                                        {!!$popular_vacancy->translate(app()->getlocale())->desc   !!}
                                    </div>
                                    <ul class="vacancy-ul ">

                                        <div class="vacancy-li">

                                            <span class="icon-placeholder"></span>

                                            <a>{{ $popular_vacancy->translate(app()->getlocale())->adress }} </a>

                                        </div>

                                        <div class="vacancy-li">

                                            <span class="icon-money"></span>

                                            <a>{{ $popular_vacancy->translate(app()->getlocale())->workin_hours }}</a>

                                        </div>

                                        <div class="vacancy-li">

                                            <span class="icon-clock"></span>

                                            <a>{{ $popular_vacancy->translate(app()->getlocale())->position }}</a>

                                        </div>

                                        <div class="vacancy-li">

                                            <span class="icon-graduation-cap"></span>

                                            <a>{{ $popular_vacancy->translate(app()->getlocale())->daily_pay }}</a>

                                        </div>

                                        <div class="vacancy-li">

                                            <span class="icon-office-chair"></span>

                                            <a>{{ $popular_vacancy->translate(app()->getlocale())->Vacant_place }}</a>

                                        </div>

                                        </ul>
                                    <div class="vacancy-dots">
                                        <a href="/{{ $popular_vacancy->getFullSlug() }}">
                                            <img src="/website/assets/img/blue-dots.png" alt="dots">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="vacancy-right-box">
                                <div class="vacancy-right-img">
                                    <img src="{{ image($vacancy->posts[0]->thumb) }}" alt="vacancy-img">
                                    <div class="vacancy-time-box">
                                        {{ $vacancy->posts[0]->start_date }} - {{ $vacancy->posts[0]->end_date }}
                                    </div>
                                </div>
                                <div class="vacancy-context">
                                    <h1>{{ $vacancy->posts[0]->translate(app()->getlocale())->title }}</h1>
                                    <div class="text">
                                        {!!$vacancy->posts[0]->translate(app()->getlocale())->desc   !!}
                                    </div>
                                    <ul class="vacancy-ul">
                                        <div class="vacancy-li">
                                            <span class="icon-placeholder"></span>
                                            <a href="#">{{ $vacancy->posts[0]->translate(app()->getlocale())->adress }} </a>
                                        </div>
                                        <div class="vacancy-li">
                                            <span class="icon-money"></span>
                                            <a href="#">{{ $vacancy->posts[0]->translate(app()->getlocale())->daily_pay }}</a>
                                        </div>
                                        <div class="vacancy-li">
                                            <span class="icon-clock"></span>
                                            <a href="#">{{ $vacancy->posts[0]->translate(app()->getlocale())->wirkin_hours }}</a>
                                        </div>
                                        <div class="vacancy-li">
                                            <span class="icon-graduation-cap"></span>
                                            <a href="#">{{ $vacancy->posts[0]->translate(app()->getlocale())->vacant_place }}</a>
                                        </div>
                                        <div class="vacancy-li">
                                            <span class="icon-office-chair"></span>
                                            <a href="#">{{ $vacancy->posts[0]->translate(app()->getlocale())->position }} (Kassierer/in)</a>
                                        </div>
                                    </ul>
                                    <div class="vacancy-dots">
                                        <a href="/{{ $vacancy->posts[0]->getFullSlug() }}">
                                            <img src="/website/assets/img/blue-dots.png" alt="dots">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif
                         
                           
                            <div class="see-all-link">
                                <a href="/{{ $vacancy->getFullSlug() }}">
                                    {{ __('website.See_All') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </section>
   </main>

    @endsection