@extends('layouts.my-auth')

@section('form')
    <div class="main">
        <div class="container">
            <div class="title-sign">
                <h1>MySite</h1>
            </div>
            <div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input" style=" margin-top: 63px">
                        <img class="icon" src="/img/user.svg" alt="">
                        <input id="name" class="form-control input-feild @error('name') is-invalid @enderror" type="text" name="name" placeholder="ФИО" style="">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div  class="input" style=" margin-top: 63px">
                        <img class="icon" src="/img/at-sign.svg" alt="">
                        <input id="email" class="form-control input-feild @error('email') is-invalid @enderror" type="text" name="email" placeholder="Твоя Почта">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="input" style=" margin-top: 63px">
                        <img class="icon" src="/img/lock.svg" alt="">
                        <input id="password" class="form-control input-feild @error('password') is-invalid @enderror" type="password" name="password" placeholder="Новый пароль">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="input" style="margin-top: 63px;">
                        <img class="icon" src="/img/key.svg" alt="" style="">
                        <input id="password-confirm" class="form-control input-feild" type="password" name="password_confirmation" placeholder="Подъвердить пароль">

                    </div>
                    <div class="signup">
                        <button type="submit" name="button" class="signup-button hvr-fade">Sign up</button>
                    </div>
                </form>
            </div>
            <div>
                <p class="hvr-hilight">You do have an accout already? <a class="hvr-hilight-green" href="signin.php" >Sign up</a></p>
            </div>
        </div>
    </div>
@stop
