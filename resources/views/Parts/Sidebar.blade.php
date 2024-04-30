<style> @import "{{ asset('css/sidebar.css') }}"; </style>
<input type="checkbox" id="menu-toggle">
<div class="sidebar">
   
    
    <div class="side-content">
        <div class="side-menu">
            <ul>
               
                

                @if (Auth::check() && Auth::user()->role === 'admin')
                    <li>
                    <a href="{{ route('dashbord') }}" >
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users') }}">
                            <span class="las la-users"></span>
                            <small>Users</small>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('all.posts') }}">
                            <span class="las la-clipboard-list"></span>
                            <small>All Posts</small>
                        </a>
                    </li>
                @endif
                <li>
                   <a href="{{ route('profile') }}">
                        <span class="las la-user-alt"></span>
                        <small>Profile</small>
                    </a>
                </li>
                <li>
                   <a href="{{ route('posts') }}">
                        <span class="las la-clipboard-list"></span>
                        <small>MY Posts</small>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
