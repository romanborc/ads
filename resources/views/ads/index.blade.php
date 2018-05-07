@extends('layouts.app')

@section('content')
<h3 class="text-muted">List of Ads</h3>
@if(Auth::check() == true)
    <h4 class="text-muted">Welcome {{ Auth::user()->name }}</h4>
@endif

<div class="row">
    @foreach($ads as $ad)
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <p class="card-text">ID {{ $ad->id }}</p>
                    <a href='/ad/{{ $ad->id }}'><h3>{{ $ad->title }}</h3></a>
                    <p class="card-text">Descriptions {{ $ad->description }}</p>
                    <p class="card-text">Author {{ $ad->users->name }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href='/ad/{{ $ad->id }}' class="btn btn-sm btn-outline-secondary">View</a>
                            @if(Auth::check() && $ad->users_id == Auth::id())
                                <form method="post" action="/ads/{{ $ad->id }}/remove">
                                {{ method_field('DELETE') }}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                </form>
                                <form method="get" action="/ads/{{ $ad->id }}/edit">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </form>     
                            @endif
                        </div>
                        <small class="text-muted">Cerated At {{ $ad->created_at->toTimeString()  }}</small>
                        <small class="text-muted">Updated At {{ $ad->updated_at->toTimeString()  }}</small>
                    </div>
                </div>
            </div>
        </div>
@endforeach
</div>

{{ $ads->links() }}

@endsection