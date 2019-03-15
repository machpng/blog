<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('auth.Register') }}</title>
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
        .form-signin {
            width: 100%;
            max-width: 45%;
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
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: -1px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        img.captcha {
            cursor: pointer;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 3px;
        }
    </style>
</head>
<body class="text-center">
    <form class="form-signin" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group row mb-3">
            <div class="col-md-6 offset-md-4">
                <h3 class="font-weight-normal">{{ __('auth.Register') }}</h3>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('auth.Name') }}</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('auth.Email') }}</label>
            <div class="col-md-6">
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email" value="{{ old('email') }}" required >
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('auth.Password') }}</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       name="password" value="{{ old('password') }}" required >
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="confirm" class="col-md-4 col-form-label text-md-right">{{ __('auth.Confirm') }}</label>
            <div class="col-md-6">
                <input id="confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                       name="password_confirmation" value="{{ old('password_confirmation') }}" required >
                @if ($errors->has('confirm'))
                    <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('confirm') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="captcha" class="col-md-4 col-form-label text-md-right">验证码</label>
            <div class="col-md-6">
                <input id="captcha" class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" style="display: inline-block;width: 67%;" name="captcha" required>
                <img class="thumbnail captcha mt-1 mb-2" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
                @if ($errors->has('captcha'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('captcha') }}</strong>
                  </span>
                @endif
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    {{ __('auth.Register') }}
                </button>
                <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
            </div>
        </div>
    </form>
</body>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
