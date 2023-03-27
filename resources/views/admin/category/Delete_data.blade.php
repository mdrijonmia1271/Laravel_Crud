@extends('layout')
@section('title')
    Deleted Category Page
@endsection
@section('body')
    <div class="max-w-7 mx-auto t-10px">
        <div class="body_header">
            <h1>Deleted Category</h1>
        </div>
        <div style="margin: 5px" class="row">
            <div class="col-11 m-auto">
                <a href="{{ url('category/index') }}" id="add_category_button" class="btn btn-outline-primary">Back to
                    home</a>
                @if (session('restore'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('restore') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('forceDelete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('forceDelete') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- Deleted data table started-------------- --}}
                <div id="deleted_table" class="mb-5">
                    <form action="{{ url('mark/restore-delete') }}" method="post">
                        @csrf
                        <table class="table table-striped table-bordered">
                            <div class="list_category_delete">List Category (Deleted)</div>
                            <thead style="background-color: rgb(166, 177, 207); padding-top:50px">
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
                                            <input type="checkbox" name="delete_category_id[]"
                                                value="{{ $deleted_category->id }}">
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
                        @if ($deleted_categories->count())
                            <input type="submit" class="btn btn-sm btn-outline-success" value="Restore All"
                                name="Restore_All">
                            <input type="submit" onclick="return confirm('Are you sure to Permanently delete data')"
                                class="btn btn-sm btn-outline-danger" value="Delete All" name="Delete_All">
                        @endif
                    </form>
                </div>
                {{-- //Deleted data table end-------------- --}}
            </div>
        </div>
    </div>
@endsection
