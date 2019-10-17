<header class="navbar navbar-header navbar-header-fixed">
     <a href="#" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>

     @include('laraboi.partials.navbar')

     <div class="navbar-right">
          @auth
          @include('laraboi.components._header-notification')
          @include('laraboi.components._header-profile')
          @else
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          @endauth
     </div>

</header>