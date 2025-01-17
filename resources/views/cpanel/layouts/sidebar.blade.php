<div class="page">
  <header class="header">
    <nav class="navbar">
      <div class="container-fluid">
        <div class="navbar-holder d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <a href="{{ url('/') }}" class="navbar-brand d-none d-sm-inline-block">
              <div class="brand-text d-none d-lg-inline-block"><span>933</span><strong> Co-Working</strong></div>
              <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>933</strong></div></a>
            <a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
          </div>
          <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
            <li class="nav-item" style="line-height: 34px">Hello, {{ Auth::user()->username }}</li>
            <li class="nav-item">
              <a href="{{ url('cpanel/logout') }}" onclick="return confirm('Are you sure do you want to logout?')" class="nav-link logout">
                <span class="d-none d-sm-inline">Logout</span>
                <i class="fa fa-sign-out"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="page-content d-flex align-items-stretch">
    <nav class="side-navbar">
      <ul class="list-unstyled">
        <li class="{{ active('cpanel') }}">
          <a href="{{ url('cpanel') }}">
            <i class="fa fa-home"></i>
            Home
          </a>
        </li>
        <li class="{{ active('cpanel/users*') }}">
          <a href="{{ url('cpanel/users') }}">
            <i class="fa fa-user-circle"></i>
            Users
          </a>
        </li>
        <li class="{{ active('cpanel/articles*') }}">
          <a href="{{ url('cpanel/articles') }}">
            <i class="fa fa-newspaper-o"></i>
            Articles
          </a>
        </li>
        <li class="{{ active('cpanel/authors*') }}">
          <a href="{{ url('cpanel/authors') }}">
            <i class="fa fa-address-book"></i>
            Authors
          </a>
        </li>
        <li class="{{ active('cpanel/services*') }}">
          <a href="{{ url('cpanel/services') }}">
            <i class="fa fa-money"></i>
            Services
          </a>
        </li>
        <li class="{{ active('cpanel/branches*') }}">
          <a href="{{ url('cpanel/branches') }}">
            <i class="fa fa-building-o "></i>
            Branches
          </a>
        </li>
        <li class="{{ active('cpanel/feedbacks*') }}">
          <a href="{{ url('cpanel/feedbacks') }}">
            <i class="fa fa-comments-o"></i>
            Feedback
          </a>
        </li>
        {{-- <li class="{{ active('cpanel/contact*') }}">
          <a href="{{ url('cpanel/contactus') }}">
            <i class="fa fa-phone"></i>
            Contact
          </a>
        </li> --}}
        <li class="{{ active('cpanel/partnerships*') }}">
          <a href="{{ url('cpanel/partnerships') }}">
            <i class="fa fa-handshake-o"></i>
            Partnerships
          </a>
        </li>
        <li class="{{ active('cpanel/website*') }}">
          <a href="#website" aria-expanded="false" data-toggle="collapse">
            <i class="fa fa-cogs"></i>
            Website Management
          </a>
          <ul id="website" class="collapse list-unstyled">
            <li><a href="{{ url('cpanel/website/carousel') }}">Carousel (Home)</a></li>
            <li><a href="{{ url('cpanel/website/gallery') }}">Gallery</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <div class="content-inner">
        <div class="content-loader"></div>
      <section class="no-padding-bottom">
        @yield("body")
      </section>
      <footer class="main-footer">
        <div class="container-fluid">
          <p>&copy; 2018 933 Co-Working Mnl. All Rights Reserved</p>
        </div>
      </footer>
    </div>
  </div>
</div>
