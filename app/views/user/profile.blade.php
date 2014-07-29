@extends('layouts.master')
@section('content')

<div class="content">
  @if($data->avatar_url)
    <img src="{{$data->avatar_url}}" alt="" class="avatar_url">
  @else
    <h5>(no avatar)</h5>
  @endif
  <h1>{{$data->first_name}} {{$data->last_name}}</h1>
  @if($data->email)
    <h2>{{$data->email}}</h2>
  @endif
  @if($data->social_type > 0)
    @if($data->social_type == 1)
      <h2><a href="https://twitter.com/account/redirect_by_id/{{$data->social_id}}">{{Lang::get('users.socialtype'.$data->social_type)}} Account</a></h2>
    @else
      <h2><a href="https://www.facebook.com/{{$data->social_id}}">{{Lang::get('users.socialtype'.$data->social_type)}} Account</a></h2>
    @endif
  @endif
</div>

@stop