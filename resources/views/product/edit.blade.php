@extends('layouts.admin')
@section('title','Edit Product')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="text-center">Edit Product</h5>
            </div>
            <div class="card-body">
            <form action="{{ route('update-product', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label fw-bold" for="name">Name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Input Product Name" value="{{ $product->name }}"/>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 fw-bold col-form-label" for="price">Price :</label>
                <div class="col-sm-10">
                <input
                    type="number"
                    class="form-control"
                    id="price"
                    name="price"
                    placeholder="Input Price Product"
                    value="{{ $product->price }}"
                />
                </div>
            </div>
            <div class="row mb-3">
                    <label class="col-sm-2 fw-bold col-form-label" for="stock">Stock :</label>
                <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                        <input
                        type="number"
                        id="stock"
                        class="form-control"
                        placeholder="Input Stok Product"
                        name="stock"
                        value="{{ $product->stock }}"
                        />
                    </div>
                </div>
            </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label fw-bold" for="unit">Unit :</label>
            <div class="col-sm-10">
                <div class="input-group input-group-merge">
                    <input
                    type="text"
                    id="unit"
                    class="form-control"
                    placeholder="Input Unit Product"
                    name="unit"
                    value="{{ $product->unit }}"
                    />
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label fw-bold" for="status">Status :</label>
            <div class="col-sm-10">
                <div class="input-group input-group-merge">
                    <select name="status" id="status" class="form-control">
                        <option value="">--Choose Status--</option>
                        <option value="1" {{ $product->status == 1 ? 'selected' : ''}}>Available</option>
                        <option value="0" {{ $product->status == 0 ? 'selected' : ''}}>Not Available</option>
                    </select>
                </div>
            </div>
        </div>
            <div class="mt-3 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
            </form>
    </div>
@endsection
