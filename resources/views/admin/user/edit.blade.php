<x-dashboard>
    <div class="col-12 grid-margin stretch-card ">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{__("Edit User")}}</h4>
            <form action="{{route('user.update',$user->id)}}" method="post"  enctype="multipart/form-data" class="forms-sample">
                @csrf
                @method('put')
             @include('admin.user._form')
            </form>
          </div>
        </div>
      </div>
</x-dashboard>
