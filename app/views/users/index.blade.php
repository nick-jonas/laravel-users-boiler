@extends('layouts.master')
@section('content')

<h1>All Users</h1>
<ul>
  @foreach($users as $user)
    <li class="user">- {{$user->name}}</li>
  @endforeach
</ul>

@stop