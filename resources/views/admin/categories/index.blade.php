@if ($page == 'index')
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('List Categories') }}</h4>
                @if (session()->has('success'))
                    <div class="alert alert-success mt-1" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <button class="btn btn-outline-success btn-fw"
                    wire:click="submit('create')">{{ __('Add Category') }}</button> </p>
             <div class="row">
                <div class="form-group col-6">
                    <input type="text" wire:model="search_name" class="form-control" id=""
                        placeholder="Name">
                </div>
                <div class="form-group col-6">
                    <input type="date" wire:model="search_created_at" class="form-control" id=""
                        placeholder="Name">
                </div>

             </div>
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> {{ __('Image') }} c</th>
                                <th> {{ __('Name') }} </th>
                                <th> {{ __('Category') }} </th>
                                <th> {{ __('Created At') }} </th>
                                <th> {{ __('Edit') }} </th>
                                <th> {{ __('Delete') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td> {{ $loop->index + 1 }} </td>
                                    <td> <img src="{{asset('storage/'.$category->image)}}"></td>
                                    <td> {{ $category->name }} </td>
                                    <td>
                                        @if ($category->parent->name == 'Primare Category')
                                            <p class="text-success mt-3">Primare Category</p>
                                        @else
                                            <p class="text-primary mt-3">{{ $category->parent->name }}</p>
                                        @endif
                                    </td>
                                    <td>{{ $category->created_at }}</td>
                                    <td><button wire:click="edit({{ $category->id }})"
                                            class="btn btn-outline-success btn-fw">{{ __('Edit') }}</button> </td>
                                    <td><button wire:click="delete({{ $category->id }})"
                                            class="btn btn-outline-danger btn-fw">{{ __('Delete') }}</button> </td>

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
@endif
