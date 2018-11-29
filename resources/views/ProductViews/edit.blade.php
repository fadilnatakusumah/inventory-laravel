@extends('my-layouts.app')



@section('content')


<div class="row mt-3">
    <div class="col-lg-12">
        <h1>Edit Product with ID: {{ $product->id }}</h1>
        <form method="POST" action="{{ route('editing.product') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName">Name <span class="required">*</span></label>
                    <input required name="name" type="text" class="form-control" id="" aria-describedby="nameHelp" placeholder="{{$product->name}}" value="{{$product->name}}">
                    <input required name="id" type="hidden" class="form-control" value="{{$product->id}}">
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
                        <option @if($category->id === $product->category_product_id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
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
                        <option @if($supplier->id === $product->supplier_id) selected @endif value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('supplier_id'))
                    <small id="supplierHelp" class="form-text text-muted">{{$errors->first('supplier_id')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="ExampleInputCode">Code <span class="required">*</span></label>
                    <input required name="code" type="text" class="form-control" id="" aria-describedby="codeHelp" placeholder="{{$product->code}}" value="{{$product->code}}">
                    @if($errors->has('code'))
                    <small id="codeHelp" class="form-text text-muted">{{$errors->first('code')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputDescription">Description <span class="required">*</span></label>
                    <textarea required name="description" type="text" class="form-control" id="" aria-describedby="descriptionHelp" placeholder="{{$product->description}}">{{$product->description}}</textarea>
                    @if($errors->has('description'))
                    <small id="descriptionHelp" class="form-text text-muted">{{$errors->first('description')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputWeight">Weight <span class="required">*</span> <small>(numeric)</small></label>
                    <input required name="weight" type="text" class="form-control" id="" aria-describedby="descriptionHelp" placeholder="{{$product->weight}}" value="{{$product->weight}}">
                    @if($errors->has('weight'))
                    <small id="weightHelp" class="form-text text-muted">{{$errors->first('weight')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPrice">Price <span class="required">*</span> <small>(numeric)</small></label>
                    <input required name="price" type="text" class="form-control" id="" aria-describedby="priceHelp" placeholder="{{$product->price}}" value="{{$product->price}}">
                    @if($errors->has('price'))
                    <small id="priceHelp" class="form-text text-muted">{{$errors->first('price')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputStock">Stock <span class="required">*</span> <small>(numeric)</small></label>
                    <input required name="stock" type="text" class="form-control" id="" aria-describedby="stockHelp" placeholder="{{$product->stock}}" value="{{$product->stock}}">
                    @if($errors->has('stock'))
                    <small id="stockHelp" class="form-text text-muted">{{$errors->first('stock')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputStatus">Status <span class="required">*</span></label>
                    <select class="form-control" name="status" id="">
                        <option @if($product->status=== 1) selected @endif value="1">Available</option>
                        <option @if($product->status=== 0) selected @endif value="0">Not Available</option>
                    </select>
                    @if($errors->has('stock'))
                    <small id="stockHelp" class="form-text text-muted">{{$errors->first('stock')}}</small>
                    @endif
                </div>
                <div class="modal-footer">
                    <div class="form-group float-right">
                        <a href="{{ route('products.view')}}" type="button" class="btn btn-secondary" data-dismiss="modal">Back</a>
                        <input type="submit" class="btn btn-primary" id="" value="Update">
                    </div>
                </div>
            </form>
    </div>
</div>


@endsection