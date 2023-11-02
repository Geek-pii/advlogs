<div class="header-wrapper wrapper sticky">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="logo-wrapper" data-aos="slide-right">
          <a href="{{ route('page.home') }}">
            <picture>
              <source id="s1" srcset="{{ $composer_system['logo'] ?? asset('assets/images/fallback/logo.webp') }}" alt="{{ config('app.name') }}" type="image/webp">
                <img src="{{ $composer_system['logo'] ?? asset('assets/images/logo.png') }}" alt="{{ config('app.name') }}">
          </picture>
          </a>
        </div>
      </div>
      <div class="col-md-9">
        <div class="header-navigation-wrapper" data-aos="slide-left">
          <ul>
            @foreach($menu_header as $menu)
            <li> <a href="{{ getUrlHtmlItem($menu->type, $menu->id) }}" target="{{ $menu->target }}" {!! $menu->class !!}>{!! $menu->title !!}</a> </li>
            @endforeach
            @if (!auth('account')->check())
            <li> <a href="{{ url('login')}}"> <img src="{{ asset('assets/images/button-icon1.png') }}" alt="icon">Login </a> </li>
            <li> <a href="{{ url('sign-up?type=none')}}"> <img src="{{ asset('assets/images/button-icon2.png') }}" alt="icon"> Signup </a> </li>
            @else
            <li><a href="{{ route('account.login-out.get') }}"> <img src="{{ asset('assets/images/button-icon1.png') }}" alt="icon">Logout </a></li>
            @endif
          </ul>
        </div>
        <div class="menusitebar-main-wrapper">
          <input type="checkbox" class="check" id="checked">
          <label class="menu-btn" for="checked"> <span class="bar top"></span> <span class="bar middle"></span> <span class="bar bottom"></span> </label>
          <label class="close-menu" for="checked"></label>
          <nav class="drawer-menu">
            <ul>
              @foreach($menu_header as $menu)
                <li> <a href="{{ getUrlHtmlItem($menu->type, $menu->id) }}" target="{{ $menu->target }}" {!! $menu->class !!}>{!! $menu->title !!}</a> </li>
              @endforeach
              @if (!auth('account')->check())
              <li> <a href="{{ config('app.url') . '/' . 'login' }}"> <img src="{{ asset('assets/images/button-icon1.png') }}" alt="icon">Login </a> </li>
              <li> <a href="{{ config('app.url') . '/' . 'sign-up?type=none' }}"> <img src="{{ asset('assets/images/button-icon2.png') }}" alt="icon"> Signup </a> </li>
              @else 
              <li><a href="{{ route('user.dashboard') }}"> <img src="{{ asset('assets/images/button-icon1.png') }}" alt="icon">Dashboard </a></li>
              <li><a href="{{ route('account.login-out.get') }}"> <img src="{{ asset('assets/images/button-icon1.png') }}" alt="icon">Logout </a></li>
              @endif
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
