<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/index.css')}}">
        <link rel="stylesheet" href="{{asset('css/viewpost.css')}}">

        <title>AI Community</title>
    </head>
    <body>
    @include('parts.Header')
    @include('parts.Alert')
        <main class="main">
        <section class=" section" id="about">
        <ul class="cards">
           
            <li class="cards__item">
              <div class="card">
                <div class="card__image"> <img src="{{ asset('storage/' . $post->image) }}" alt=""></div>
                <div class="card__content">
                  <div class="card__title">{{$post->title}}</div>
                  <p class="card__text">{{$post->content}}</p>
                  
                </div>
              </div>
            </li>
          </ul>
          </section>
        </main>
        @include('parts.Footer')
    </body>
</html>