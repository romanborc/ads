@extends('layouts.app')

@section('content')
<div class="createAd-wrapper">
    <div class="box"> 
        <div class="content-wrap">
            <h3>Create Ad</h3>
            <div class="form-group">
                <form method="post" action="/ad/store">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="6" placeholder="Your Description"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form> 
                @foreach($errors->all() as $error)
                    <span class="help-block">
                    <strong>{{ $error }}</strong>
                    </span>
                @endforeach      
            </div>
        </div>
    </div>
</div>
@endsection