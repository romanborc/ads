@extends('layouts.app')

@section('content')
<div clas='row marketing'>
    <div class='row'>
        <div class='col-md-8'>
            <div class="row">
                <h3>{{ $ad->title }}</h3>
                <p>{{ $ad->description }}</p>
            </div>
            <div class="row">
                <p>author name: {{ $ad->users->name }}</p>
            </div>
            <div class="row">
                <p>created on: {{ $ad->created_at->toTimeString() }}</p>
            </div>
            <div class="row">
                <p>updated on: {{ $ad->updated_at->toTimeString() }}</p>
            </div>
        </div> 
        <div class="col-md-4">
            @if(Auth::check() && $ad->users_id == Auth::id())
                <form method="post" action="/ads/{{ $ad->id }}/remove">
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger">Delete</button>

                </form>
                <form method="get" action="/ads/{{ $ad->id }}/edit">
                        <button type="submit" class="btn btn-warning">Edit</button>
                </form>  
            @endif  
        </div>  
    </div>
</div>
@endsection