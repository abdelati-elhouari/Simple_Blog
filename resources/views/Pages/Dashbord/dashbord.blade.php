<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Ai Community</title>
  
    <link rel="stylesheet" href="{{asset('css/dashbord.css')}}">
</head>
<body>
    @include('parts.Sidebar')
<div class="main-content">
    @include('parts.Header')
    @include('parts.Alert')
        
        
        <main>
            
            <div class="page-content">
            
                <div class="analytics">
                    <a href="{{route('users')}}">
                    <div class="card">
                        <div class="card-head">
                            <h2>{{ $users }}</h2>
                            <span class="las la-users"></span>
                        </div>
                        
                    </div>
                    </a>
                    <a href="posts">
                    <div class="card">
                        <div class="card-head">
                            <h2>{{ $posts }}</h2>
                            <span class="las la-clipboard-list"></span>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            
        </main>
        
    </div>
    <script>
        function uncheckCheckboxIfScreenWidthIs769OrMore() {
            var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

            if (screenWidth >= 769) {
                document.getElementById("menu-toggle").checked = false;
            }
        }

        // Call the function when the page loads and when it's resized
        window.onload = uncheckCheckboxIfScreenWidthIs769OrMore;
        window.onresize = uncheckCheckboxIfScreenWidthIs769OrMore;
    </script>