@extends('app')
@section('content')
{{-- @auth
<p>Welcome <b>{{ Auth::user()->name }}</b></p>
<a class="btn btn-primary" href="{{ route('password') }}">Change Password</a>
<a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
@endauth --}}
{{-- @guest --}}
<!-- <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
<a class="btn btn-info" href="{{ route('register') }}">Register</a> -->
<div class="container"><br>
    <div class="col-md-4 col-md-offset-4">
        <h2 class="text-center"><br>LOGIN | TUK - BTS TABALAR</h3>
        <hr>
        @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('login.action') }}" method="post">
        @csrf
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" type="username" name="username" value="{{ old('username') }}" placeholder="username" autofocus/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" name="password" placeholder="password"/>
            </div>
            <button type="submit" class="btn btn-success btn-block">Log In</button>
            <hr>
            
        </form>
    </div>
</div>
{{-- @endguest --}}
@endsection