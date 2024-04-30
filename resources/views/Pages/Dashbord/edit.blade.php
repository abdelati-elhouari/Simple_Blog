<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Ai Community</title>
   
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
 
</head>
<body>
 @include('parts.Sidebar');
    
    <div class="main-content">
        @include('parts.Header')
        @include('parts.Alert')
  
        <main>
            <div class="page-content">
                <div class="formbold-main-wrapper">
                    <div class="formbold-form-wrapper">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h3>Personal Details</h3>
                        <div class="flex flex-wrap formbold--mx-3">
                          <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                              <label for="fName" class="formbold-form-label"> Full Name </label>
                              <input type="text" name="name" id="name" placeholder="First Name" value="{{$user->name}}" class="formbold-form-input" />
                            </div>
                          </div>
                        </div>
                        <div class="flex flex-wrap formbold--mx-3">
                          <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                              <label for="fName" class="formbold-form-label"> Email </label>
                              <input type="email" name="email" id="email" placeholder="First Name" value="{{$user->email}}" class="formbold-form-input" />
                            </div>
                          </div>
                        </div>
                        <div class="w-full sm:w-half formbold-px-3">
    <div class="formbold-mb-5">
        <label for="newPassword" class="formbold-form-label">Role </label>
        <select name="newPassword" id="newPassword" class="formbold-form-input" >
          <option value="admin" @if($user->role == 'user') selected @endif>user </option>
            <option value="user" @if($user->role == 'admin') selected @endif> admin</option>
  
        </select>
    </div>
</div>
                        <div class="class-btn">
                            <button class="formbold-btn">change</button>
                        </div>
                        
                      </form>
                    </div>
                </div>
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
                      <form action="{{ route('users.password', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h3>Change Password</h3>
                        <div class="flex flex-wrap formbold--mx-3">
                          <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                              <label for="fName" class="formbold-form-label"> Old Password </label>
                              <input type="password" name="password" id="fName" placeholder="old password" class="formbold-form-input" />
                            </div>
                          </div>
                        </div>
                        <div class="flex flex-wrap formbold--mx-3">
                          <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                              <label for="npassword" class="formbold-form-label"> New Password </label>
                              <input type="password" name="npassword" id="npassword" placeholder="New password" class="formbold-form-input" />
                            </div>
                          </div>
                        </div>
                        <div class="flex flex-wrap formbold--mx-3">
                          <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                              <label for="fName" class="formbold-form-label"> Confirm Password </label>
                              <input type="password" name="npassword_confirmation" id="cpassword" placeholder="Confirm Password" class="formbold-form-input" />
                            </div>
                          </div>
                        </div>
                  
                        <div class="class-btn">
                            <button class="formbold-btn">Change</button>
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

        // Call the function when the page loads and when it's resized
        window.onload = uncheckCheckboxIfScreenWidthIs769OrMore;
        window.onresize = uncheckCheckboxIfScreenWidthIs769OrMore;
    </script>
</body>
</html>