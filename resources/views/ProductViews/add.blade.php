@extends('my-layouts.app')



@section('content')


<div class="row mt-3">
    <div class="col-lg-12">
        <h1>Add New Product</h1>
        <div class="container">
            <form>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                    <div class="col-sm-1-12">
                        <input type="text|password|email|number|submit|date|datetime|datetime-local|month|color|range|search|tel|time|url|week" class="form-control" name="inputName" id="inputName" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Action</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection