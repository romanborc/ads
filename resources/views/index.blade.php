@extends('layouts.app')
@section('content')

<div class="row head">
    <div class="col-md-12">
        <h4>Закупки</h4>
    </div>
</div>
  
<div class="row create_ad">
    <div class="col-md-11 col-md-offset-5">
        <a href="/" class="btn btn-outline-primary float-right">Created Ad</a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>№</th>
                <th>Title</th>
                <th>Description</th>
                <th>Author name</th>
                <th>Created At</th>
                <th>Edit</th>
                </tr>
        </thead>
            
        <tbody>
                
        </tbody>
    </table>
</div>


@endsection