@extends('layouts.master')
@section('content')

@if(Session::get('error'))
<p class="message error">
  {{ Session::get('error') }}
</p>
@endif

<form action="{{ action('RemindersController@postReset') }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">

    {{ Form::label('email', Lang::get('users.email')) }}
    {{ Form::text('email', Input::old('email'), array('placeholder' => 'email@email.com')) }}

    {{ Form::label('password', Lang::get('users.password')) }}
    {{ Form::password('password') }}

    {{ Form::label('password confirmation', Lang::get('users.confirmPassword')) }}
    {{ Form::password('password_confirmation') }}

    <input type="submit" value="Reset Password">
</form>
@stop