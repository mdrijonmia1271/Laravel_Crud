<h1>This is a Pdf File</h1>
<p>Order ID: {{ $order_info->id }}</p>
<p>Sub Total: {{ $order_info->sub_total }}</p>
<p>Discount Amount: {{ $order_info->discount_amount }}</p>
<p>Total: {{ $order_info->total }}</p>
<p>
    Coupon: @if ($order_info->coupon_name == "-")
        No Coupon Used
    @else
        {{ $order_info->coupon_name }}
    @endif
    
</p>