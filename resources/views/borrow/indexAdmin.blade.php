@extends('layouts.templateAdmin')
@section('content')
    <div class="main-content">
        <div id="admin-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h2 class="admin-heading">Book Borrow List</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('borrowAdmin') }}">
                            <div class="input-group mb-3 ">
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                                    aria-describedby="button-addon2" name="search" value="{{ request('search') }}">
                                <button class="btn btn-danger" type="submit" id="button-addon2">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <th>No</th>
                            <th>Book Name</th>
                            {{-- <th>Category</th> --}}
                            <th>User</th>
                            {{-- <th>Publisher</th> --}}
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($borrows as $borrow)
                                <tr class="tr-shadow">
                                    {{-- <td>{{ $borrow->id }}</td> --}}
                                    <td>{{ $borrows->count() * ($borrows->currentPage() - 1) + $loop->iteration }}</td>
                                    {{-- <td>{{ $borrow->name }}</td> --}}
                                    {{-- <td>{{ $borrow->category->name }}</td> --}}
                                    <td>{{ $borrow->book->name }}</td>
                                    <td>{{ $borrow->user->name }}</td>
                                    <td>
                                        @if ($borrow->book->status_id == 1)
                                            <span class='status--process'> {{ $borrow->book->status->status }} </span>
                                        @elseif($borrow->book->status_id == 2)
                                            <span class='status--denied'>{{ $borrow->book->status->status }}</span>
                                        @else
                                            <span class='text-warning'>Want To Borrow</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            @if ($borrow->book->status_id == 3)
                                                <div class="mx-3">
                                                    <form action="{{ route('borrow.acc', $borrow) }}" method="post"
                                                        class="form-hidden" id="return">
                                                        @csrf
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="ACC"><i class="fas fa-check"></i></button>
                                                    </form>
                                                </div>
                                            @endif
                                            <form action="{{ route('borrow.update', $borrow) }}" method="post"
                                                class="form-hidden" id="return">
                                                @csrf
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Return"><i class="fas fa-undo"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">No Books Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="py-2">
                        {{ $borrows->links('vendor/pagination/bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
