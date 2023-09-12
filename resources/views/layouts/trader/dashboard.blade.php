<x-dashboard>

        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card corona-gradient-card">
              <div class="card-body py-0 px-0 px-sm-3">
               @auth('web')
               @if (! Auth::user()->store_id)
               <div class="row align-items-center">
                <div class="col-4 col-sm-3 col-xl-2">
                  <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                </div>
                <div class="col-5 col-sm-7 col-xl-8 p-0">

                  <h4 class="mb-1 mb-sm-0">Welcome dear to the site {{config('app.name')}}</h4>
                  <p class="mb-0 font-weight-normal d-none d-sm-block">{{Auth::user()->name}}, you can now create your own store directly by clicking on the create store button</p>
                </div>
                <div class="col-3 col-sm-2 col-xl-2 ps-0 text-center">
                  <span>
                    <a href="{{route('store.create')}}"  class="btn btn-outline-light btn-rounded get-started-btn">Create store now</a>
                  </span>
                </div>
              </div>
               @endif
               @endauth
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-sm-4 grid-margin">
            <div class="card">
              <div class="card-body">
                <h5>Product</h5>
                <div class="row">
                  <div class="col-8 col-sm-12 col-xl-8 my-auto">
                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                      <h2 class="mb-0">{{App\Models\Product::where('store_id',Auth::user()->store_id)->count()}}</h2>
                      <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                    </div>
                    <h6 class="text-muted font-weight-normal"></h6>
                  </div>
                  <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                    <i class="icon-lg mdi mdi-codepen text-primary ms-auto"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4 grid-margin">
            <div class="card">
              <div class="card-body">
                <h5>Order</h5>
                <div class="row">
                  <div class="col-8 col-sm-12 col-xl-8 my-auto">
                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                      <h2 class="mb-0">{{App\Models\Order::where('store_id',Auth::user()->store_id)->count()}}</h2>
                      <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                    </div>
                    <h6 class="text-muted font-weight-normal"> </h6>
                  </div>
                  <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                    <i class="icon-lg mdi mdi-wallet-travel text-danger ms-auto"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4 grid-margin">
            <div class="card">
              <div class="card-body">
                <h5>Message</h5>
                <div class="row">
                  <div class="col-8 col-sm-12 col-xl-8 my-auto">
                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                      <h2 class="mb-0">{{App\Models\Chat::where('recipient_user_id',Auth::user()->id)->count()}}</h2>

                    </div>
                  </div>
                  <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                    <i class="icon-lg mdi mdi-monitor text-success ms-auto"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row ">
          <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Order Status</h4>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>

                                 <th> # </th>
                                 <th> {{ __('User') }} </th>
                                <th> {{ __('Order No') }} </th>
                                <th> {{ __('Status') }} </th>
                                <th> {{ __('Payment method') }} </th>
                                <th> {{ __('tax') }} </th>
                                <th> {{ __('discount') }} </th>
                                <th> {{ __('Start Date') }} </th>
                                <th>{{__("Payment Status")}}</th>
                      </tr>
                    </thead>
                    <tbody>
                     @forelse ($orders as $order)
                     <tr>
                        <td> {{ $loop->index+1 }} </td>
                        <td>
                          <img src="{{$order->user->profile->image_url}}" alt="image" />
                          <span class="ps-2">{{$order->user->name}}</span>
                        </td>
                            <td> {{ $order->number }} </td>
                            <td> {{ $order->status }} </td>
                            <td> {{ $order->payment_method }} </td>
                            <td> {{ $order->tax }} </td>
                            <td> {{ $order->discount }} </td>
                            <td> {{ $order->created_at->diffForHumans() }} </td>
                            <td>                            <div class="badge badge-outline-success">{{$order->payment_status}}</div>
                            </td>



                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">{{ __('No Orders defined.') }}</td>
                        </tr>
                    @endforelse

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


</x-dashboard>
