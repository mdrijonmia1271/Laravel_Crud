

@extends('layout')
@section('title')
    Order Information Page
@endsection
@section('body')
<div class="max-w-7 mx-auto t-10px">
    <div class="body_header">
        <h1>Order Information</h1>
    </div>
    <div style="margin-bottom: 50px" class="row">
        <div class="col-11 m-auto">
            @if (session('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('delete') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- Insered data table inserted---------- --}}
            <div id="active_table">
                <form action="{{ url('mark/delete') }}" method="post">
                    @csrf
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: rgb(182, 198, 241); padding-top:50px">
                            <tr>
                                <th class="het" scope="col">SL</th>
                                <th class="het" scope="col">Date</th>
                                <th class="het" scope="col">Payment Method</th>
                                <th class="het" scope="col">Sub Total</th>
                                <th class="het" scope="col">Discount Amount</th>
                                <th class="het" scope="col">Coupon Name</th>
                                <th class="het" scope="col">Total</th>
                                <th class="het" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->payment_option }}</td>
                                    <td>{{ $order->sub_total }}</td>
                                    <td>{{ $order->discount_amount }}</td>
                                    <td>{{ $order->coupon_name }}</td>
                                    <td>{{ $order->total }}</td>
                                    
                                    <td>
                                        <a href="{{ url('customer/invoice/download') }}/{{ $order->id }}"><i class="fa fa-download"></i> Download Invoice</a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="50">
                                                @foreach ($order->Order_detail as $order_product)
                                                    <p>{{ $order_product->product->product_name }}</p>
                                                @endforeach
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="50" class="text-center text-danger">No Data Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </form>
            </div>
            {{-- //Inserted data table End------------- --}}
        </div>
    </div>
</div>
@endsection
