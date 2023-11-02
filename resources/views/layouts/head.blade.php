@php
  $metadataTitle = '';
  $metadataDescription = '';
  $metadataKeyword = '';
  $metadataImage = asset('assets/images/logo.png');

  if (isset($metadata) && isset($metadata->title)) {
    $metadataTitle = $metadata->title;
    if (request()->get('page')) {
      $metadataTitle .= " " . request()->get('page');
    }
  } else {
    $metadataTitle = isset($composer_system['website_title']) ? $composer_system['website_title'][$composer_locale] : '';
  }

  if (isset($metadata) && isset($metadata->description)) {
    $metadataDescription = $metadata->description;
    if (request()->get('page')) {
      $metadataDescription .= " " . request()->get('page');
    }
  } else {
    $metadataDescription = isset($composer_system['website_description']) ? $composer_system['website_description'][$composer_locale] : '';
  }

  if (isset($metadata) && isset($metadata->key_word)) {
    $metadataKeyword = $metadata->key_word;
    if (request()->get('page')) {
      $metadataKeyword .= " " . request()->get('page');
    }
  } else {
    $metadataKeyword = isset($composer_system['website_keywords']) ? $composer_system['website_keywords'][$composer_locale] : '';
  }

  if (isset($metadata) && isset($metadata->image)) {
    $metadataImage = $metadata->image;
  }
@endphp

<title>{{ $metadataTitle }} | {{ config('app.name') }}</title>
<meta name="description" content="{{ $metadataDescription }}">
<meta name="keywords" content="{{ $metadataKeyword }}">
<meta property="og:title" content="{{ $metadataTitle }}">
<meta property="og:description" content="{{ $metadataDescription }}">
<meta property="og:image" content="{{ $metadataImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:url" content="{{ request()->fullUrl() }}">
<meta property="og:site_name" content="{{ env('APP_URL') }}">
<meta property="og:type" content="website">
<meta name="twitter:title" content="{{ $metadataTitle }}">
<meta name="twitter:description" content="{{ $metadataDescription }}">
<meta property="twitter:image" content="{{ $metadataImage }}">
<meta name="twitter:card" content="summary_large_image">
<meta property="fb:app_id" content="">
<meta name="twitter:site" content="">
<link rel="canonical" href="{{ request()->fullUrl() }}"/>

<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}" />
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('apple-touch-icon-57x57.png') }}" />
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('apple-touch-icon-72x72.png') }}" />
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('apple-touch-icon-76x76.png') }}" />
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('apple-touch-icon-114x114.png') }}" />
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('apple-touch-icon-120x120.png') }}" />
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('apple-touch-icon-144x144.png') }}" />
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('apple-touch-icon-152x152.png') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon-180x180.png') }}" />
