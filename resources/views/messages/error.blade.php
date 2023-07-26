@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif
