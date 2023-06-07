<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}">


<head>
	@include('website.components.head')
</head>

<body>
  <div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0" nonce="EGiVGmyh"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-L83RTCD2FS"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
   
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-L83RTCD2FS');
</script>
{{-- @include('website.cookie-consent.index') --}}
	<header>
		@include('website.components.header')
		@include('website.components.burgermenu')
	</header>

	
	@yield('main')
  
	@include('website.components.disclaimer_banner')
	@include('website.components.footer')
	@include('website.components.scripts')
	@yield('scripts')
	<!--end::Page Scripts-->

		<!-- Go to www.addthis.com/dashboard to customize your tools --> 
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-63fdeb2a80d380cd"></script>
</body>
<!--end::Body-->

</html>
