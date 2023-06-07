<footer>

    <div class="footer">
        <div class="container">
            <div class="footer1">
                <div class="footer-div footer11">
                    
        <a href="{{ URL::to('/') }}/{{app()->getLocale()}}">
            <img src="{{ settings('coalition_logo')['url']}} " alt="img">
        </a>
                </div>
                <div class="footer-div footer22">
                    <span>{{ __('website.Footer_quick_links') }}</span>
                    <div class="footer-links">
                        @foreach ($footerSections as $footerSection)
                        <a href="/{{$footerSection->getFullSlug()}}">{{$footerSection->translate(app()->getlocale())->title}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="footer-div footer3">
                    <span>{{ __('website.Footer_Contact_information') }}</span>
                    <div class="footer-info">
                        @if (settings('contact_address') !='')
                        <a href="http://maps.google.com/?q={{ settings('contact_address') }}" target="blank">{{settings('contact_address')}}</a>
                        @endif

                        @if(settings('contact_phone') !='')
                        <a href="tel:{{ settings('contact_phone') }}">{{__('website.Phone')}}:
                            {{ settings('contact_phone') }}</a>
                        @endif

                        @if (settings('email_for_header') != '')
                         <a href="mailto:{{ settings('email_for_header') }}">{{ trans('website.Mail') }}:
                            {{ settings('email_for_header') }}</a>

                        @endif

                    </div>


                </div>
                <div class="footer-div footer4">
                    <span>{{ __('website.Footer_Follow_on_Social_Media') }}</span>
                    <div class="footer-icon">
                        @if(settings('facebook') !='')
                        <a href="{{ settings('facebook') }}" target="blank">
                            <span class="icon-Path-171"></span>
                        </a>
                        @endif
                        @if(settings('twitter') !='')
                        <a href="{{ settings('twitter') }}" target="blank">
                            <span class="icon-Path-172"></span>
                        </a>
                        @endif
                        @if(settings('instagram') != '')
                        <a href="{{ settings('instagram') }}" target="blank">
                            <span class="icon-Path-173"></span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container footer2">
        <div class="cookies">

            @foreach ($underfootermenu as $underfooterSection)
            <a href="/{{$underfooterSection->getFullSlug()}}">{{$underfooterSection->translate(app()->getlocale())->title}}</a>
            @endforeach
        </div>
        <div class="ideadesigne">
            <a href="https://ideadesigngroup.ge/ka" target="blank">{{__('admin.MADE_BY_IDEA') }}</a>
        </div>
    </div>

</footer>