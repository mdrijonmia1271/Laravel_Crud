<h1>Congratulations!</h1>
<h2>Your Order has been taken!</h2>

<table class="table table-striped table-bordered">
    <thead style="background-color: rgb(182, 198, 241); padding-top:50px">
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Product Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($infos as $info)
        <tr>
            <td>1</td>
            <td>Mango</td>
            <td>70</td>
        </tr>
        @endforeach
    </tbody>
</table>