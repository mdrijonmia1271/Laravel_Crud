
@extends('layout')

@section('title')
    Deshboard Page
@endsection 
@section('body')
<div class="max-w-7xl mx-auto t-10px">
    <div class="body_header">
        <h1>Profile Edited Page</h1>
    </div>
    <div class="container">
        <a href="{{ url('send/newslatter') }}" class="mt-3 mb-3 btn btn-success">Send NewsLatter to {{ $total_users }} users</a>
        <div class="row">
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
        </div>
    </div>
</div>
@endsection

    {{-- </div>  --}}
    {{-- </x-app-layout> --}}
