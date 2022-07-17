@extends('layouts.admin')
@section('title','Products Table')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12 col-sm-6 col col-lg-12">
            <div class="card">
                <h5 class="card-header">Product Page</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap">
                                <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Unit</th>
                                        <th>Status</th>
                                        <th>*</th>
                                        </tr>
                                </thead>
                            @foreach ($products as $product)
                                <tbody>
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price, 0, ",",".") }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->unit }}</td>
                                        <td>{{ $product->status == '0' ? 'Not Available' : 'Available' }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button
                                                type="button"
                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown"
                                                >
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('edit', $product->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <form action="{{ route('delete', $product->id) }}" class="d-inline" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i>Delete</button>
                                                </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection
