<div class="header1">
    <div class="container header1_cont">
        @if (settings('email_for_header') != '')
            <div class="header1_div1">
                <a href="mailto:{{ settings('email_for_header') }}">{{ trans('website.Mail') }}:
                    {{ settings('email_for_header') }}</a>
            </div>
        @endif
        <div class="header1_div2">
            @if (settings('facebook') != '')
                <a href="{{ settings('facebook') }}" target="blank">
                    <span class="icon-Path-171"></span>
                </a>
            @endif
            @if (settings('twitter') != '')
                <a href="{{ settings('twitter') }}" target="blank">
                    <span class="icon-Path-172"></span>
                </a>
            @endif
            @if (settings('instagram') != '')
                <a href="{{ settings('instagram') }}" target="blank">
                    <span class="icon-Path-173"></span>
                </a>
            @endif
        </div>
        <div class="header1_div3">
        @foreach (config('app.locales') as $k => $value)
                
                @if($value == 'ka')
                <span> <a href="@if (isset($language_slugs) && is_array($language_slugs)) {{ asset($language_slugs[$value]) }} @else {{ $value }} @endif">{{__('website.ka')}}</a></span>
               
                @endif
                
                @if ($value != app()->getLocale())
                <a href="@if (isset($language_slugs) && is_array($language_slugs)) {{ asset($language_slugs[$value]) }} @else {{ $value }} @endif"
                        class="medium green text-lg">
                        @if($value == 'en')
                         <span class="lang-toggle"></span>
                         @elseif($value == 'ka')
                         <span class="lang-button lang-toggle"></span>
                         @endif
                            <!-- <input type="checkbox"> -->
                        </a>
                @endif
                @if($value == 'en')
                <span> <a href="@if (isset($language_slugs) && is_array($language_slugs)) {{ asset($language_slugs[$value]) }} @else {{ $value }} @endif">{{__('website.en')}}</a></span>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="container header2">
    @if(isset($model))
    <div class="header-img">
        {{-- {{ dd(settings('coalition_logo')) }} --}}
        <a href="{{ URL::to('/') }}/{{app()->getLocale()}}">
            <img src="{{ settings('coalition_logo')['url'] }} " alt="{{ $model->translate(app()->getlocale())->title }}">
        </a>
    </div>
    @else
    <div class="header-img">
        {{-- {{ dd(settings('coalition_logo')) }} --}}
        <a href="{{ URL::to('/') }}/{{app()->getLocale()}}">
            <img src="{{ settings('coalition_logo')['url'] }} " alt="{{ settings('coalition_logo')['name'] }}">
        </a>
    </div>
    @endif
    <div class="menu">
        @if (isset($sections) && count($sections) > 0)
                @foreach ($sections as $section)

                <div class="menu-div  @if($language_slugs[app()->getLocale()] == $section->getFullSlug()) activediv @endif ">
                    <a class="menu-link" href="/{{ $section->getFullSlug() }}" @if($section->type_id == 8) style="color:#da6903" @endif>{{ $section->translate(app()->getlocale())->title }}</a>
                    @if ($section->children->count() > 0)
                        <div class="sub-menu">
                            <div class="sub-menu_list">
                                @foreach ($section->children as $subSec) 
                                <a href="/{{ $subSec->getFullSlug() }}">{{ $subSec->translate(app()->getlocale())->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                @endforeach
        @endif
    </div>
    <div class="search">
        
        <form action="/{{app()->getlocale()}}/search" method="get" class="search">
        <input type="text" placeholder="{{ trans('website.search') }}" name="que" required>
        <button> <span class="icon-Group-9991"></span></button>
    </form>
    </div>
    <div class="burger">
        <span class="burger-icon1"></span>
        <span class="burger-icon2"></span>
        <span class="burger-icon3"></span>
    </div>
</div>
