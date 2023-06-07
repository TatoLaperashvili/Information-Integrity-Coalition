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
            <a href=""/{{ $breadcrumb['url'] }}"><span class="icon-material-symbols_arrow-right-alt-rounded"></span>
                {{ $breadcrumb['name'] }}</a>
        </div>
        @endforeach
    </div>
</section>
@endif
<section class="container">
    <div class="update-table_title">
        <span class="update-tables_title">{{$model->translate(app()->getlocale())->title}}</span>
    </div>
    <div class="update-tables">
        
        @if(isset($posts) && (count($posts) > 0))
        @foreach ($posts as $post)
        <div class="update-tables_table">
            <a href="/{{$post->getfullslug()}}">
                <div class="update-table_img">
                  @foreach ($post->files as $image)
                    <img src="{{ image($image->file) }}" alt="{{ $image['file_additional'][app()->getlocale()] }}">
                  @endforeach
                </div>
                <div class="update-table_info">
                    <div class="update-table_info1"> {{ str_limit($post->translate(app()->getlocale())->desc, 75 , '...') }}</div>
                    <div class="latest-updates_date">
                         <span>{{ \Carbon\Carbon::parse($post->date)->translatedFormat('d') }}</span>
                      @if ('ka' == app()->getLocale())
                        <span>{{ \Carbon\Carbon::parse($post->date)->translatedFormat('M') }}</span>
                      	@else
                      	 <span>{{ \Carbon\Carbon::parse($post->date)->translatedFormat('F') }}</span>
                      @endif
                       
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @endif
    </div>
</section>

{{ $posts->links('website.components.pagination') }}

@endsection