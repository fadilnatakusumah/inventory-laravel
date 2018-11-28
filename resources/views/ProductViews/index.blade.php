@extends('my-layouts.app')



@section('content')

<div class="row mt-3">
    <div class="col-lg-12">
        <div>
            <h1 class="float-left">All Products</h1>
            <a href="{{ route('add.products.view') }}" type="button" class="btn btn-outline-info float-right">Add New Product</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Category</th>
                    <th>Supplier</th>
                    <th>Description</th>
                    <th>Weight</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>Buku</td>
                    <td>B1</td>
                    <td>Pendidikan</td>
                    <td>PT. Book Factory</td>
                    <td>Buku-buku Pendidikan</td>
                    <td>100 (gram)</td>
                    <td>Rp. 100000</td>
                    <td>Available</td>
                    <td>10</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-warning">
                            Delete
                        </button>
                        <a type="button" href="{{ route('edit.product.view', ['id' => 1]) }}" class="btn btn-sm btn-info">
                            Edit
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection