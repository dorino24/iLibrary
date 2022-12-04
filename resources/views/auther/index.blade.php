@extends('layouts.template')
@section('content')
    <div class="main-content">
        <div id="admin-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h2 class="admin-heading">All Authors</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('authors') }}">
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
                            <th>Author Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($authors as $auther)
                                <tr>
                                    <td>{{ $authors->count() * ($authors->currentPage() - 1) + $loop->iteration }}</td>
                                    <td>{{ $auther->name }}</td>
                                    <td class="edit">
                                        <a href="/books?auther={{ $auther->name }}" class="btn btn-success">Search</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Authors Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="py-2">
                        {{ $authors->links('vendor/pagination/bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
