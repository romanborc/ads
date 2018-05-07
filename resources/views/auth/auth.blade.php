@extends('layouts.app')

@section('content')
<div class="login-wrapper">
    <div class="box"> 
        <div class="content-wrap">
            <form method='POST' action='/login'>
            {{ csrf_field() }}
    
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Your Name">
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" required placeholder="Your password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        LOG IN
                    </button>
                </div>
                @foreach($errors->all() as $error)
                        <span class="help-block">
                            <strong>{{ $error }}</strong>
                        </span>
                @endforeach
            </form>
        </div>
    </div>
</div>
@endsection