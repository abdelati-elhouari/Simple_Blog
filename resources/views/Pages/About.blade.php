<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/index.css')}}">
        <link rel="stylesheet" href="{{asset('css/about.css')}}">

        <title>AI Community</title>
    </head>
    <body>
    @include('parts.Header')
        <main class="main">
            <section class="home" id="home">
                <img src="images/home3.jpg" alt="" class="home__img">

                <div class="home__container container grid">
                    <div class="home__data">
                        
                    </div>
                </div>
            </section>
            <section class="about section" id="about">
                <h2 class="section__title">More Information <br> About AI Community </h2>
                <div class="login__container container grid">
                    <div class="login__img">
                
                            <img src="images/discover1.jpg" alt="" class="about__img-one">
                     
        
                        
                    </div>
                    <div class="login__data">
                      
                      
                    </div>

                </div>
            </section>
        </main>
        @include('parts.Footer')
    </body>
</html>