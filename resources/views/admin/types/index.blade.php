@include('layouts.admin')

@section('content')

    <div class="container">
        <h1>Types list</h1>
        <a class="btn btn-primary" href="{{ route('admin.types.create') }}">New type</a>
    </div>
    <div class="container">
        @include('partials.session-messages')

        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($types as $type)
                        <tr class="">
                            <td scope="row">{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.types.edit', $type) }}">Edit</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $type->id }}">
                                    Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $type->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $type->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId-{{ $type->id }}">
                                                    Attention! Deleting: {{ $type->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                🤪 Attention!! You are about to delete this record. The operation is
                                                DESCRUCTIVE!!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <form action="{{ route('admin.types.destroy', $type) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Confirm
                                                    </button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td scope="row" colspan="3">No types</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
