
@extends('layout')

<div class="max-w-7 mx-auto t-10px">
    @section('body')
        <div class="container">
            <div class="row">
                <div class="col-4 m-auto">
                    <div id="form">
                        <form class="" action="{{ url('update/category') }}" method="post">
                            @csrf
                            <div class="add-category">Edit Category</div>
                            @if (session('success'))
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            {{-- {{ print_r($errors->all()) }} --}}
                            <input type="hidden" name="category_id" value="{{ $categories->id }}">
                            <div class="mb-3">
                                <label class="mb-2">Category Name</label>
                                <input type="text" name="category_name" class="form-control"
                                    value="{{ $categories->category_name }}">
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">Category Description</label>
                                <textarea class="form-control" name="category_description" id="" rows="3">{{ $categories->category_description }}</textarea>
                                @error('category_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary button">Update</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

{{-- </div>
            </div> --}}
{{-- </x-app-layout> --}}
