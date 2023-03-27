@extends('layout')
@section('title')
    Add Category Page
@endsection
@section('body')
    <div style="margin-top: 50px" class="max-w-7xl mx-auto t-10px">
        <div class="body_header">
            <h1>Add Category</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-4 m-auto">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <a href="{{ url('category/index') }}" style="margin-bottom: 9px" class="btn btn-outline-primary">Back to home</a>
                    <div id="add_category_form">
                        <form class="" action="{{ url('add/category') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="add-category">Add Category</div>

                            {{-- {{ print_r($errors->all()) }} --}}
                            <div class="mb-3">
                                <label class="mb-2">Category Name</label>
                                <input type="text" name="category_name" class="form-control"
                                    value="{{ old('category_name') }}">
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">Category Description</label>
                                <textarea class="form-control" name="category_description" id="" rows="3">{{ old('category_description') }}</textarea>
                                @error('category_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">Photo</label>
                                <input type="file" name="category_photo" class="form-control">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
