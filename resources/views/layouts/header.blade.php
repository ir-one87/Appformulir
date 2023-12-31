<!-- Header start -->
<header class="header">
    <div class="toggle-btns">
        <a id="toggle-sidebar" href="#">
            <i class="icon-list"></i>
        </a>
        <a id="pin-sidebar" href="#">
            <i class="icon-list"></i>
        </a>
    </div>
    <div class="header-items">
        <!-- Custom search start -->
        <div class="custom-search">
            <input type="text" class="search-query" placeholder="Search here ...">
            <i class="icon-search1"></i>
        </div>
        <!-- Custom search end -->

        <!-- Header actions start -->
        <ul class="header-actions">
            <li class="dropdown">
                <a href="#" id="userSettings" class="user-settings" data-bs-toggle="dropdown" aria-haspopup="true">
                    <span class="user-name">{{ session('name') }}</span>
                    <span class="avatar">
                        <img src="{{ asset('assets/img/avatar1.png') }}" alt="Admin Dashboards">
                        <span class="status busy"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                    <div class="header-profile-actions">
                        <div class="header-user-profile">
                            <div class="header-user">
                                <img src="{{ asset('assets/img/avatar1.png') }}" alt="Admin Templates">
                            </div>
                            <h5></h5>
                            <p></p>
                        </div>
                        <a href="#"><i class="icon-user1"></i> My Profile</a>
                        <a href="#"><i class="icon-settings1"></i> Account Settings</a>
                        <a href=""><i class="icon-log-out1"></i> Sign Out</a>
                    </div>
                </div>
            </li>
        </ul>
        <!-- Header actions end -->
    </div>
</header>
<!-- Header end -->