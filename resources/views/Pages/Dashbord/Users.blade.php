
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Ai Community</title>
    <link rel="stylesheet" href="{{asset('css/users.css')}}">
</head>
<body>
    @include('parts.Sidebar')
    <div class="main-content">
        @include('parts.Header')   
        @include('parts.Alert')             
        <main>     
            <div class="page-content">

                <div class="records table-responsive">

                    <div class="record-header">
                          ALL USERS
                        
                    </div>

                    <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> FULL NAME</th>   
                                    <th>EMAIL</th>
                                    <th> PASSWORD</th>
                                    <th>ROLE</th>
                                    <th> ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>
                                        <div class="client">
                                          
                                            <img src="images/profile.png" alt="profil" class="profil"/>
                                            <!-- <div class="client-info">  -->
                                                <h4>{{$user->name}}</h4>
                                                
                                             <!-- </div> -->
                                       </div>
                                    </td>
                                    <td>
                                    {{$user->email}}
                                    </td>
                                    <td>
                                    {{ substr($user->password, 0, 16) }}...
                                    </td>
                                    <td>
                                    {{$user->role}}
                                    </td>
                                    <td>
                                        <div class="actions">
                                        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <a href="{{ route('users.edit', $user->id) }}"><span class="las la-user-edit"></span></a>
                                            <!-- <span class="las la-eye"></span> -->
                                            <a href="#" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this user?')) { document.getElementById('delete-form-{{ $user->id }}').submit(); }"><span class="las la-trash"></span></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            
            </div>
            
        </main>
        
    </div>