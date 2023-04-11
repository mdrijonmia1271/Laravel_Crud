@extends('layout')
@section('title')
    Add Coupon Page
@endsection
@section('body')
    <div style="margin-top: 50px" class="max-w-7xl mx-auto t-10px">
        <div class="body_header">
            <h1>Add Coupon</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-4 m-auto mb-5">
                    @if (session('added_status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('added_status') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <a href="{{ route('product.index') }}" style="margin-bottom: 9px" class="btn btn-outline-primary">Back
                        to home</a>
                    <div id="add_category_form">
                        <form class="" action="{{ route('coupon.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="add-category">Add Coupon</div>

                            {{-- {{ print_r($errors->all()) }} --}}
                            <div class="mb-3 form-group">
                                <label class="mb-2">Coupon Name</label>
                                <input class="form-control" name="coupon_name" value="{{ old('coupon_name') }}"></input>
                                @error('coupon_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label class="mb-2">Discount Amount</label>
                                <input class="form-control" name="discount_amount" value="{{ old('discount_amount') }}"></input>
                                @error('discount_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label class="mb-2">Minimum Purchase Amount</label>
                                <input class="form-control" name="minimum_purchase_amount" value="{{ old('minimum_purchase_amount') }}"></input>
                                @error('minimum_purchase_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label class="mb-2">Validity Till</label>
                                <input class="form-control" type="date" name="validity_till" value="{{ old('validity_till') }}"></input>
                                @error('validity_till')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-outline-primary">Add Coupon</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
