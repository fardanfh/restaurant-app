@extends('base')

@section('title', 'Category')

@section('header_title', 'Category')

@section('content')
    <div class="page-heading">
        <h3>Tambah Category</h3>
    </div>

    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" action="{{ route('menu.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-8 form-group">
                            <input type="text" name="name" class="form-control" placeholder="Menu Name" required>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="number" name="price" class="form-control" placeholder="Price" required>
                        </div>

                        <div class="col-md-8 form-group">
                            <select name="category_id" class="form-control" required>
                                <option value="">- Category -</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-8 form-group">
                            <input type="file" name="image" accept="image/*" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
