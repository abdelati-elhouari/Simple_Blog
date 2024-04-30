
<style> @import "{{ asset('css/Header.css') }}"; </style>
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<header class="header" id="header">
    <nav class="nav container">
        <a href="{{route('index') }}" class="nav__logo">AI Community</a>
        
        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="{{route('index') }}" class="nav__link active-link">Home</a>
                </li>
                <li class="nav__item">
                    <a href="{{route('about') }}" class="nav__link">About</a>
                </li>
                
                @guest
                <li class="nav__item">
                    <a href="{{ route('login') }}" class="nav__link">Login</a>
                </li>
                @else
                
                <li class="nav__item">
                    
                    
                    <span class="las la-user"></span>
                    <a href="{{route('dashbord')}}" class="nav__link">Profile</a>
                        
                            
                            
                    </li>
                    <li class="nav__item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            <button type="submit" class="nav__link">Logout</button>
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav__link">
                            <span class="las la-power-off"></span>
                            Logout
                        </a>
                    </li>
                            @endguest
                            
                        </ul>

            <img src="images/close.png" alt="clos" class=" nav__close" id="nav-close"/>  
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <label for="menu-toggle">
                <!-- <span class="las la-bars"></span> -->
                <i class="las la-bars" id=""></i>
            </label>
        </div>
    </nav>
</header>
<script src="{{ asset('js/Header.js') }}"></script>