<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'App Name') }}</title>

    <link href="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.0/animate.min.css" rel="stylesheet">

    <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">

    {{--<script src="//www.google.com/recaptcha/api.js"></script>--}}

</head>

<body class="gray-bg">

<div class="wrapperLoginForm LoginfadeInDown loginscreen animated fadeInDown">
    <div class="login-form-content">
        <div class="wrapper LoginfadeInDown">
            <div class="text-center fadeIn first">
                <h2 style="font-size: 32px" class="text-dark">FlyShop Admin</h2>
                <div>Login to admin panel.</div>
            </div>
            @if (session()->has('Error'))
                <div class="alert alert-danger text-center">
                    {{ session('Error') }}
                </div>
            @endif
            <form class="m-t" role="form" method="POST" action="{{ route('admin.login') }}" id="admin-login-form">
                @csrf
                <input type="hidden" name="FormType" hidden value="AdminForm" style="display: none;" readonly required>
                <div class="form-group fadeIn second">
                    <label for="email" class="text-dark">Email: </label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required="" id="email" name="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group fadeIn third">
                    <label for="password" class="text-dark">Password: </label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="" id="password" name="password" minlength="8">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{--<button type="submit" class="btn btn-primary block full-width m-b fadeIn fourth g-recaptcha"
                        data-sitekey="{{ env('USER_CAPTCHA_KEY') }}"
                        data-callback='onSubmit'
                        data-action='submit'>Login</button>--}}

                <button type="submit" class="btn btn-primary block full-width m-b fadeIn fourth">Login</button>
            </form>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="//code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous" defer></script>
<script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous" defer></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous" defer></script>

<script>
    /*function onSubmit(token) {
        document.getElementById("admin-login-form").submit();
    }*/
</script>


</body>

</html>




