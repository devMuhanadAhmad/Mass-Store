<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Category</h4>
            <form class="forms-sample" wire:submit.prevent="update">
                @csrf
                @include('admin.categories._form')
            </form>
        </div>
    </div>
</div>
