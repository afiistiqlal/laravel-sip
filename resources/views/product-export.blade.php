<table class="table table-striped">
    <tr rowsspan="2">
        <td colspan=5>Product Toko Kami</td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Category</th>
        <th class="text-center">Name</th>
        <th class="text-center">Price</th>
        <th class="text-center">SKU</th>
        <th class="text-center">Image</th>
        <th class="text-center">Status</th>
    </tr>
<tbody>
@foreach ($products as $product)
<tr>
    <td class="text-center">{{$loop->iteration}} </td>
    <td class="text-center">{{$product->category->name }} </td>
    <td class="text-center">{{ $product->name}} </td>
        <td class="text-center">{{ $product->price}} </td>
        <td class="text-center">{{ $product->sku}} </td>
        <td class="text-center">{{ $product->image}} </td>
        <td class="text-center">{{ $product->status}} </td>
    </tr>
    @endforeach
</tbody>   
</table>