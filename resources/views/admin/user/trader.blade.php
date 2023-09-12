<x-dashboard>
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mt-5">{{__("List Users")}}</h4>
                <x-flash-message />
                <a href="{{route('user.create')}}"><button class="btn btn-outline-success btn-fw">{{__("Add Category")}}</button></a>            </p>
            <div class="table-responsive">
              <table class="table ">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> {{__("Image")}} </th>
                    <th> {{__("Name")}}  </th>
                    <th> {{__("Account")}}  </th>
                    <th> {{__("Status")}}  </th>
                    <th> {{__("Edit")}}  </th>
                    <th> {{__("Delete")}}  </th>

                  </tr>
                </thead>
                <tbody>
                    @forelse ( $users as $user)
                       <tr>
                        <td> {{$loop->index+1}} </td>
                       <td> <img src="{{$user->image_url}}" style="width=200px; height=200px" alt="{{$user->slug}}"> </td>
                       <td> {{$user->name}} </td>
                       <td>
                        @if ($user->type_account == 'salesman')
                        <p class="text-success mt-3">Salesman</p>
                        @else
                        <p class="text-primary mt-3">Trader</p>
                        @endif
                       </td>
                       <td>
                        @if ($user->status == 'active')
                            <p class="text-success mt-3">Active</p>
                        @else
                            <p class="text-danger mt-3">Inactive</p>
                        @endif

                        </td>
                       <td><a href="{{route('user.edit',$user->id)}}"><button class="btn btn-outline-success btn-fw">{{__("Edit")}}</button></a> </td>
                       <td>
                           <form action="{{route('user.destroy',$user->id)}}" method="post">
                               @csrf
                               @method('delete')
                               <button class="btn btn-outline-danger btn-fw">{{__("Delete")}}</button>
                           </form>
                       </td>
                       </tr>
                 @empty
                 <tr>
                    <td colspan="9">{{__("No Users defined.")}}</td>
                </tr>
                 @endforelse

                </tbody>
              </table>
                 <p class="mb-4"></p>
              {{ $users->links() }}
            </div>
          </div>
        </div>

</x-dashboard>
