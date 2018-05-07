<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <a href="/" class="my-0 mr-md-auto font-weight-normal">Ads</a>
    <nav class="my-2 my-md-0 mr-md-3">
        @if(Auth::check())
            <a class="btn btn-success" href="/ad/edit">Create Ad</a>
        @endif
    </nav>
        @if(Auth::check() == false)
            <a class="btn btn-outline-primary" href="/login">Sign up</a>
        @endif
        @if(Auth::check())
            <a class="btn btn-outline-primary" href="/logout">Logout</a>
        @endif
</div>