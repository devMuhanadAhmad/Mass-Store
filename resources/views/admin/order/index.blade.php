<x-dashboard>
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title ">{{ __('List Order') }}</h4>
                <x-flash-message />

                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> {{ __('Number') }} </th>
                                <th> {{ __('Status') }} </th>
                                <th> {{ __('Payment method') }} </th>
                                <th>{{__("payment_status")}}</th>
                                <th> {{ __('shipping') }} </th>
                                <th> {{ __('tax') }} </th>
                                <th> {{ __('discount') }} </th>
                                <th> {{ __('created_at') }} </th>




                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td> {{ $loop->index+1 }} </td>
                                    <td> {{ $order->number }} </td>
                                    <td> {{ $order->status }} </td>
                                    <td> {{ $order->payment_method }} </td>
                                    <td> {{ $order->payment_status }} </td>
                                    <td> {{ $order->shipping }} </td>
                                    <td> {{ $order->tax }} </td>
                                    <td> {{ $order->discount }} </td>
                                    <td> {{ $order->created_at->diffForHumans() }} </td>



                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">{{ __('No Orders defined.') }}</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <p class="mb-4"></p>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
    </x-front>
