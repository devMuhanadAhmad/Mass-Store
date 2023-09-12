<x-dashboard>

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{__("List Store")}}</h4>
                @if (session()->has('success'))
                <div class="alert alert-success mt-1" role="alert">
                    {{ session('success') }}
                </div>
            @endif
           

                <div class="table-responsive">
              <table class="table ">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> {{__("Image")}} </th>
                    <th> {{__("Name Store")}}  </th>
                    <th> {{__("Name Owner")}}  </th>
                    <th> {{__("Status")}}  </th>
                    <th> {{__("Edit")}}  </th>
                    <th> {{__("Delete")}}  </th>

                  </tr>
                </thead>
                <tbody>
                    @forelse ( $stores as $store)
                       <tr>
                        <td> {{$loop->index+1}} </td>
                        <td> <img src="{{$store->image_url}}" style="width=200px; height=200px" alt="{{$store->slug}}"> </td>
                        <td> {{$store->name}} </td>
                       <td>
                        {{$store->user->name}}
                       </td>
                       <td>
                        @if ($store->status == 'active')
                            <p class="text-success mt-3">Active</p>
                        @else
                            <p class="text-danger mt-3">Inactive</p>
                        @endif

                        </td>
                       <td><a href="{{route('store.edit',$store->id)}}"><button class="btn btn-outline-success btn-fw">{{__("Edit")}}</button></a> </td>
                       <td>
                           <form action="{{route('store.destroy',$store->id)}}" method="post">
                               @csrf
                               @method('delete')
                               <button class="btn btn-outline-danger btn-fw">{{__("Delete")}}</button>
                           </form>
                       </td>
                       </tr>
                 @empty
                 <tr>
                    <td colspan="9">{{__("No store defined.")}}</td>
                </tr>
                 @endforelse

                </tbody>
              </table>
                 <p class="mb-4"></p>
                 {{ $stores->links() }}
            </div>
          </div>
        </div>



</x-dashboard>
