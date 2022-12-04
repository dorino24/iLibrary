@extends('layouts.templateAdmin')
@section('content')
    <div class="main-content">
        <div id="admin-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h2 class="admin-heading">All Publisher</h2>
                    </div>
                    <div class="offset-md-7 col-md-2">
                        <a class="add-new" href="{{ route('publisher.create') }}">Add Publisher</a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('publishersAdmin') }}">
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
                            <th>Publisher Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @forelse ($publishers as $publisher)
                                <tr>
                                    <td>{{ $publishers->count() * ($publishers->currentPage() - 1) + $loop->iteration }}</td>
                                    <td>{{ $publisher->name }}</td>
                                    <td class="edit">
                                        <a href="{{ route('publisher.edit', $publisher) }}" class="btn btn-success">Edit</a>
                                    </td>
                                    <td class="delete">
                                        <form action="{{ route('publisher.destroy', $publisher) }}" method="post"
                                            class="form-hidden">
                                            <button class="btn btn-danger delete-author">Delete</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Publisher Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="py-2">
                        {{ $publishers->links('vendor/pagination/bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
