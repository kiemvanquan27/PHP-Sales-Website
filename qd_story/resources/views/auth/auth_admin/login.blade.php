<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="signin.css" rel="stylesheet">

        <!-- Bootstrap core CSS -->
       <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

      <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="px-4 py-5 my-5 text-center">
    @if(session()->has('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session()->get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
      @endif
            <main  class="d-grid gap-1 d-sm-flex justify-content-sm-center">
                    <form method="POST" action="{{ route('login_admin') }}">
                    @csrf
                        <!--img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"-->
                        <h1 class="h3 mb-3 fw-normal">Login Admin</h1>

                        <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ ('Sai mật  khẩu') }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" name="remember" value="remember-me"> Remember me
                        </label>
                        </div>
                        <input name="is_admin" type="hidden"  />
                        <div class="row mb-0">
                            <div class="row mb-0">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                          
                            </div>
                            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
                        </div>
                       
                    </form> 
            </main>
  
    </div>   


    
  </body>
</html>
