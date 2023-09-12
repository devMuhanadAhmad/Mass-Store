
@if ($curr_page == 'index')
@include('admin.store.index')
@endif
@if ($curr_page == 'create')
@include('admin.store.create')
@endif
@if ($curr_page == 'edit')
@include('admin.store.edit')
@endif


