<nav class="navbar navbar-light navbar-glass navbar-top sticky-kit navbar-expand-lg navbar-top-combo" data-move-target="#navbarVerticalNav">

    @include('partials.navbar')

    <ul class="navbar-nav navbar-nav-icons ml-auto flex-row align-items-center">
      <li class="nav-item">
        {{Auth::user()->name}}
      </li>

        {{-- 
          <li class="nav-item dropdown dropdown-on-hover">
          <a class="nav-link notification-indicator notification-indicator-primary px-0 icon-indicator" id="navbarDropdownNotification" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-bell fs-4" data-fa-transform="shrink-6"></span></a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-card" aria-labelledby="navbarDropdownNotification">
            <div class="card card-notification shadow-none" style="max-width: 20rem">
              <div class="card-header">
                <div class="row justify-content-between align-items-center">
                  <div class="col-auto">
                    <h6 class="card-header-title mb-0">Notifications</h6>
                  </div>
                  <div class="col-auto"><a class="card-link font-weight-normal" href="#">Mark all as read</a></div>
                </div>
              </div>
              <div class="list-group list-group-flush font-weight-normal fs--1">
                <div class="list-group-title">NEW</div>
                <div class="list-group-item">
                  <a class="notification notification-flush bg-200" href="#!">
                    <div class="notification-avatar">
                      <div class="avatar avatar-2xl mr-3">
                        <img class="rounded-circle" src="../assets/img/team/1-thumb.png" alt="" />

                      </div>
                    </div>
                    <div class="notification-body">
                      <p class="mb-1"><strong>Emma Watson</strong> replied to your comment : "Hello world 😍"</p>
                      <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">💬</span>Just now</span>

                    </div>
                  </a>

                </div>
                <div class="list-group-item">
                  <a class="notification notification-flush bg-200" href="#!">
                    <div class="notification-avatar">
                      <div class="avatar avatar-2xl mr-3">
                        <div class="avatar-name rounded-circle"><span>AB</span></div>
                      </div>
                    </div>
                    <div class="notification-body">
                      <p class="mb-1"><strong>Albert Brooks</strong> reacted to <strong>Mia Khalifa's</strong> status</p>
                      <span class="notification-time"><span class="mr-1 fab fa-gratipay text-danger"></span>9hr</span>

                    </div>
                  </a>

                </div>
                <div class="list-group-title">EARLIER</div>
                <div class="list-group-item">
                  <a class="notification notification-flush" href="#!">
                    <div class="notification-avatar">
                      <div class="avatar avatar-2xl mr-3">
                        <img class="rounded-circle" src="../assets/img/icons/weather-sm.jpg" alt="" />

                      </div>
                    </div>
                    <div class="notification-body">
                      <p class="mb-1">The forecast today shows a low of 20&#8451; in California. See today's weather.</p>
                      <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">🌤️</span>1d</span>

                    </div>
                  </a>

                </div>
              </div>
              <div class="card-footer text-center border-top-0"><a class="card-link d-block" href="../pages/notifications.html">View all</a></div>
            </div>
          </div>

          </li> 
        --}}
      @if(isset(Auth::user()->name))
        <li class="nav-item dropdown dropdown-on-hover">
          <a class="nav-link pr-0" id="navbarDropdownUser" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-xl">
              <img class="rounded-circle bg-white"  src="{{asset('assets/img/team/avatar.png')}}" alt="" />
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-center py-0" aria-labelledby="navbarDropdownUser">
            <div class="bg-white rounded-soft py-2">
              <a class="dropdown-item" href="{{ route('operations.index') }}">Opérations</a>
              <a class="dropdown-item" href="pages/profile.html">Profil</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('users.logout') }}">Se déconnecter</a>
            </div>
          </div>
        </li>

      @endif
    </ul>
</nav>