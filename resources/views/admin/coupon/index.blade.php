
@php
    error_reporting(0);
@endphp

@extends('layout')
@section('title')
    Coupon Page
@endsection
@section('body')
    <div class="max-w-7 mx-auto t-10px">
        <div class="body_header">
            <h1>Coupon</h1>
        </div>
        <div style="margin-bottom: 50px" class="row">
            <div class="col-11 m-auto">
                <a href="{{ route('coupon.create') }}" id="add_category_button" class="btn btn-outline-primary">Add Coupon</a>
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
                                <th class="het" scope="col">Coupon Name</th>
                                <th class="het" scope="col">Added By</th>
                                <th class="het" scope="col">Discount Amount</th>
                                <th class="het" scope="col">Minimum Purchase Amount</th>
                                <th class="het" scope="col">Validity Till</th>


                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($coupons as $coupon)
                                <tr>
                                    {{-- <td>
                                            <input type="checkbox" name="category_id[]" value="">
                                        </td> --}}
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $coupon->coupon_name}}</td>
                                    <td>{{ $coupon->RelationWithUserTable->name }}</td>
                                    <td>{{ $coupon->discount_amount }}</td>
                                    <td>{{ $coupon->minimum_purchase_amount }}</td>
                                    <td>{{ $coupon->validity_till }}</td>
                                    {{-- <td>
                                        <a id="button_left" href="{{ route('product.edit', $product->id) }}" type="button"
                                            class="btn btn-sm btn-outline-primary">Edit</a>
                                        <form id="button_left" method="post"
                                            action="{{ route('product.destroy', $product->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure to delete')"
                                                class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form> --}}


                                        {{-- <a href="{{ url('delete/category/') }}/{{ $product->id }}"
                                                onclick="return confirm('Are you sure to delete')" type="button"
                                                class="btn btn-sm btn-outline-danger">Delete</a> --}}
                                    {{-- </td> --}}
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
