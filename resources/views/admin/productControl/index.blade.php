<x-dashboard>
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title ">{{ __('List Products') }}</h4>
                <x-flash-message />

                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> {{ __('Image') }} </th>
                                <th> {{ __('Name') }} </th>
                                <th> {{ __('Category') }} </th>
                                <th> {{ __('Status') }} </th>
                                <th> {{ __('Price') }} </th>
                                <th> {{ __('Quantity') }} </th>
                                <th> {{ __('Edit') }} </th>
                                <th> {{ __('Delete') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td> {{ $loop->index + 1 }} </td>
                                    <td> <img src="{{ $product->image_url }}" style="width=200px; height=200px"
                                            alt="{{ $product->slug }}"> </td>
                                    <td> {{ $product->name }} </td>
                                    <td>
                                        @if ($product->category->name == 'Primare Category')
                                            <p class="text-success mt-3">Primare Category</p>
                                        @else
                                            <p class="text-primary mt-3">{{ $product->category->name }}</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product->status == 'active')
                                            <p class="text-success mt-3">Active</p>
                                        @else
                                            <p class="text-danger mt-3">Inactive</p>
                                        @endif
                                    </td>
                                    <td> {{ $product->price }} </td>
                                    <td> {{ $product->quantity }} </td>
                                    <td><a href="{{ route('product.edit', $product->id) }}"><button
                                                class="btn btn-outline-success btn-fw">{{ __('Edit') }}</button></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger btn-fw">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">{{ __('No Producs defined.') }}</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <p class="mb-4"></p>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
    </x-front>
