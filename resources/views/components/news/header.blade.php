<header class="border-bottom lh-1 py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="link-secondary" href="#">Subscribe</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">FREE_HUMANITY</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">

        @guest
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">Sign up</a>
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Sign in</a>
        @endguest

        @auth
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('account.logout') }}">Log out</a>
        @endauth

        @if(Auth::user()->isAdmin === true)
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.index') }}">A panel</a>
    @endif

      </div>
    </div>
  </header>
