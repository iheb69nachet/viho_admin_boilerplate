<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{asset('assets/images/dashboard/1.png')}}" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
        <a href="user-profile"> <h6 class="mt-3 f-14 f-w-600">{{auth()->user()->name}}</h6></a>
    
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/inscription') }}" href="javascript:void(0)"><i data-feather="home"></i><span>inscription</span></a>                  
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/inscription') }};">
                            <li><a href="{{route('preregister')}}" class="{{routeActive('preregister')}}">Pre-inscription</a></li>
                            <li><a href="{{route('register2')}}" class="{{routeActive('register2')}}">Inscription</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/contact') }}" href="javascript:void(0)"><i data-feather="mail"></i><span>contact</span></a>                  
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/contact') }};">
                            <li><a href="{{route('contact.index')}}" class="{{routeActive('contact.index')}}">demande de contact</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/translation') }}" href="javascript:void(0)"><i data-feather="mail"></i><span>langue</span></a>                  
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/translation') }};">
                            <li><a href="{{route('lang')}}" class="{{routeActive('lang')}}">liste des langues</a></li>


                        </ul>
                    </li>
                  
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
