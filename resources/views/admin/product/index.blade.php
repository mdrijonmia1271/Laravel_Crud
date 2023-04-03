@extends('layout')
@section('title')
    Product Page
@endsection
@section('body')
    <div class="max-w-7 mx-auto t-10px">
        <div class="body_header">
            <h1>Product</h1>
        </div>
        <div style="margin-bottom: 50px" class="row">
            <div class="col-11 m-auto">
                <a href="{{ route('product.create') }}" id="add_category_button" class="btn btn-outline-primary">Add
                    Product</a>
                <a href="#" id="add_category_button" class="btn btn-outline-danger">All Deleted
                    Data</a>
                @if (session('update'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('update') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('delete') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- Insered data table inserted---------- --}}
                <div id="active_table">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <div class="list_category_active">List Product (Active)</div>
                        <thead style="background-color: rgb(182, 198, 241); padding-top:50px">
                            <tr>
                                {{-- <th class="het" scope="col">Mark</th> --}}
                                <th class="het" scope="col">ID</th>
                                <th class="het" scope="col">Category Name</th>
                                <th class="het" scope="col">Product Name</th>
                                <th class="het" scope="col">Price</th>
                                <th class="het" scope="col">Quantity</th>
                                <th class="het" scope="col">Alert Quantity</th>
                                <th class="het" scope="col">Photo</th>
                                <th class="het" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    {{-- <td>
                                            <input type="checkbox" name="category_id[]" value="">
                                        </td> --}}
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $product->RelationWithCategoryTable->category_name}}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_price }}</td>
                                    <td>{{ $product->product_quantity }}</td>
                                    <td>{{ $product->product_alert_quantity }}</td>
                                    <td>
                                        <img style="width: 60px"
                                            src="{{ asset('uploads/product_photos') }}/{{ $product->product_thambnail_photo }}"
                                            alt="not found">
                                    </td>
                                    <td>
                                        <a id="button_left" href="{{ route('product.edit', $product->id) }}" type="button"
                                            class="btn btn-sm btn-outline-primary">Edit</a>
                                        <form id="button_left" method="post"
                                            action="{{ route('product.destroy', $product->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure to delete')"
                                                class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>


                                        {{-- <a href="{{ url('delete/category/') }}/{{ $product->id }}"
                                                onclick="return confirm('Are you sure to delete')" type="button"
                                                class="btn btn-sm btn-outline-danger">Delete</a> --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="50" class="text-center text-danger">No Data Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- @if ($categories->count())
                            <button onclick="return confirm('Are you sure to delete')" type="submit"
                                class="btn btn-sm btn-outline-danger">Mark Delete</button>
                        @endif --}}
                </div>
                {{-- //Inserted data table End------------- --}}
            </div>
        </div>
    </div>
@endsection
