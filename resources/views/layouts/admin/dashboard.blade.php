<x-dashboard>

        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card corona-gradient-card">
             <h3 class="mt-1 mp-1 pl-4">Dashoard</h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                      <h3 class="mb-0">{{App\Models\Store::count()}}</h3>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="icon icon-box-success ">
                      <span class="mdi mdi-arrow-top-right icon-item"></span>
                    </div>
                  </div>
                </div>
                <h6 class="text-muted font-weight-normal">Stores</h6>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                      <h3 class="mb-0">{{App\Models\User::where('type_account','admin')->count()}}</h3>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="icon icon-box-success">
                      <span class="mdi mdi-arrow-top-right icon-item"></span>
                    </div>
                  </div>
                </div>
                <h6 class="text-muted font-weight-normal">Admin</h6>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-0">{{App\Models\User::where('type_account','trader')->count()}}</h3>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="icon icon-box-danger">
                      <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                    </div>
                  </div>
                </div>
                <h6 class="text-muted font-weight-normal">Trader</h6>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                        <h3 class="mb-0">{{App\Models\User::where('type_account','salesman')->count()}}</h3>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="icon icon-box-success ">
                      <span class="mdi mdi-arrow-top-right icon-item"></span>
                    </div>
                  </div>
                </div>
                <h6 class="text-muted font-weight-normal">Salesman</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

        </div>
        <div class="row">
            <div class="col-sm-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5>Products</h5>
                  <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                      <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <h2 class="mb-0">{{App\Models\Product::count()}}</h2>
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
                  <h5>Orders</h5>
                  <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                      <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <h2 class="mb-0">{{App\Models\Order::count()}}</h2>
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
                  <h5>Users</h5>
                  <div class="row">
                    <div class="col-8 col-sm-12 col-xl-8 my-auto">
                      <div class="d-flex d-sm-block d-md-flex align-items-center">
                        <h2 class="mb-0">{{App\Models\User::count()}}</h2>

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
                       @forelse ($lastOrder as $order)
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

        <div class="row">
            <title>User Regiser</title>
            <div class="col-md-12  ">
            <div class="chart-container">
                <div class="pie-chart-container">
                  <canvas id="pie-chart"></canvas>
                </div>
            </div>


        </div>

@push('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@endpush
@push('js')

<script>
    $(function(){
        //get the pie chart canvas
        var cData = JSON.parse(`<?php echo $chart_data; ?>`);
        var ctx = $("#pie-chart");

        //pie chart data
        var data = {
          labels: cData.label,
          datasets: [
            {
              label: "Users Count",
              data: cData.data,
              backgroundColor: [
                "#DEB887",
                "#A9A9A9",
                "#DC143C",
                "#F4A460",
                "#2E8B57",
                "#1D7A46",
                "#CDA776",
              ],
              borderColor: [
                "#CDA776",
                "#989898",
                "#CB252B",
                "#E39371",
                "#1D7A46",
                "#F4A460",
                "#CDA776",
              ],
              borderWidth: [1, 1, 1, 1, 1,1,1]
            }
          ]
        };

        //options
        var options = {
          responsive: true,
          title: {
            display: true,
            position: "top",
            text: "Last Week Registered Users -  Day Wise Count",
            fontSize: 18,
            fontColor: "#555"
          },
          legend: {
            display: true,
            position: "bottom",
            labels: {
              fontColor: "#333",
              fontSize: 16
            }
          }
        };

        //create Pie Chart class object
        var chart1 = new Chart(ctx, {
          type: "pie",
          data: data,
          options: options
        });

    });
  </script>

@endpush
</x-dashboard>
