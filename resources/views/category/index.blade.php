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
              <div class="col-8">
                <table class="table table-striped table-bordered">
                    <thead style="background-color: rgb(120, 132, 164); padding-top:50px">
                        <tr>
                            <th class="het" scope="col">ID</th>
                            <th class="het" scope="col">Name</th>
                            <th class="het" scope="col">Email</th>
                            <th class="het" scope="col">Create Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php
                            $serial = 0;
                        @endphp
                        @foreach ($users as $user)
                            <tr> --}}
                                {{-- <th scope="row">{{ $serial++ }}</th> --}}
                                {{-- <th scope="row">{{ $users->firstItem()+ $serial++ }}</th>
                                <td>{{ Str::title($user->name) }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <li>Data : {{ $user->created_at->format('d/m/Y') }}</li>
                                    <li>Time : {{ $user->created_at->format('h:i:s A') }}</li>
                                    <li>{{ $user->created_at->diffForHumans() }}</li>
                                </td>
                            </tr> --}}
                        {{-- @endforeach --}}
        
                    </tbody>
                </table>
              </div>
              <div class="col card">
                <form action="{{ url('category') }}" method="post">
                    @csrf
                    <div class="add-category">Add Category</div>
                    {{-- {{ print_r($errors->all()) }} --}}
                    <div class="mb-3">
                      <label class="mb-2">Category Name</label>
                      <input type="text" name="category_name" class="form-control" value="{{ old('category_name') }}">
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
                    <button type="submit" class="btn btn-primary button">Submit</button>
                  </form>
              </div>
            </div>
          </div>

        </div>
        @endsection
    
        {{-- </div>
        </div> --}}
        {{-- </x-app-layout> --}}
    