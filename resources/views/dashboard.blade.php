@if (Auth::user()->type_account == 'admin')
@include('layouts.admin.dashboard')
@endif

@if (Auth::user()->type_account == 'trader')
@include('layouts.trader.dashboard')
@endif
