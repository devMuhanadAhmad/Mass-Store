<x-dashboard>
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title ">{{ __('List Categories') }}</h4>
                @if (\Session::has('success'))
                    <div class="alert alert-success mt-1" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @can('product.create')
                    <a href="{{ route('category.create') }}"><button
                            class="btn btn-outline-success btn-fw">{{ __('Add Category') }}</button></a>
                @endcan

                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> {{ __('Name') }} </th>
                                <th> {{ __('Category') }} </th>
                                <th> {{ __('Status') }} </th>
                               @can('category.update')
                               <th> {{ __('Edit') }} </th>
                               @endcan
                               @can('category.delete')
                               <th> {{ __('Delete') }} </th>
                               @endcan

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td> {{ $loop->index + 1 }} </td>
                                    <td> {{ $category->name }} </td>
                                    <td>
                                        @if ($category->parent->name == 'Primare Category')
                                            <p class="text-success mt-3">Primare Category</p>
                                        @else
                                            <p class="text-primary mt-3">{{ $category->parent->name }}</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($category->status == 'active')
                                            <p class="text-success mt-3">Active</p>
                                        @else
                                            <p class="text-danger mt-3">Inactive</p>
                                        @endif

                                    </td>
                                    @can('category.update')
                                        <td><a href="{{ route('category.edit', $category->id) }}"><button
                                                    class="btn btn-outline-success btn-fw">{{ __('Edit') }}</button></a>
                                        </td>
                                    @endcan

                                    @can('category.delete')
                                        <td>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline-danger btn-fw">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">{{ __('No categories defined.') }}</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <p class="mb-4"></p>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>

        </x-dshboard>
