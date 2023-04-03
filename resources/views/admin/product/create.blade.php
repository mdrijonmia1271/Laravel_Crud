@extends('layout')
@section('title')
    Add Product Page
@endsection
@section('body')
    <div style="margin-top: 50px" class="max-w-7xl mx-auto t-10px">
        <div class="body_header">
            <h1>Add Product</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-4 m-auto mb-5">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <a href="{{ route('product.index') }}" style="margin-bottom: 9px" class="btn btn-outline-primary">Back
                        to home</a>
                    <div id="add_category_form">
                        <form class="" action="{{ route('product.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="add-category">Add Product</div>

                            {{-- {{ print_r($errors->all()) }} --}}
                            <div class="mb-3 form-group">
                                <label class="mb-2">Category Name</label>
                                <select class="form-control" name="category_id">
                                    <option value="">-Select One-</option>
                                    @foreach ($active_categories as $active_category)
                                        <option value="{{ $active_category->id }}">{{ $active_category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label class="mb-2">Product Name</label>
                                <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name"
                                    value="{{ old('product_name') }}">
                                @error('product_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">Product Short Description</label>
                                <textarea class="form-control" name="product_short_description" id="" rows="3">{{ old('product_long_description') }}</textarea>
                                @error('product_short_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">Product Long Description</label>
                                <textarea class="form-control" name="product_long_description" id="" rows="3">{{ old('product_long_description') }}</textarea>
                                @error('product_long_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label class="mb-2">Product Price</label>
                                <input type="text" class="form-control" name="product_price" placeholder="Enter Product Price"
                                    value="{{ old('product_price') }}">
                                @error('product_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label class="mb-2">Product Quantity</label>
                                <input type="text" class="form-control" name="product_quantity" placeholder="Enter Product Quantity"
                                    value="{{ old('product_quantity') }}">
                                @error('product_quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label class="mb-2">Alert Quantity</label>
                                <input type="text" class="form-control" name="product_alert_quantity" placeholder="Enter Alert Quantity"
                                    value="{{ old('product_alert_quantity') }}">
                                @error('product_alert_quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">Photo</label>
                                <input type="file" name="product_thambnail_photo" class="form-control">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-outline-primary">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
