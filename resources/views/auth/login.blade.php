<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('auth.Login') }}</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        html,body {
            height: 100%;
        }
        body {
            display: flex;
            background-color: #f5f5f5;
            align-items: center;
            padding: 40px 0;
        }
        .help-block {
            display: block;
            margin-top: 5px;
            margin-bottom: 10px;
            color: #a4aaae;
        }
        .has-error .help-block,
        .has-error .checkbox,
        .has-error.radio label,
        .has-error.checkbox label,
        .has-error.radio-inline label,
        .has-error.checkbox-inline label {
            color: #a94442;
        }

        .has-error .form-control {
            border-color: #a94442;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .has-error .form-control:focus {
            border-color: #843534;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #ce8483;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #ce8483;
        }

        .has-error .input-group-addon {
            color: #a94442;
            border-color: #a94442;
            background-color: #f2dede;
        }

        .has-error .form-control-feedback {
            color: #a94442;
        }
        .form-signin {
            width: 100%;
            max-width: 40%;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body class="container text-center">
    <form class="form-signin" action="{{ route('login') }}" method="POST">
        {{ csrf_field() }}
        <h3 class="mb-3 font-weight-normal">{{ __('auth.Login') }}</h3>
        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" name='email' class="form-control" placeholder="{{ __('auth.Email') }}" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" name='password' class="form-control" placeholder="{{ __('auth.Password') }}" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> {{ __('auth.Remember Me') }}
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('auth.Login') }}</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>
</body>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
