{{-- <x-app-layout> --}}
{{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    @extends('layout')

    {{-- <div class="py-12"> --}}
    @include('layouts.navigation')
    <div style="margin-top: 50px" class="max-w-7xl mx-auto t-10px">
        @section('body')
        <div class="container">
            <div class="row">
              <div class="col-8">
               
              </div>
              <div class="col">
                <form>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary button">Submit</button>
                  </form>
              </div>
            </div>
          </div>


        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
           
        </div>
        @endsection
    
        {{-- </div>
        </div> --}}
        {{-- </x-app-layout> --}}
    