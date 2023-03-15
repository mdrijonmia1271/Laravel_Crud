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
    <h1>Total User : {{ $total_users }}</h1>
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
                @php
                    $serial = 0;
                @endphp
                @foreach ($users as $user)
                    <tr>
                        {{-- <th scope="row">{{ $serial++ }}</th> --}}
                        <th scope="row">{{ $users->firstItem()+ $serial++ }}</th>
                        <td>{{ Str::title($user->name) }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <li>Data : {{ $user->created_at->format('d/m/Y') }}</li>
                            <li>Time : {{ $user->created_at->format('h:i:s A') }}</li>
                            <li>{{ $user->created_at->diffForHumans() }}</li>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $users->links() }}
    @endsection

    {{-- </div>
    </div> --}}
    {{-- </x-app-layout> --}}
