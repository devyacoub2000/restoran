
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Signup </title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    list-style: none;
    text-decoration: none;
}

html, body{
    display: grid;
    height: 100%;
    width: 100%;
    place-items: center;
    background-image: linear-gradient(rgba(0, 0, 0, .1), rgba(0, 0, 0, .1)), url('https://i.postimg.cc/8CnC2xH5/background.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}

.wrapper{
    max-width: 390px;
    background-color: transparent;
    backdrop-filter: blur(20px);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 15px 20px rgba(0, 0, 0, .1);
    overflow: hidden;
}

.wrapper .title-text{
    display: flex;
    width: 200%;
}

.wrapper .title-text .title{
    width: 50%;
    font-size: 35px;
    font-weight: 600;
    text-align: center;
    transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    color: #fff;
}

.wrapper .form-container{
    width: 100%;
    overflow: hidden;
}

.form-container .slide-controls{
    display: flex;
    justify-content: space-between;
    height: 50px;
    width: 100%;
    border: 1px solid lightgrey;
    overflow: hidden;
    margin: 30px 0 10px 0;
    border-radius: 10px;
    position: relative;
}

.slide-controls .slide{
    width: 100%;
    height: 100%;
    font-size: 18px;
    font-weight: 500;
    line-height: 48px;
    text-align: center;
    cursor: pointer;
    color: #fff;
    z-index: 1;
    transition: all .6s ease;        
}

.slide-controls .signup{
    color: #212121;
}

.slide-controls .slide-tab{
    position: absolute;
    height: 100%;
    width: 50%;
    top: 0;
    left: 0;
    z-index: 0;
    background: -webkit-linear-gradient(left, #648b45, #223f1f);
    transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

input[type="radio"]{
    display: none;
}

#signup:checked ~ .slide-tab{
    left: 50%;
}

#signup:checked ~ .signup{
    color: #fff;
}

#signup:checked ~ .login{
    color: #212121;
}

.form-container .form-inner{
    display: flex;
    width: 200%;
}

.form-container .form-inner form{
    width: 50%;
    transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);;
}

.form-inner form .field{
    height: 50px;
    width: 100%;
    margin-top: 20px;
}

.form-inner form .field input{
    width: 100%;
    height: 100%;
    outline: none;
    font-size: 17px;
    padding-left: 15px;
    border-radius: 10px;
    border: 1px solid lightgray;
    border-bottom-width: 2px;
    transition: all 0.4s ease;
}

.form-inner form .field input:focus{
    border-color: #fc83bb;
}

.form-inner form .pass-link{
    margin-top: 5px;
}

.form-inner form .pass-link a,
a{
    color: #fff;
    text-decoration: none;
}

.form-inner form .signup-link{
    color: #fff;
    text-align: center;
    margin-top: 30px;
}

.form-inner form .signup-link a{
    font-weight: bold;
}

.form-inner form .pass-link a:hover,
.form-inner form .signup-link a:hover{
    text-decoration: underline;
}

form .field input[type="submit"]{
    background: -webkit-linear-gradient(left, #648b45, #223f1f);
    color: #fff;
    font-size: 20px;
    font-weight: 500;
    padding-left: 0;
    border: none;
    cursor: pointer;
}
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">Login Form</div>
            <div class="title signup">Signup Form</div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login"  class="slide login">Login</label>
                <label for="signup" class="slide signup">Signup</label>
                <div class="slide-tab"></div>
            </div>
            <div class="form-inner">
                <form action="{{ route('login') }}" method="POST" class="login">
                    @csrf
                    <div class="field">
                        <input type="email" name="email" placeholder="Email Address" value="{{old('email')}}" class="@error('email') is-invalid @enderror">
                         @error('email')
                          <small class="invalid-feedback"> {{ $message }} </small>
                         @enderror
                    </div>

                    <div class="field">
                        <input type="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required>
                         @error('password')
                          <small class="invalid-feedback"> {{ $message }} </small>
                         @enderror
                    </div>
                    <div class="pass-link">
                         @if (Route::has('password.request'))
                          <a href="{{ route('password.request') }}">Forgot Password</a>
                         @endif
                    </div>
                    <div class="field">
                        <input type="submit" value="Login">
                    </div>
                    <div class="signup-link">Not a member?<br>
                        <a href="#">Signup Now</a>
                    </div>
                </form>

                 

                <form action="{{route('register')}}" method="POST" class="signup">
                    @csrf

                    <div class="field">
                        <input type="text" name="name" class="@error('name') is-invalid @enderror" placeholder="Name" required>
                        @error('name')
                         <small class="invalid-feedback"> {{$message}} </small>
                        @enderror
                    </div>

                    <div class="field">
                        <input type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="Email Address" required>
                        @error('email')
                          <small class="invalid-feedback"> {{ $message }} </small>
                         @enderror
                    </div>
                    <div class="field">
                        <input type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Password" required>
                        @error('password') 
                          <small class="invalid-feedback"> {{$message}} </small>
                        @enderror
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Confirm Password" class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
                        @error('password_confirmation')
                         <small class="invalid-feedback"> {{$message}} </small>
                        @enderror
                    </div>
                    <div class="field">
                        <input type="submit" value="Signup" required>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        
        const loginForm = document.querySelector("form.login");
        const signupForm = document.querySelector("form.signup");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector(".signup-link a");
        const loginText = document.querySelector(".title-text .login");
        const signupText = document.querySelector(".title-text .signup");

        signupBtn.addEventListener("click", () => {
          loginForm.style.marginLeft = "-50%";
          loginText.style.marginLeft = "-50%";
        });

        loginBtn.addEventListener("click", () => {
          loginForm.style.marginLeft = "0%";
          loginText.style.marginLeft = "0%";
        });

        signupLink.addEventListener("click", () => {
          signupBtn.click();
          return false;
        });


    </script>
</body>
</html>
