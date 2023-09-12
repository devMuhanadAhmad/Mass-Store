<x-dashboard>
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title ">{{ __('List Messages') }}</h4>
                @if (\Session::has('success'))
                    <div class="alert alert-success mt-1" role="alert">
                        {{ session('success') }}
                    </div>
                @endif


                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> {{ __('send') }} </th>
                                <th> {{ __('res') }} </th>
                                <th> {{ __('Messages') }} </th>
                                <th> {{ __('Open') }} </th>
                                <th> {{ __('Delete') }} </th>


                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($chats as $chat)
                                <tr>
                                    <td> {{ $loop->index + 1 }} </td>
                                    <td> {{ $chat->send_user_id }} </td>
                                    <td> {{ $chat->recipient_user_id }} </td>
                                    <td> {{ $chat->message }} </td>
                                    <td>
                                            <button class="btn btn-outline-success btn-fw">{{ __('Open') }}</button>
                                    </td>
                                        <td>
                                            <form action="{{ route('front.chat.destroy', $chat->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline-danger btn-fw">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">{{ __('No Message defined.') }}</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <p class="mb-4"></p>

                </div>
            </div>
        </div>

        </x-dshboard>
