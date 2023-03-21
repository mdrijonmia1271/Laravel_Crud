{{-- <x-app-layout> --}}
{{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
@extends('layout')

{{-- <div class="py-12"> --}}
@include('layouts.navigation')
<div style="margin-top: 50px" class="max-w-7 mx-auto t-10px">
    @section('body')
        <div class="container">
            <div class="row">
                <div class="col-9">
                    {{-- Insered data table inserted---------- --}}
                    <div id="active_table">
                        @if (session('update'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('update') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('delete'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('delete') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ url('mark/delete') }}" method="post">
                            @csrf
                            <table class="table table-striped table-bordered">
                                <div class="list_category_active">List Category (Active)</div>
                                <thead style="background-color: rgb(120, 132, 164); padding-top:50px">
                                    <tr>
                                        <th class="het" scope="col">Mark</th>
                                        <th class="het" scope="col">ID</th>
                                        <th class="het" scope="col">Category Name</th>
                                        <th class="het" scope="col">Description</th>
                                        <th class="het" scope="col">Created By</th>
                                        <th class="het" scope="col">Created At</th>
                                        {{-- <th class="het" scope="col">Updated At</th> --}}
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
                                            <td>{{ $category->created_at->format('d/m/Y h:i:s A') }}</td>
                                            {{-- <td>{{ $category->updated_at->diffForHumans() }}</td> --}}
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
                            <button type="submit" class="btn btn-sm btn-outline-danger">Mark Delete</button>
                        </form>
                    </div>
                    {{-- //Inserted data table End------------- --}}

                    {{-- Deleted data table started-------------- --}}
                    <div id="deleted_table" class="mt-5 mb-5">
                        @if (session('restore'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('restore') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('forceDelete'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('forceDelete') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ url('mark/restore-delete') }}" method="post">
                            @csrf
                            <table class="table table-striped table-bordered">
                                <div class="list_category_delete">List Category (Deleted)</div>
    
                                <thead style="background-color: rgb(120, 132, 164); padding-top:50px">
                                    <tr>
                                        <th class="het" scope="col">Mark</th>
                                        <th class="het" scope="col">ID</th>
                                        <th class="het" scope="col">Category Name</th>
                                        <th class="het" scope="col">Description</th>
                                        <th class="het" scope="col">Created By</th>
                                        <th class="het" scope="col">Created At</th>
                                        <th class="het" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($deleted_categories as $deleted_category)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="delete_category_id[]" value="{{ $deleted_category->id }}">
                                            </td>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            {{-- <th scope="row">{{ $users->firstItem() + $serial++ }}</th> --}}
                                            <td>{{ $deleted_category->category_name }}</td>
                                            <td>{{ $deleted_category->category_description }}</td>
                                            <td>{{ App\Models\User::find($deleted_category->user_id)->name }}</td>
                                            <td>{{ $deleted_category->created_at->format('d/m/Y h:i:s A') }}</td>
                                            <td>
                                                <a href="{{ url('restore/category') }}/{{ $deleted_category->id }}"
                                                    type="button" class="btn btn-sm btn-outline-success">Restore</a>
                                                <a href="{{ url('force/delete/category') }}/{{ $deleted_category->id }}"
                                                    onclick="return confirm('Are you sure to Force delete')" type="button"
                                                    class="btn btn-sm btn-outline-danger">F.Delete</a>
    
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
                            {{-- <button type="submit" class="btn btn-sm btn-outline-success">Mark Restore</button> --}}
                            <input type="submit" class="btn btn-sm btn-outline-success" value="Restore All" name="Restore_All">
                            <input type="submit" class="btn btn-sm btn-outline-danger" value="Delete All" name="Delete_All">
                        </form>
                    </div>
                    {{-- //Deleted data table started-------------- --}}
                </div>

                {{-- //Add data form started-------------- --}}
                <div class="col-3">
                    <div id="form">
                        <form class="" action="{{ url('add/category') }}" method="post">
                            @csrf
                            <div class="add-category">Add Category</div>
                            @if (session('success'))
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
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
                            {{-- <div class="mb-3">
                          <label>Password</label>
                          <input type="password" class="form-control">
                        </div> --}}
                            <br>
                            <button type="submit" class="btn btn-primary button">Submit</button>
                        </form>
                    </div>
                </div>
                {{-- //Add data form end-------------- --}}

            </div>
        </div>
    </div>
@endsection

{{-- </div>
        </div> --}}
{{-- </x-app-layout> --}}
