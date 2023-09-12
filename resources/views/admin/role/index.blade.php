<x-dashboard>
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title ">{{ __('List Roles') }}</h4>
                @if (\Session::has('success'))
                    <div class="alert alert-success mt-1" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <a href="{{ route('roleuser.index') }}"><button
                    class="btn btn-outline-danger btn-fw">{{ __('Back') }}</button></a> </p>

                <a href="{{ route('role.create') }}"><button
                        class="btn btn-outline-success btn-fw">{{ __('Add Role') }}</button></a> </p>

                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th>{{ __('Name Role') }}</th>
                                <th>{{ __('Number Use Users') }}</th>
                                <th> {{ __('Edit') }} </th>
                                <th> {{ __('Delete') }} </th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr>
                                    <td> {{ $loop->index + 1 }} </td>
                                    <td> {{ $role->name }} </td>
                                    <td> {{ $role->user_count }} </td>


                                    <td><a href="{{ route('role.edit', $role->id) }}"><button
                                                class="btn btn-outline-success btn-fw">{{ __('Edit') }}</button></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('role.destroy', $role->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger btn-fw">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">{{ __('No Roles defined.') }}</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <p class="mb-4"></p>
                    {{ $roles->links() }}
                </div>
            </div>
        </div>

        </x-dshboard>
