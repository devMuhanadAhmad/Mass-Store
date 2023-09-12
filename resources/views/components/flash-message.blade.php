@if (session()->has('success'))
<div class="alert alert-success mt-1" role="alert">
    {{ session('success') }}

</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger mmb-2" role="alert">
    {{ session('error') }}

</div>
@endif
