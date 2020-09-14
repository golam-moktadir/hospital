<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Registration Page</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{asset('backend/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{asset('backend/css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Register New Membership</div>
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First name" value="{{ old('first_name') }}"/>

                        @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last name" value="{{ old('last_name') }}"/>
                       
                        @error('last_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror                        
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email Address" value="{{old('email')}}" />

                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Enter Mobile Number" value="{{old('mobile')}}" />

                        @error('mobile')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"/>

                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password" />
                    </div>
                </div>
                <div class="footer">                    
                    <button type="submit" class="btn bg-olive btn-block">Sign me up</button>
                </div>
            </form>
        </div>
        <!-- Bootstrap -->
        <script src="{{asset('backend/js/bootstrap.min.js')}}" type="text/javascript"></script>
    </body>
</html>