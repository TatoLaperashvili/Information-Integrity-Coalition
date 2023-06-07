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
                            <a href="/"><span
                                    class="icon-material-symbols_arrow-right-alt-rounded"></span>{{ trans('website.home') }}</a>
                        </div>
                        @foreach ($breadcrumbs as $breadcrumb)
                            <div class="pagepath-title">
                                <a href="/{{ $breadcrumb['url'] }}"><span
                                        class="icon-material-symbols_arrow-right-alt-rounded"></span>
                                    {{ $breadcrumb['name'] }}</a>
                            </div>
                        @endforeach

                    </div>
                @endif
                <div class="update-detail_info">
                    <h2>{{ $post->translate(app()->getlocale())->title }}</h2>
                    <span>{{ \Carbon\Carbon::parse($post->date)->translatedFormat('d F, Y') }}</span>
                    <div class="update-detail_text">{!! $post->translate(app()->getlocale())->text !!}</div>

                    @if (isset($post->start_date) && isset($post->end_date))
                        @if (Carbon\Carbon::now()->gt($post->start_date) &&
                                Carbon\Carbon::now()->lte($post->end_date))
                            <div class="update-registration">
                                <div class="update-registration-img">
                                    <img src="/assets/images/img/logo_for_updates.svg" alt="img">
                                    <span
                                        class="update-registration_date1">{{ trans('website.registration_period') }}</span>
                                </div>
                                <div class="update-registration_date">
                                    <span
                                        class="update-registration_date1">{{ trans('website.registration_period') }}</span>
                                    <div>
                                        <span>{{ \Carbon\Carbon::parse($post->start_date)->translatedFormat('d F, Y') }}</span>
                                        <span>{{ \Carbon\Carbon::parse($post->end_date)->translatedFormat('d F, Y') }}</span>
                                    </div>

                                </div>
                                <div class="update-registration_button">
                                    <button type="submit">{{ trans('website.Registration_Apply_Button') }}</button>
                                </div>
                            </div>
                        @endif
                    @elseif(isset($post->start_date) && !isset($post->end_date))
                        @if (Carbon\Carbon::now()->gt($post->start_date))
                            <div class="update-registration">
                                <div class="update-registration-img">
                                    <img src="/assets/images/img/logo_for_updates.svg" alt="img">
                                    <span
                                        class="update-registration_date1">{{ trans('website.registration_available') }}</span>
                                </div>
                                <div class="update-registration_date">
                                    <span
                                        class="update-registration_date1">{{ trans('website.registration_available') }}</span>

                                </div>
                                <div class="update-registration_button">
                                    <button type="submit">{{ trans('website.Registration_Apply_Button') }}</button>
                                </div>
                            </div>
                        @endif
                    @endif

                    @if (isset($post->files) && count($post->files) > 0)
                        <div class="update-detail_gallery">
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
                                    {{ $updates_post->translate(app()->getlocale())->desc }}
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
                                                                                                            @if(Session::has('update_message'))
     <div class="success-sbmission">
        <div class="success-sbmission-background"></div>
        <div class="success-sbmission-text">
            {{__('website.Send_Alert_Text') }}
        </div>
    </div>
                                     @endif
    <section class="registration">
        
        <div class="registration-form_background"></div>
        <form action="/{{app()->getlocale()}}/updatesubmission" method="POST" onsubmit="return submitUserForm();">
        <div class="registration-form">
            <div class="reg-row1">
                <h3>{{ trans('website.registration_form') }}</h3>
                <div class="reg-x">
                    <span class="icon-Vector-6"></span>
                </div>
            </div>
          
            <div class="registration-grid">
                   
            @csrf
               <input type="hidden" placeholder="Name" name="section_type_id" value="{{$model->type_id}}">
            <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="mandatory-input">
                    <label class="star" for="registration-name">{{ trans('website.full_name') }}</label>
                    <input id="registration-name" type="text" name="name" required>
                    <span class="man-span">It should contain at least one upper-case letter and number.</span>
                </div>
                <div class="mandatory-input">
                    <label class="star" for="registration-email">{{ trans('website.Mail') }}</label>
                    <input id="registration-email" type="email" name="email" required>
                    <span class="man-span">It should contain at least one upper-case letter and number.</span>
                </div>
                <div class="mandatory-input">
                    <label class="star" for="registration-title">{{ trans('website.Registration_Form_Title') }}</label>
                    <input id="registration-title" type="text" name="title" required>
                    <span class="man-span">It should contain at least one upper-case letter and number.</span>
                </div>
                <div class="mandatory-input">
                    <label class="star" for="registration-work">{{ trans('website.Registration_Form_Work_Place') }}</label>
                    <input id="registration-work" type="text" name="work_place" required>
                    <span class="man-span">It should contain at least one upper-case letter and number.</span>
                </div>
                <div class="grid-100">
                    <label for="">{{ trans('website.Registration_Form_Social_Media_Link') }}</label>
                    <input type="text" name="social_media_link">
                </div>
                <div class="grid-100">
                    <label for="">{{ trans('website.Registration_Form_Comment') }}</label>
                    <textarea name="text" id="" cols="30" rows="10"></textarea>
                </div>
               <div class="g-recaptcha" data-sitekey="6LcRYEwmAAAAAP2hLhFwqgbfXW0ekUeohEfseP91" data-callback="verifyCaptcha"></div>
             	<div id="g-recaptcha-error-update"></div>
                <div class="registration-button">
                    <button type="submit" id="submit-button1" >{{ trans('website.Send_Button') }}</button>
                </div>
              <script>
              function submitUserForm() {
                  var response = grecaptcha.getResponse();
                  if(response.length == 0) {
                      document.getElementById('g-recaptcha-error-update').innerHTML = '<span style="color:red;">reCAPTCHA is not valid; Please try again!</span>';
                      return false;
                  }
                  return true;
              }

              function verifyCaptcha() {
                  document.getElementById('g-recaptcha-error-update').innerHTML = '';
              }
              </script>
            </div>
        </div>
           
        <form>
    </section>
@endsection
