@extends('layouts.master')
@section('content')

<div class="form content signup">
{{ Form::open(array('url' => 'users/signup')) }}
<h1>@lang('users.signup')</h1>

<div class="left-col">
@if($errors->count() > 0)
<p class="message error">
    {{ $errors->first('email') }}
    {{ $errors->first('name') }}
    {{ $errors->first('password') }}
    {{ $errors->first('password_confirmation') }}
</p>
@endif

<p>
    {{ Form::label('email', Lang::get('users.email')) }}
    {{ Form::text('email', Input::old('email'), array('placeholder' => 'email@email.com')) }}
</p>

<p>
    {{ Form::label('first name', Lang::get('users.firstName')) }}
    {{ Form::text('first_name', Input::old('first_name'), array('placeholder' => Lang::get('users.firstNamePlaceholder'))) }}
</p>

<p>
    {{ Form::label('last name', Lang::get('users.lastName')) }}
    {{ Form::text('last_name', Input::old('last_name'), array('placeholder' => Lang::get('users.lastNamePlaceholder'))) }}
</p>

<p>
    {{ Form::label('password', Lang::get('users.password')) }}
    {{ Form::password('password') }}
</p>
<p>
    {{ Form::label('password_confirmation', Lang::get('users.confirmPassword')) }}
    {{ Form::password('password_confirmation') }}
</p>


<p>{{ Form::submit(Lang::get('users.signup'), array('class' => 'big-btn')) }}</p>

</div>
<!-- end left col -->

<div class="right-col">
<p>{{Lang::get('users.socialSignupLabel')}}</p>
<a class="big-btn login-twitter" href="{{action('AccountController@getLoginWithTwitter')}}">{{Lang::get('users.signupWithTwitter')}}</a>
<br>
<a class="big-btn login-facebook" href="{{action('AccountController@getLoginWithFacebook')}}">{{Lang::get('users.signupWithFacebook')}}</a>
<br>
</div>
<!-- end right col -->

{{ Form::close() }}


</div>

@stop