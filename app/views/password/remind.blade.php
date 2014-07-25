@extends('layouts.master')
@section('content')

@if(Session::get('error'))
<p class="message error">
  {{ Session::get('error') }}
</p>
@endif

@if(Session::get('status'))
<p class="message status">
  {{ Session::get('status') }}
</p>
@endif

<form action="{{ action('RemindersController@postRemind') }}" method="POST">

    {{ Form::label('email', Lang::get('users.email')) }}
    {{ Form::text('email', Input::old('email'), array('placeholder' => 'email@email.com')) }}

    <input type="submit" value="Send Reminder">
</form>

@stop