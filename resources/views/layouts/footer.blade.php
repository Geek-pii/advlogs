<div class="footer-wrapper mt-4">
  <div class="container">
    <div class="footer-logo-wrapper">
      <img src="{{ $composer_system['logo'] ?? asset('assets/images/logo.png') }}" alt="{{ config('app.name') }}">
    </div>
    
    <div class="listing-contact-footer">
      <ul class="row">
        <li class="col-md-4 col-sm-4 col-xs-12">
          <div class="footer-address-main-wrp">
            <img src="{{ asset('assets/images/footericon1.png') }}" alt="footer-icon">
            <span>{!! $composer_system['address'] ?? 'Address Here' !!}</span>
          </div>
        </li>
        <li class="col-md-4 col-sm-4 col-xs-12">
          <div class="footer-address-main-wrp">
            <img src="{{ asset('assets/images/footericon2.png') }}" alt="footer-icon">
            <span>{!! $composer_system['phone'] ?? 'Phone Here' !!}</span>
          </div>
        </li>
        <li class="col-md-4 col-sm-4 col-xs-12">
          <div class="footer-address-main-wrp">
            <img src="{{ asset('assets/images/footericon3.png') }}" alt="footer-icon">
            <span> <a href="{{ url('contact-us') }}">Click Here to send<br> us an email</a></span>
            {{-- <span> <a href="mailto:{!! $composer_system['email'] ?? 'email here' !!}">Click Here to send<br> us an email</a></span> --}}
          </div>
        </li>
      </ul>
    </div>
    <div class="footer-navigaiton-wrapper">
      <ul>
        @foreach($menu_footer as $menu)
        <li> <a href="{{ getUrlHtmlItem($menu->type, $menu->id) }}" target="{{ $menu->target }}" {!! $menu->class !!}>{!! $menu->title !!}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
