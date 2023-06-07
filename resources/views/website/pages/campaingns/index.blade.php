@extends('website.master')
@section('main')

@if(isset($model->translate(app()->getlocale())->locale_additional['cover'] ))
<section>
    <div class="about-banner">
        <img src="{{ image($model->translate(app()->getlocale())->locale_additional['cover'] )}}" alt="{{$model->translate(app()->getlocale())->locale_additional['alt_text']}}">
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
    <div class="compaigns-table">
        
        @if(isset($posts) && (count($posts) > 0))
        @foreach ($posts as $post)
        <div class="campaign-border">
            <div class="campaign-main">
                <a href="/{{$post->getfullslug()}}">
                    <div class="campaign-title">{{ $post->translate(app()->getlocale())->title }}</div>
                    <div class="campaign-img">
                        @foreach($post->files as $file)
                        <img src="{{ image($post->thumb) }}" alt="{{$file['file_additional'][app()->getlocale()]}}">
                        @endforeach
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</section>


{{ $posts->links('website.components.pagination') }}

@endsection