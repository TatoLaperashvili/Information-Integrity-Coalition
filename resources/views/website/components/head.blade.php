

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@if(isset($model) && $model->type_id == 1)
    <title>{{ __('admin.Information_integrity_coalition') }}</title>
@elseif(isset($model[app()->getLocale()]->title))
    <title>{{ $model[app()->getLocale()]->title }}</title>
@endif

<link href="https://free.bboxtype.com/embedfonts/?family=FiraGO:400,500,600,700" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Quicksand:wght@400;500;600;700&display=swap"
    rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('uploads/icons/logo.png')}}">

<link rel="stylesheet" href="/assets/images/svg/icomoon-v1.0 (9)/icomoon-v1.0 (9)/style.css">
<link rel="stylesheet" href="/assets/styles/styles.css">
<link rel="stylesheet" href="/assets/styles/responsivestyle.css">
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<script async src="https://static.addtoany.com/menu/page.js"></script>
