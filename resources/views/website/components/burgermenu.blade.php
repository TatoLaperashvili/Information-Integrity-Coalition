<section class="burger-menu">
    <div class="burger-div">
       <div class="search">
        
        <form action="/{{app()->getlocale()}}/search" method="get" class="search">
        <input type="text" placeholder="{{ trans('website.search') }}" name="que" required>
        <button> <span class="icon-Group-9991"></span></button>
    </form>
    </div>
        <div class="burger-nav">
            @if (isset($sections) && count($sections) > 0)
            @foreach ($sections as $section)
            <div class="burger-nav_cont @if($language_slugs[app()->getLocale()] == $section->getFullSlug()) activediv @endif ">
                <a class="burger-nav_link" href="/{{ $section->getFullSlug() }}">{{ $section->translate(app()->getlocale())->title }} </a> 
              @if ($section->children->count() > 0)
                 
                 <span id="burgerarrov" class="icon-material-symbols_arrow-back-ios-new-rounded burgerarrov"></span>
                 @endif
                @if ($section->children->count() > 0)
                <div class="burger-nav_submenu">
                    <div>
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

    </div>
</section>