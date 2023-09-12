<x-dashboard>
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title ">{{ __('List roleusers') }}</h4>
                @if (\Session::has('success'))
                    <div class="alert alert-success mt-1" roleuser="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <a href="{{ route('roleuser.create') }}"><button
                        class="btn btn-outline-success btn-fw">{{ __('Add Role User') }}</button></a>
                <a href="{{ route('role.index') }}"><button
                        class="btn btn-outline-primary btn-fw">{{ __('Role') }}</button></a>
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th>{{ __('Name User') }}</th>
                                <th>{{ __('Name roleuser') }}</th>
                                <th> {{ __('Edit') }} </th>
                                <th> {{ __('Delete') }} </th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roleuser as $roleuser)
                                <tr>
                                    <td> {{ $loop->index + 1 }} </td>
                                    <td>{{ $roleuser->user->name }}</td>
                                    <td>{{ $roleuser->role->name }}</td>


                                    <td><a href="{{-- route('roleuser.edit', $roleuser->id) --}}"><button
                                                class="btn btn-outline-success btn-fw">{{ __('Edit') }}</button></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('roleuser.destroy', $roleuser->user_id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger btn-fw">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">{{ __('No role users defined.') }}</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <p class="mb-4"></p>
                    {{-- $roleuser->links() --}}
                </div>
            </div>
        </div>

        </x-dshboard>
