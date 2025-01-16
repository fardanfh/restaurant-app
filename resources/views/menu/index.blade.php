@extends('base')

@section('title', 'Menu')

@section('header_title', 'Menu')

@section('content')
    <div class="page-heading">
        <h3>Data Menu</h3>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Menu</h5>
            @if (session('success'))
                <div style="color: green;">
                    {{ session('success') }}
                </div>
            @endif
            <a href="{{ route('menu.create') }}" class="btn icon btn-success float-end">Add Menu</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $index => $menu)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $menu->name }}</td>
                            <td>{{ number_format($menu->price, 2) }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" width="100">
                            </td>
                            <td>
                                <a href="{{ route('menu.edit', $menu->id) }}" class="btn icon btn-primary"><i
                                    class="bi bi-pencil"></i></a>
                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn icon btn-danger"><i
                                        class="bi bi-x"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
