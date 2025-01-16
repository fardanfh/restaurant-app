@extends('base')

@section('title', 'Category')

@section('header_title', 'Category')

@section('content')
    <div class="page-heading">
        <h3>Data Category</h3>

    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Data Category
            </h5>
            @if (session('success'))
                <div style="color: green;">
                    {{ session('success') }}
                </div>
            @endif
            <a href="{{ route('category.create') }}" class="btn icon btn-success float-end">Add Category</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn icon btn-primary"><i
                                        class="bi bi-pencil"></i></a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn icon btn-danger"><i class="bi bi-x"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
