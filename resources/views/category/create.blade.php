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
                    <form class="form form-horizontal" action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <input type="text" id="first-name-horizontal" class="form-control" name="name"
                                        placeholder="Category Name" required>
                                </div>

                                <div class="col-sm-12 d-flex justify-content-start">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
