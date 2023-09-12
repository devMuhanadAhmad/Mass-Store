<x-dashboard>
    <div class="col-12 grid-margin stretch-card ">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{__("Add Settings")}}</h4>
            <form action="{{route('settings')}}" method="post"  enctype="multipart/form-data" class="forms-sample">
                @csrf
             @include('admin.config._form')
            </form>
          </div>
        </div>
      </div>
</x-dashboard>
