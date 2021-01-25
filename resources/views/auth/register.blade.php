<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chat</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
@section('content')
<div class="box">

<div class="container h-100">
    <div class="row justify-content-center h-100">
          <div class="col-md-6 col0">

          <div>
              <h1>مستخدم جديد </h1>

              <form method="POST" action="{{ route('register') }}">
                @csrf

                <input id="name" type="text" class="form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="الاسم">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                <input id="email" type="email" class="form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="البريد الإلكتروني">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                <input id="password" type="password" class="form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="كلمة السر ">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="password-confirm" type="password" class="form-control-lg" name="password_confirmation" required autocomplete="new-password" placeholder="تأكيد كلمة السر" >


                  <button class=" btn btn-danger w-100"type="submit"> تسجيل  </button>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </form>
          </div>
          <div class="mt-3">
          <a href="{{url('/login')}}">لديك حساب ؟</a>
          </div>
        </div>
        <div class="col-md-6">
            <img src="img\undraw_chatting_2yvo.png" style="width:100%;">
        </div>
    </div>
    </div>
</div>
{{-- <script src="{{asset('js/app.js')}}"></script> --}}
</body>
</html>






