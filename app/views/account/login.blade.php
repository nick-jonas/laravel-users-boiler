@extends('layouts.master')
@section('content')

<div class="form content">
{{ Form::open(array('url' => 'users/login')) }}
    <h1>@lang('users.login')</h1>

    @if($errors->count() > 0)
    <p class="message error">
        {{ $errors->first('email') }}
        {{ $errors->first('password') }}
    </p>
    @endif
    @if($invalidLogin)
    <p class="message error">
        {{ $invalidLogin }}
    </p>
    @endif

    {{ Form::hidden('redirect', Request::get('redirect')) }}
    <p>
        {{ Form::label('email', Lang::get('users.email')) }}
        {{ Form::text('email', Input::old('email'), array('placeholder' => 'email@email.com')) }}
    </p>

    <p>
        {{ Form::label('password', Lang::get('users.password')) }}
        {{ Form::password('password') }}
    </p>

    <p>{{ Form::submit(Lang::get('users.login'), array('class' => 'big-btn login')) }}</p>
{{ Form::close() }}


<a class="big-btn login-twitter" href="{{action('AccountController@getLoginWithTwitter')}}">{{Lang::get('users.loginWithTwitter')}}</a>

<a class="big-btn login-facebook" href="{{action('AccountController@getLoginWithFacebook')}}">{{Lang::get('users.loginWithFacebook')}}</a>

<a class="forgot-password" href="{{action('RemindersController@getRemind')}}">{{Lang::get('users.forgotPassword')}}</a>

</div>
<!-- end content -->
@stop