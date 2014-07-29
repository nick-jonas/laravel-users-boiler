@extends('layouts.master')
@section('content')

<div class="content form">
@if(Session::get('error'))
<p class="message error">
  {{ Session::get('error') }}
</p>
@endif

<form action="{{ action('RemindersController@postReset') }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">

    <p>
    {{ Form::label('email', Lang::get('users.email')) }}
    {{ Form::text('email', Input::old('email'), array('placeholder' => 'email@email.com')) }}
    </p>
    <p>
    {{ Form::label('password', Lang::get('users.password')) }}
    {{ Form::password('password') }}
    </p>
    <p>
    {{ Form::label('password confirmation', Lang::get('users.confirmPassword')) }}
    {{ Form::password('password_confirmation') }}
    </p>
    <input class="big-btn" type="submit" value="Reset Password">
</form>
</div>
@stop