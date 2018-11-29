<!DOCTYPE html>
<html lang="en">
  
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="{{ url('assets/master') }}/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="{{ url('assets/master') }}/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="{{ url('assets/master') }}/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>GIS Basket</title>

    <!-- vendor css -->
    <link href="{{ url('assets/master') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ url('assets/master') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ url('assets/master') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ url('assets/master') }}/lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">
    @stack('plugin_css')

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ url('assets/master') }}/css/bracket.css">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href="#"><span>[</span>GIS <i>Basket</i><span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{ route('operator.dashboard') }}" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="{{ route('operator.foto.manage') }}" class="br-menu-link">
            <i class="menu-item-icon icon ion-images tx-24"></i>
            <span class="menu-item-label">Foto</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
      <li class="br-menu-item">
          <a href="{{ route('operator.prestasi.manage') }}" class="br-menu-link">
              <i class="menu-item-icon icon ion-trophy tx-24"></i>
              <span class="menu-item-label">Prestasi</span>
          </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="{{ route('operator.schedule.manage') }}" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-list-outline tx-24"></i>
            <span class="menu-item-label">Schedule</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="{{ route('operator.news.manage') }}" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
            <span class="menu-item-label">News</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          
          <a class="br-menu-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               <i class="menu-item-icon icon ion-ios-undo-outline tx-22"></i>
               <span class="menu-item-label">Sign Out</span>
           
          </a><!-- br-menu-link -->

           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
           </form>
            
        </li><!-- br-menu-item -->
      </ul><!-- br-sideleft-menu -->

      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href="#"><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href="#"><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- br-header-left -->

      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down">{{ Auth::user()->name }}</span>
              <img src="{{ url('assets/master') }}/img/user.png" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">
              <div class="tx-center">
                <a href="#"><img src="{{ url('assets/master') }}/img/user.png" class="wd-80 rounded-circle" alt=""></a>
                <h6 class="logged-fullname">{{ Auth::user()->name }}</h6>
                <p>{{ Auth::user()->email }}</p>
              </div>
              <hr>
              <div class="tx-center">
                <span class="profile-earning-label">Last Login Information</span>
                <h5 class="profile-earning-amount">{{ \Carbon\Carbon::createFromTimeStamp(strtotime(Auth::user()->last_login_at))->diffForHumans() }}</h5>
                <span class="profile-earning-text">From {{ Auth::user()->last_login_ip }}</span>
              </div>
              <hr>
              <ul class="list-unstyled user-profile-nav">
                <li><a href="{{ route('master.profile.edit') }}"><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                <li>
                  <a class="br-menu-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      <i class="icon ion-power"></i> Sign Out
                  </a>
                </li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="#" class="pos-relative">
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      @yield('content')

      <footer class="br-footer">
          <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; {{ date('Y') }}. STIKOM Bali. All Rights Reserved.</div>
            <div>Attentively and carefully made by Bedebah.</div>
          </div>
        </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{ url('assets/master') }}/lib/jquery/jquery.js"></script>
    <script src="{{ url('assets/master') }}./lib/popper.js/popper.js"></script>
    <script src="{{ url('assets/master') }}/lib/bootstrap/js/bootstrap.js"></script>
    <script src="{{ url('assets/master') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{ url('assets/master') }}/lib/moment/moment.js"></script>
    <script src="{{ url('assets/master') }}/lib/jquery-ui/jquery-ui.js"></script>
    <script src="{{ url('assets/master') }}/lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="{{ url('assets/master') }}/lib/peity/jquery.peity.js"></script>
    @stack('plugin_scripts')
    <script src="{{ url('assets/master') }}/js/bracket.js"></script>
    @stack('scripts')
  </body>
</html>
