@extends('layouts.templateAdmin')
@section('content')
    <div class="main-content">
        <div id="admin-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h2 class="admin-heading">Update Book</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-md-3 col-md-6">
                        <form class="yourform" action="{{ route('book.update', $book->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Book Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Book Name" name="name" value="{{ $book->name }}">
                                @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Author</label>
                                <select class="form-control @error('auther_id') is-invalid @enderror " name="author_id">
                                    <option value="">Select Author</option>
                                    @foreach ($authors as $auther)
                                        @if ($auther->id == $book->auther_id)
                                            <option value="{{ $auther->id }}" selected>{{ $auther->name }}</option>
                                        @else
                                            <option value="{{ $auther->id }}">{{ $auther->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('auther_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Publisher</label>
                                <select class="form-control @error('publisher_id') is-invalid @enderror "
                                    name="publisher_id">
                                    <option value="">Select Publisher</option>
                                    @foreach ($publishers as $publisher)
                                        @if ($publisher->id == $book->publisher_id)
                                            <option value="{{ $publisher->id }}" selected>{{ $publisher->name }}</option>
                                        @else
                                            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('publisher_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control @error('status_id') is-invalid @enderror " name="status_id">
                                    <option value="">Status</option>
                                    @foreach ($statuses as $status)
                                        @if ($status->id == $book->status_id)
                                            <option value="{{ $status->id }}" selected>
                                                {{ $status->status }}
                                            </option>
                                        @else
                                            <option value="{{ $status->id }}">{{ $status->status }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('status_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="submit" name="save" class="btn btn-primary" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
