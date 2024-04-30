<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Ai Community</title>
    <link rel="stylesheet" href="{{asset('css/newPost.css')}}">
</head>
<body>
     
    @include('parts.Sidebar')
    <div class="main-content">    
        @include('parts.Header')
        @include('parts.Alert')
        <main>
            <div class="page-content">
                <div class="formbold-main-wrapper">
                    <div class="formbold-form-wrapper">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <h2>edit Post</h2>
                    <form action="{{ route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 
                        <div class="formbold-mb-3">
                          <label for="address" class="formbold-form-label"> Title :</label>
                  
                          <input type="text" name="title" id="title" placeholder="title" value="{{$post->title}}" class="formbold-form-input formbold-mb-3" />
                        </div>
                  
                        <div class="formbold-mb-3">
                          <label for="message" class="formbold-form-label" >
                            Content : 
                          </label>
                          <textarea rows="7" name="content" id="content" class="formbold-form-input"  >{{$post->content}}</textarea>
                        </div>
                  
                        <div class="formbold-form-file-flex">
                          <label for="upload" class="formbold-form-label">
                            Image :
                          </label>
                          <input type="file" name="image" id="image" value="{{$post->image}}" class="formbold-form-file" />
                        </div>
                        
                        <div class="class-btn">
                            <button class="formbold-btn">Submit</button>
                        </div> 
                      </form>
                    </div>
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
        window.onload = uncheckCheckboxIfScreenWidthIs769OrMore;
        window.onresize = uncheckCheckboxIfScreenWidthIs769OrMore;
    </script>
</body>
</html>