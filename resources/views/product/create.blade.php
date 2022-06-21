@extends('layouts.admin')
@section('title','Create Product')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="text-center">Create Product</h5>
            </div>
            <div class="card-body">
            <form action="{{ route('store-product') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label fw-bold" for="name">Name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Input Product Name" />
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
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                </div>
            </div>
        </div>
            <div class="mt-3 text-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
            </form>
    </div>
@endsection
