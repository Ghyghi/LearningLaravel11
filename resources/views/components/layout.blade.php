<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>ToDoApp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/main.css" />
  </head>
  <body>
    <header class="header-bar mb-3">
      <div class="container d-flex flex-column flex-md-row align-items-center p-3">
        @auth
          <div class="d-flex flex-wrap align-items-center justify-content-between my-3 my-md-0">
            @if(auth()->user()->hasRole(['Admin', 'Super Admin']))
              <div class="d-flex align-items-center">
                <h4 class="my-0 mr-md-auto font-weight-normal">
                  <a href="{{ route('adminDashboard') }}" class="text-white text-decoration-none">ToDo App</a>
                </h4>
                <a class="btn btn-sm btn-success mx-2" href="{{route('adminDashboard')}}">Dashboard</a>
                
                <!-- Collapsible Admin Links -->
                <button class="btn btn-info btn-sm mx-2" type="button" data-toggle="collapse" data-target="#adminLinks" aria-expanded="false" aria-controls="adminLinks">
                  Admin Links
                </button>
                
                <div class="collapse" id="adminLinks">
                  <div class="d-flex flex-wrap mt-3">
                    <a class="btn btn-sm btn-info mx-2" href="{{ url('permissions') }}">Permissions</a>
                    <a class="btn btn-sm btn-info mx-2" href="{{ url('roles') }}">Roles</a>
                    <a class="btn btn-sm btn-info mx-2" href="{{ url('users') }}">Users</a>
                  </div>
                </div>
          
                <!-- Collapsible Task Links -->
                <button class="btn btn-info btn-sm mx-2" type="button" data-toggle="collapse" data-target="#taskLinks" aria-expanded="false" aria-controls="taskLinks">
                  Task Links
                </button>
                
                <div class="collapse" id="taskLinks">
                  <div class="d-flex flex-wrap mt-3">
                    <a class="btn btn-sm btn-success mx-2" href="{{route('createTask')}}">Create Task</a>
                    <a class="btn btn-sm btn-info mx-2" href="{{ route('viewTasks') }}">View All Tasks</a>
                    <a class="btn btn-sm btn-info mx-2" href="{{ route('viewAllTasks') }}">View My Tasks</a>
                  </div>
                </div>
              </div>
            @else
              <div class="d-flex align-items-center">
                <h4 class="my-0 mr-md-auto font-weight-normal">
                  <a href="{{ route('dashboard') }}" class="text-white text-decoration-none">ToDo App</a>
                </h4>
                <a class="btn btn-sm btn-success mx-2" href="{{route('dashboard')}}">Dashboard</a>
                <a class="btn btn-sm btn-info mx-2" href="{{ route('viewAllTasks') }}">View My Tasks</a>
              </div>
            @endif
            <form action="/logout" method="POST" class="d-inline">
              @csrf
              <button class="btn btn-sm btn-secondary">Sign Out</button>
            </form>
          </div>
        
        @else
          <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-white">ToDo App</a></h4>
          <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
            @csrf
            <div class="row align-items-center">
              <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                <input name="loginusername" class="form-control form-control-sm input-dark" type="text" placeholder="Username" autocomplete="off" />
                @error('loginusername')
                  <p class='m-0 small alert-danger shadow-sm'>{{$message}}</p>
                @enderror
              </div>
              <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                <input name="loginpassword" class="form-control form-control-sm input-dark" type="password" placeholder="Password" />
                @error('loginpassword')
                  <p class='m-0 small alert-danger shadow-sm'>{{$message}}</p>
                @enderror
              </div>
              <div class="col-md-auto">
                <button class="btn btn-primary btn-sm">Sign In</button>
              </div>
            </div>
          </form>
        @endauth
      </div>
    </header>
    @if(session()->has('success'))
        <div class='container container--narrow'>
          <div class='alert alert-success text-center'>
            {{session('success')}}
          </div>
        </div>
      @elseif(session()->has('error'))
        <div class='container container--narrow'>
          <div class='alert alert-danger text-center'>
            {{session('error')}}
          </div>
        </div>
      @endif

    {{$slot}}

    <footer class="border-top text-center small text-muted py-3">
        <p class="m-0">Copyright &copy; {{date('Y')}} <a href="/" class="text-muted">{{config('app.name')}}</a>. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
    $('[data-toggle="tooltip"]').tooltip()
    </script>
    </body>
</html>