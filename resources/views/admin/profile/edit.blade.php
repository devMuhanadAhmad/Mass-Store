<x-dashboard>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{__("Add Profile")}}</h4>
            <form  action="{{route("profile.update")}}" method="post" enctype="multipart/form-data" class="forms-sample">
                @csrf
                @method('patch')
             @include('admin.profile._form')
            </form>
          </div>
        </div>
      </div>
</x-dashboard>
