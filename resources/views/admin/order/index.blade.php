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
                                <th class="het" scope="col">Serial No</th>
                                <th class="het" scope="col">Order ID</th>
                                <th class="het" scope="col">Order At</th>
                                <th class="het" scope="col">User Buy</th>
                                <th class="het" scope="col">Payment Type </th>
                                <th class="het" scope="col">Payment Status </th>
                                <th class="het" scope="col">Price</th>
                                <th class="het" scope="col">Discount Amount</th>
                                <th class="het" scope="col">Coupon Name</th>
                                <th class="het" scope="col">Total Amount</th>
                                <th class="het" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ App\Models\User::find($order->user_id)->name }}</td>
                                    <td>
                                        @if ($order->payment_option == 1)
                                            Cash on delivery
                                        @else
                                            Card
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->payment_status == 1)
                                            <span style="background-color: red">Unpaid</span>
                                        @elseif($order->payment_status == 2)
                                        <span style="background-color: rgb(31, 206, 133)">Paid</span>
                                        @else
                                            <span style="background-color: rgb(141, 121, 10)">Cencel</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->sub_total }}</td>
                                    <td>{{ $order->discount_amount }}</td>
                                    <td>{{ $order->coupon_name }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>
                                        @if ($order->payment_status == 1)
                                        <form action="{{ route('order.update', $order->id) }}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <button type="submit" class="btn btn-sm btn-outline-success">paid</button>
                                        </form>
                                        @endif
                                        <a class="btn btn-sm btn-outline-danger" href="{{ route('order.cancel', $order->id) }}">Cencal</a>
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
