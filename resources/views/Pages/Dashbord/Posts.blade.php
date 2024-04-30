<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Ai Community</title>
    <link rel="stylesheet" href="{{asset('css/posts.css')}}">
 
</head>
<body>
 @include('parts.Sidebar');
    
    <div class="main-content">
        @include('parts.Header')
        @include('parts.Alert')
        
        <main>
            <div class="page-content">
              <div class="posts"> 
                <h2>My Posts</h2>
                <a href="{{route('post.create')}}"><button>add new post</button></a>
              </div>
            <ul class="cards">
            @foreach($posts as $post)
            <li class="cards__item">
              <div class="card">
                <div class="card__image"> <img src="{{ asset('storage/' . $post->image) }}" alt=""></div>
                <div class="card__content">
                  <div class="card__title">{{$post->title}}</div>
                  <p class="card__text">{{substr($post->content, 0, 90)}} ...</p>
                  <div class="actions">
                    <form id="delete-form-{{$post->id}}" action="{{route('posts.destroy', $post->id )}}" method="POST" style="display: none;">
                      @csrf
                      @method('delete')
                    </form>
                    <a href="#" class="vew"><span class="las la-eye"></span></a>
                    <a href="{{route('posts.edit',$post->id)}}" class="edit"><span class="las la-edit"></span></a>
                    <a href="#" class="delete" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this Post?')) { document.getElementById('delete-form-{{ $post->id }}').submit(); }"><span class="las la-trash"></span></a>
                  </div>
                </div>
              </div>
            </li>
            @endforeach
          </ul>
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
</body>
</html>