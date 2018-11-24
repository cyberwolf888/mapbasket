<!DOCTYPE html>
<html lang="en">
  
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="BedebahPixel">

    <title>Administrator</title>

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
    <div class="br-logo"><a href="#"><span>[</span><i>Administrator</i><span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{ route('master.dashboard') }}" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="{{ route('master.lapangan.manage') }}" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-location-outline tx-24"></i>
            <span class="menu-item-label">Lapangan</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="{{ route('master.club.manage') }}" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-basketball-outline tx-24"></i>
            <span class="menu-item-label">Club</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="{{ route('master.review.manage') }}" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-chatbubble-outline tx-24"></i>
            <span class="menu-item-label">Reviews</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="{{ route('master.schedule.manage') }}" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-list-outline tx-24"></i>
            <span class="menu-item-label">Schedule</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="{{ route('master.admin.manage') }}" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-people-outline tx-24"></i>
            <span class="menu-item-label">Admin</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
          <a href="{{ route('master.profile.edit') }}" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-person-outline tx-24"></i>
            <span class="menu-item-label">My Account</span>
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
          <?php
            $notif = App\Models\Schedule::where('status',2)->orderBy('created_at','DESC')->limit(4)->get();
          ?>
          @if($notif->count() > 0)
          <div class="dropdown">
            <a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
              <i class="icon ion-ios-bell-outline tx-24"></i>
              <!-- start: if statement -->
              <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
              <!-- end: if statement -->
            </a>
            <div class="dropdown-menu dropdown-menu-header">
              <div class="dropdown-menu-label">
                <label>Notifications</label>
                <a href="#">Mark All as Read</a>
              </div><!-- d-flex -->

              <div class="media-list">
                <!-- loop starts here -->
                @foreach ($notif as $row)
                <a href="{{ route('master.schedule.manage') }}" class="media-list-link read">
                    <div class="media">
                      <img src="{{ $row->club->thumb_img }}" alt="">
                      <div class="media-body">
                        <p class="noti-text"><strong>{{ $row->club->nama }}</strong> at {{ $row->lapangan->nama}}.</p>
                        <span>{{ date('d F Y', strtotime($row->tgl)) }}, {{ date('H:i', strtotime($row->start)) }} - {{ date('H:i', strtotime($row->end)) }}</span>
                      </div>
                    </div><!-- media -->
                  </a>
                @endforeach
                
                <!-- loop ends here -->
                <div class="dropdown-footer">
                  <a href="{{ route('master.schedule.manage') }}"><i class="fa fa-angle-down"></i> Show All Notifications</a>
                </div>
              </div><!-- media-list -->
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
          @endif
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
    <script src="{{ url('assets/master') }}/lib/popper.js/popper.js"></script>
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
