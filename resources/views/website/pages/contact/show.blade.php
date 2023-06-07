@extends('website.master')

@section('main')
@if(isset($model->translate(app()->getlocale())->locale_additional['cover']))
<section> 
    <div class="about-banner">
        <img src="{{image($model->translate(app()->getlocale())->locale_additional['cover'])}}" alt="{{$model->translate(app()->getlocale())->locale_additional['alt_text'] }}" >
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
                                                                                                              @if(Session::has('message'))
     <div class="success-sbmission">
        <div class="success-sbmission-background"></div>
        <div class="success-sbmission-text">
           {{__('website.Send_Alert_Text') }}
        </div>
    </div>
                                     @endif
<section class="contact-container">
    <div class="container">
        <div class="contact">
            <div class="contact-cont1">
                <div class="contact-display-none">
                    <div class="contact-title">
                        <span>{{$model->translate(app()->getlocale())->title}}</span>
                    </div>
                    <div class="contact-text">{!! $model->translate(app()->getlocale())->desc !!} </div>
                </div>
               <form action="/{{ app()->getLocale()}}/contactsubmission" method="POST" onsubmit="return submitUserForm();">
    @csrf
                
    <div class="contact-form">
        <!-- Existing form inputs -->

        <div class="cont-inputs" id="recaptcha-form">
            <label class="star" for="cont-name">{{ trans('website.full_name') }}</label>
            <input id="cont-name" type="text" name="name" required >
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <input type="hidden" name="section_type_id" value="{{$model->type_id}}">
        </div>
        <div class="cont-inputs">
            <label class="star" for="cont-mail">{{ trans('website.Mail') }}</label>
            <input id="cont-mail" type="text"  name="email" required >
        </div>
        <div class="cont-inputs cont-input2">
            <label for="cont-sub">{{ trans('website.subject') }}</label>
            <input id="cont-sub" type="text"  name="subject">
        </div>
        <div class="cont-inputs cont-input2">
            <label for="cont-text">{{ trans('website.text') }}</label>
            <textarea name="text" id="cont-text" cols="30" rows="10"></textarea>
        </div>

       <div class="g-recaptcha" data-sitekey="6LcRYEwmAAAAAP2hLhFwqgbfXW0ekUeohEfseP91" data-callback="verifyCaptcha"></div>
    
 		 <div id="g-recaptcha-error"></div>
      
        <div class="cont-inputs cont-input2 cont-button">
            <button  id="submit-button" type="submit" >{{ trans('website.Send_Button') }}</button>
        </div>
    </div>
        
    <script>
function submitUserForm() {
    var response = grecaptcha.getResponse();
    if(response.length == 0) {
        document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">reCAPTCHA is not valid; Please try again!</span>';
        return false;
    }
    return true;
}
 
function verifyCaptcha() {
    document.getElementById('g-recaptcha-error').innerHTML = '';
}
</script>
</form>
          
            </div>

            <div class="contact-cont2">
                <h4>{{ trans('website.Contact_info') }}</h4>
                <a href="mailto:{{ $post->email }}">
                    <span class="icon-Vector-3"></span>
                    <span>{{$post->email}}</span>
                </a>
                <a href="tel:{{ $post->email }}">
                    <span class="icon-Vector-4"></span>
                    <span>{{$post->phone}}</span>
                </a>
                <a href="http://maps.google.com/?q={{$post->translate(app()->getlocale())->adress}}" target="blank">
                    <span class="Group_10095">
                        <img src="/uploads/img/Group_10095.png" alt="">
                    </span>
                    <span>{{$post->translate(app()->getlocale())->adress}}</span>
                </a>
            </div>
        </div>
    </div>
</section>


@endsection