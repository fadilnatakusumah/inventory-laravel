@extends('my-layouts.app')



@section('content')

<div class="row mt-3">
    <div class="col-lg-12">
        <div>
            <h1 class="float-left">All Category Products</h1>
            <a href="#" type="button" data-toggle="modal" data-target="#modalAddCategoryProduct" class="btn btn-outline-info float-right">New Category Product</a>
        </div>
        {{-- Alert for notification --}}
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
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
                    @foreach ($products as $product)
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
                        <button onclick="return confirm('Are you sure?')" type="button" class="btn btn-sm btn-warning">
                            Delete
                        </button>
                        <a type="button" href="{{ route('edit.product.view', ['id' => 1]) }}" class="btn btn-sm btn-info">
                            Edit
                        </a>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- MODAL FOR ADD NEW CATEGORY PRODUCT --}}
<!-- Modal -->
<div class="modal fade" id="modalAddCategoryProduct" tabindex="-1" role="dialog" aria-labelledby="modalAddCategoryProductTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Category of Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('adding.category_product') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName">Name <span class="required">*</span></label>
                        <input required name="name" type="text" class="form-control" id="" aria-describedby="nameHelp" placeholder="Enter Name of Product">
                        @if($errors->has('name'))
                        <small id="nameHelp" class="form-text text-muted">{{$errors->first('name')}}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCategory">Parent <span class="required">*</span></label>
                        <select required class="form-control" name="category_product_id" id="">
                            <option value="0">===Make as Parent===</option>
                            {{-- LOOP CATEGORY --}}
                            @foreach ($categoriesProduct as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('parent'))
                        <small id="parentHelp" class="form-text text-muted">{{$errors->first('parent')}}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription">Description <span class="required">*</span></label>
                        <textarea required name="description" type="text" class="form-control" id="" aria-describedby="descriptionHelp" placeholder="Enter description here"></textarea>
                        @if($errors->has('description'))
                        <small id="descriptionHelp" class="form-text text-muted">{{$errors->first('description')}}</small>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <div class="form-group float-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input name="stock" type="submit" class="btn btn-primary" id="" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection