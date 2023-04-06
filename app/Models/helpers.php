<?php

function product_total_count(){
    echo App\Models\Product::count();
}