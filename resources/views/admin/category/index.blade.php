@extends('layout')
@section('title')
    Category Page
@endsection
@section('body')
    <div class="max-w-7 mx-auto t-10px">
        <div class="body_header">
            <h1>Category</h1>
        </div>
        <div style="margin-bottom: 50px" class="row">
            <div class="col-11 m-auto">
                <a href="{{ url('add/category/index') }}" id="add_category_button" class="btn btn-outline-primary">Add
                    Category</a>
                <a href="{{ url('deleted/category') }}" id="add_category_button" class="btn btn-outline-danger">All Deleted
                    Data</a>
                @if (session('update'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('update') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('delete') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- Insered data table inserted---------- --}}
                <div id="active_table">
                    <form action="{{ url('mark/delete') }}" method="post">
                        @csrf
                        <table id="dataTable" class="table table-striped table-bordered">
                            <div class="list_category_active">List Category (Active)</div>
                            <thead style="background-color: rgb(182, 198, 241); padding-top:50px">
                                <tr>
                                    <th class="het" scope="col">Mark</th>
                                    <th class="het" scope="col">ID</th>
                                    <th class="het" scope="col">Category Name</th>
                                    <th class="het" scope="col">Description</th>
                                    <th class="het" scope="col">Created</th>
                                    <th class="het" scope="col">Photo</th>
                                    <th class="het" scope="col">Date</th>
                                    <th class="het" scope="col">Updated</th>
                                    <th class="het" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="category_id[]" value="{{ $category->id }}">
                                        </td>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        {{-- <th scope="row">{{ $users->firstItem() + $serial++ }}</th> --}}
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->category_description }}</td>
                                        <td>{{ App\Models\User::find($category->user_id)->name }}</td>
                                        <td>
                                            <img style="width: 70px"
                                                src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}"
                                                alt="not found">
                                        </td>
                                        <td>{{ $category->created_at->format('d/m/Y h:i:s A') }}</td>
                                        <td>
                                            @isset($category->updated_at)
                                                {{ $category->updated_at->diffForHumans() }}
                                            @endisset
                                        </td>
                                        <td>
                                            <a href="{{ url('edit/category/') }}/{{ $category->id }}" type="button"
                                                class="btn btn-sm btn-outline-primary">Edit</a>
                                            <a href="{{ url('delete/category/') }}/{{ $category->id }}"
                                                onclick="return confirm('Are you sure to delete')" type="button"
                                                class="btn btn-sm btn-outline-danger">Delete</a>
                                            {{-- <a href="{{ route('deleteCategory', $row->id) }}" onclick="return confirm('Are you sure to delete')" type="button" class="btn btn-sm btn-outline-danger">Delete</a> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="50" class="text-center text-danger">No Data Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        @if ($categories->count())
                            <button onclick="return confirm('Are you sure to delete')" type="submit"
                                class="btn btn-sm btn-outline-danger">Mark Delete</button>
                        @endif
                    </form>
                </div>
                {{-- //Inserted data table End------------- --}}
            </div>
        </div>
    </div>
@endsection
