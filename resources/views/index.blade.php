<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simple Blog</title>
        <!-- <link rel="stylesheet" href="{{ asset('css/Header.css') }}"> -->

        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    </head>
    <body>
     @include('parts.Header')
     @include('parts.Alert')
        <main class="main">
            <section class="home" id="home">
                <img src="images/home1.jpg" alt="" class="home__img">

                <div class="home__container container grid">
                    <div class="home__data">
                        <h1 class="home__data-title">Welcome to <br>AI Community  <br> Your Source for AI Insights</b></h1>
                        <a href="#" class="button">Join Our Community</a>

                    </div>
                </div>
            </section>

            <section class="section" id="">
                <h2 class="section__title">Discover the most <br> attractive places</h2>
                
                <div class="discover__container container swiper-container">
                    <div class="swiper-wrapper">
                        <div class="discover__card swiper-slide">
                            <img src="images/discover1.jpg" alt="" class="discover__img">
                        </div>

                        <div class="discover__card swiper-slide">
                            <img src="images/discover2.jpg" alt="" class="discover__img">
                        </div>
                        <div class="discover__card swiper-slide">
                            <img src="images/discover4.jpg" alt="" class="discover__img">
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="section" id="">
                <h2 class="section__title"> <br> POSTS </h2>
                @foreach($posts as $post)
                
                <div class="about__container container grid">
                <div class="about__img">
                        <div class="about__img-overlay">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="about__img-two">
                        </div>
                    </div>
                    <div class="about__data">
                       <a href="{{route('posts.show',$post->id)}}"> <h2 class="section__title about__title">{{$post->title}}</h2></a>
                        <p class="about__description">
                        {{substr($post->content, 0, 90)}} ...
                        </p>
                        <a href="{{route('posts.show',$post->id)}}" class="button">Read More </a>
                    </div>

                   
                </div>
                @endforeach
            </section>
            @include('parts.Footer')
    </body>
</html>
