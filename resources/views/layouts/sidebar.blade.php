<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/all.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libscripts.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/vendorscripts.bundle.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/mainscripts.bundle.js') }}"></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>

<body id="admin-page">

    <div id="wrapper">

        <div class="overlay"></div>

        <!-- Main Search -->
        <div id="search">
            <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
            <form method="POST" action="../admin/search_results.php">
                <input type="search" value="" name="searchQuery" placeholder="Search..." />
                <button type="submit" class="btn btn-primary" name="submit-search">Search</button>
            </form>
        </div>
        <!-- Right Icon menu Sidebar -->
        <div class="navbar-right">
            <ul class="navbar-nav">
                <li><a href="#search" class="main_search" title="Search..."><i class="zmdi zmdi-search"></i></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" title="Notifications" data-toggle="dropdown" role="button"><i
                            class="zmdi zmdi-notifications"></i>
                        <div class="notify" id="notify"><span class="heartbit"></span><span class="point"></span></div>
                    </a>
                    <span id="fuck"></span>
                    <ul class="dropdown-menu slideUp2">
                        <li class="header">Notifications (6)</li>
                        <li class="body">
                            <ul class="menu list-unstyled" id="notification_menu">
                            </ul>
                        </li>
                        <li class="footer"> <a href="#">View All Notifications</a> </li>
                    </ul>
                </li>
                <li><a href="#" class="js-right-sidebar" title="Setting"><i
                            class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
                <li><a href="#" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
            </ul>
        </div>

        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <div class="navbar-brand">
                <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
            </div>
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <a class="image" href="#"><img src="" alt="User"></a>
                            <div class="detail">
                            </div>
                        </div>
                    </li>
                    <li class="active open"><a href="home"><i
                                class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                    <li><a href="#" class="menu-toggle"><i class="zmdi zmdi-lock"></i><span>Users</span></a>
                        <ul class="ml-menu">
                            <li><a href="{{ url('admin/users/create') }}">Add User</a></li>
                            <li><a href="{{ url('admin/users') }}">View Users</a></li>
                            <li><a href="#">Edit Profile</a></li>
                            <li><a href="#">Delete Profile</a></li>
                            <li><a href="#">Reset Admin Password</a></li>
                        </ul>
                    </li>
                    <li class="open_top"><a href="#" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Blog
                                Posts</span></a>
                        <ul class="ml-menu">
                            <li><a href="#">View All Posts</a></li>
                            <li><a href="#">Add Post</a></li>
                            <li><a href="#">Remove Post</a></li>
                            <li><a href="#">Update Post</a></li>
                            <li><a href="#">Remove Comment</a></li>
                        </ul>
                    </li>
                    <li class="open_top"><a href="#" class="menu-toggle"><i class="zmdi zmdi-dns"></i><span>Blog
                                Categories</span></a>
                        <ul class="ml-menu">
                            <li><a href="#">Campus News</a></li>
                            <li><a href="#">Hot Gossip</a></li>
                            <li><a href="#">Video News</a></li>
                            <li><a href="#">Music News</a></li>
                            <li><a href="#">Trending News</a></li>
                            <li><a href="#">iTrendz TV</a></li>
                        </ul>
                    </li>
                    <li class="open_top"><a href="#" class="menu-toggle"><i
                                class="zmdi zmdi-receipt"></i><span>Newsletter</span></a>
                        <ul class="ml-menu">
                            <li><a href="#">Mailing List</a></li>
                        </ul>
                    </li>
                    <li class="active open">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                     <i class="zmdi zmdi-receipt"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs sm">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i
                            class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="setting">
                    <div class="slim_scroll">
                        <!--  <div class="card">
                    <h6>Theme Option</h6>
                    <div class="light_dark">
                        <div class="radio">
                            <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                            <label for="lighttheme">Light Mode</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark">
                            <label for="darktheme">Dark Mode</label>
                        </div>
                    </div>
                </div> -->
                        <div class="card">
                            <h6>Color Skins</h6>
                            <ul class="choose-skin list-unstyled">
                                <li data-theme="purple">
                                    <div class="purple"></div>
                                </li>
                                <li data-theme="blue">
                                    <div class="blue"></div>
                                </li>
                                <li data-theme="cyan">
                                    <div class="cyan"></div>
                                </li>
                                <li data-theme="green">
                                    <div class="green"></div>
                                </li>
                                <li data-theme="orange">
                                    <div class="orange"></div>
                                </li>
                                <li data-theme="blush" class="active">
                                    <div class="blush"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
    <section class="content mt-5">
        @yield('content')
        @yield('footer')
    </section>

</body>

</html>