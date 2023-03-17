<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted text-uppercase">
        <span>{{ auth()->user()->name }}</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('account*') ? 'active' : '' }}" aria-current="page" href="/account/{{ $user->username }}">
            <span data-feather="home" class="align-text-bottom"></span>
            My Presence
          </a>
        </li>
        <li class="nav-item {{ Request::is('account/edit') ? 'active' : ''}}">
          <a class="nav-link" href="/account/{{ $user->username }}/edit">
            <span data-feather="file" class="align-text-bottom"></span>
            Edit Account
          </a>
        </li>
        
      </ul>
    </div>
  </nav>