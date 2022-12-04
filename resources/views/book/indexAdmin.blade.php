@extends('layouts.templateAdmin')
@section('content')
    <div class="main-content">
        <div id="admin-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h2 class="admin-heading">All Books</h2>
                    </div>
                    <div class="offset-md-7 col-md-2">
                        <a class="add-new" href="{{ route('book.create') }}">Add Book</a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('booksAdmin') }}">
                            @if (request('auther'))
                                <input type="hidden" name="auther" value="{{ request('auther') }}">
                            @endif
                            @if (request('publisher'))
                                <input type="hidden" name="publisher" value="{{ request('publisher') }}">
                            @endif
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
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr class="tr-shadow">
                                    <td>{{ $books->count() * ($books->currentPage() - 1) + $loop->iteration }}</td>
                                    <td>{{ $book->name }}</td>
                                    {{-- <td>{{ $book->category->name }}</td> --}}
                                    <td>{{ $book->auther->name }}</td>
                                    <td>{{ $book->publisher->name }}</td>
                                    <td>
                                        @if ($book->status_id == 1)
                                            <span class='status--process'>Available</span>
                                        @else
                                            <span class='status--denied'>Borrowed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            @if($book->status_id == 1)
                                            <form action="{{ route('book.order', $book) }}" method="post"
                                                class="form-hidden" id="order">
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Borrow" onclick="if(confirm('yes?') == true)
                                                    {
                                                        var btn = document.getElementById('order');
                                                        btn.setAttribute('type', 'submit');
                                                    }else{
                                                        var btn = document.getElementById('order');
                                                        btn.setAttribute('type', 'reset');
                                                    }
                                                    ">
                                                    <i class="zmdi zmdi-mail-send"></i></button>
                                                    @csrf
                                            </form>
                                            @endif
                                            <a href="{{ route('book.edit', $book) }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Edit">
                                                    <i class="zmdi zmdi-edit"></i></button>
                                            </a>
                                            <button>
                                                <form action="{{ route('book.destroy', $book) }}" method="post"
                                                    class="form-hidden" id="del">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Edit">
                                                        <i class="zmdi zmdi-delete"></i></button>
                                                    @csrf
                                                </form>

                                            </button>
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
                        {{ $books->links('vendor/pagination/bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
