<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Login</title>

    <!-- vendor css -->
    <link href="{{ url('assets/master') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ url('assets/master') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ url('assets/master') }}/css/bracket.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span>  <span class="tx-info">Login</span> <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-30">The Admin panel to manage data</div>

        @if (count($errors) > 0)
            @foreach ($errors->all() as $error) 
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ $error }}
            </div><!-- alert -->
            @endforeach
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="form-group">
          <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter your email" name="email" value="{{ old('email') }}" required autofocus>
         
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Enter your password" name="password" required>
          
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Sign In</button>

        </form>

      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="{{ url('assets/master') }}/lib/jquery/jquery.js"></script>
    <script src="{{ url('assets/master') }}/lib/popper.js/popper.js"></script>
    <script src="{{ url('assets/master') }}/lib/bootstrap/js/bootstrap.js"></script>

  </body>
</html>
