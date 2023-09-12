<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Category</h4>
            <form class="forms-sample" wire:submit.prevent="store" enctype="multipart/form-data">
                @csrf
                @include('admin.categories._form')
            </form>
        </div>
    </div>
</div>
