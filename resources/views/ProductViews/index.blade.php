@extends('my-layouts.app')



@section('content')

<div class="row mt-3">
    <div class="col-lg-12">
        <div>
            <h1 class="float-left">All Products</h1>
            <a href="#" type="button" data-toggle="modal" data-target="#modalAddProduct" class="btn btn-outline-info float-right mr-1">New Product</a>
        </div>
        {{-- Alert for notification --}}
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Success!</strong> {{ Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        @elseif(Session::has('fail'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>Failed!</strong> {{ Session::get('fail')}} <br>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <table class="table text-center">
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
                @foreach ($products as $product)
                <tr>
                    <td scope="row">{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->code}}</td>
                    <td>{{$product->categoryProduct->name}}</td>
                    <td>{{$product->supplier->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->weight}} (gram)</td>
                    <td>Rp. {{$product->price}}</td>
                    <td>
                        @if($product->status)
                            Available
                        @else
                            Not Available
                        @endif
                    </td>
                    <td>{{$product->stock}}</td>
                    <td>
                        <a href="{{ route('deleting.products', ['id' => $product->id]) }}" onclick="return confirm('Are you sure?')" type="button" class="btn btn-sm btn-danger actions-btn">
                            Delete
                        </a>
                        <a type="button" href="{{ route('edit.product.view', ['id' => $product->id]) }}" class="btn btn-sm btn-info actions-btn">
                            Edit
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- MODAL FOR ADD NEW PRODUCT --}}
<!-- Modal -->
<div class="modal fade" id="modalAddProduct" tabindex="-1" role="dialog" aria-labelledby="modalAddProductTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add New Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('adding.product') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName">Name <span class="required">*</span></label>
                    <input required name="name" type="text" class="form-control" id="" aria-describedby="nameHelp" placeholder="Enter Name of Product">
                    @if($errors->has('name'))
                    <small id="nameHelp" class="form-text text-muted">{{$errors->first('name')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputCategory">Category <span class="required">*</span></label>
                    <select required class="form-control" name="category_product_id" id="">
                        <option>===Choose Category===</option>
                        {{-- LOOP CATEGORY --}}
                        @foreach ($categoriesProduct as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('category_product_id'))
                    <small id="categoryProductHelp" class="form-text text-muted">{{$errors->first('category_product_id')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputSupplier">Supplier <span class="required">*</span></label>
                    <select required class="form-control" name="supplier_id" id="">
                        <option>===Choose Supplier===</option>
                        {{-- LOOP SUPPLIER --}}
                        @foreach ($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('supplier_id'))
                    <small id="supplierHelp" class="form-text text-muted">{{$errors->first('supplier_id')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="ExampleInputCode">Code <span class="required">*</span></label>
                    <input required name="code" type="text" class="form-control" id="" aria-describedby="codeHelp" placeholder="Enter code of product">
                    @if($errors->has('code'))
                    <small id="codeHelp" class="form-text text-muted">{{$errors->first('code')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputDescription">Description <span class="required">*</span></label>
                    <textarea required name="description" type="text" class="form-control" id="" aria-describedby="descriptionHelp" placeholder="Enter description here"></textarea>
                    @if($errors->has('description'))
                    <small id="descriptionHelp" class="form-text text-muted">{{$errors->first('description')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputWeight">Weight <span class="required">*</span> <small>(numeric)</small></label>
                    <input required name="weight" type="text" class="form-control" id="" aria-describedby="descriptionHelp" placeholder="Enter weight">
                    @if($errors->has('weight'))
                    <small id="weightHelp" class="form-text text-muted">{{$errors->first('weight')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPrice">Price <span class="required">*</span> <small>(numeric)</small></label>
                    <input required name="price" type="text" class="form-control" id="" aria-describedby="priceHelp" placeholder="Enter price">
                    @if($errors->has('price'))
                    <small id="priceHelp" class="form-text text-muted">{{$errors->first('price')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputStock">Stock <span class="required">*</span> <small>(numeric)</small></label>
                    <input required name="stock" type="text" class="form-control" id="" aria-describedby="stockHelp" placeholder="Enter stock">
                    @if($errors->has('stock'))
                    <small id="stockHelp" class="form-text text-muted">{{$errors->first('stock')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputStatus">Status <span class="required">*</span></label>
                    <select class="form-control" name="status" id="">
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                    @if($errors->has('stock'))
                    <small id="stockHelp" class="form-text text-muted">{{$errors->first('stock')}}</small>
                    @endif
                </div>
                <div class="modal-footer">
                    <div class="form-group float-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" id="" value="Submit">
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>



@endsection