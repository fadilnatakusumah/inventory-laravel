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
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Parent</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoryProducts as $categoryProduct)
                <tr>
                    <td scope="row">{{$categoryProduct->id}}</td>
                    <td>{{$categoryProduct->name}}</td>
                    <td>{{$categoryProduct->parent->name}}</td>
                    <td>{{$categoryProduct->description}}</td>
                    <td>
                        <a href="{{ route('deleting.categoryProduct', ['id'=>$categoryProduct->id]) }}" onclick="return confirm('Are you sure?')" type="button" class="btn btn-sm btn-danger">
                            Delete
                        </a>
                        <a type="button" href="{{ route('edit.categoryProduct.view', ['id' => $categoryProduct->id]) }}" class="btn btn-sm btn-info">
                            Edit
                        </a>
                    </td>
                </tr>
                @endforeach
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
                <form method="POST" action="{{ route('adding.categoryProduct') }}">
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
                        <select required class="form-control" name="parent_id" id="">
                            <option value="0">===Make as Parent===</option>
                            {{-- LOOP CATEGORY --}}
                            @foreach ($categoryProducts as $category)
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