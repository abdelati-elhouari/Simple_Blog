<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/index.css')}}">
        <link rel="stylesheet" href="{{asset('css/singup.css')}}">

        <title>AI Community</title>
    </head>
    <body>
    @include('parts.Header')
    @include('parts.Alert')
        <main class="main">
            <section class="login section" id="about">
                <div class="login__container">

                    <div class="login_data">
                        <div class="icon_login">
                            <img src="images/iconlogin.png" alt="" class="icon"/>
                        </div> 
                        <div class="form">
                            <form action="{{ route('register') }}" method="POST">
                            @csrf
                                <div class="input-group">
                                    <input type="text" name="name" required>
                                    <label for="">Full name</label>
                                </div>
                                <div class="input-group">
                                    <input type="email" name="email" required>
                                    <label for="">Email</label>
                                </div>
                                
                                <div class="input-group">
                                    <input type="password" name="password" required>
                                    <label for="">Password</label>
                                </div>
                                <div class="input-group">
                                    <input type="password" name="password_confirmation" required>
                                    <label for="">Confirn Password</label>
                                </div>
                                <div class="btn-group">   
                                    <button class="btn" type="submit">Sing Up</button>
                                </div>
                                <div> <a href="{{route('login') }}"> you have  Account -></a></div>
                            </form>
                            </div>
                        </div> 
                </div>
            </section>
            @include('parts.Footer')
    </body>
</html>