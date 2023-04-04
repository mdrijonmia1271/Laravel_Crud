@extends('layout')

@section('title')
    Contact Page
@endsection
@section('body')
    <div class="max-w-7xl mx-auto t-10px">
        <div class="body_header">
            <h1>Contact Message Page</h1>
        </div>
        <div class="container">
            <div class="row">
                <table class="table table-striped table-bordered">
                    <thead style="background-color: rgb(120, 132, 164); padding-top:50px">
                        <tr>
                            <th class="het" scope="col">SL. No</th>
                            <th class="het" scope="col">Name</th>
                            <th class="het" scope="col">Email</th>
                            <th class="het" scope="col">Subject</th>
                            <th class="het" scope="col">Message</th>
                            <th class="het" scope="col">Date</th>
                            <th class="het" scope="col">File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $contact)
                            <tr>
                                {{-- <th scope="row">{{ $serial++ }}</th> --}}
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ Str::title($contact->contact_name) }}</td>
                                <td>{{ $contact->contact_email }}</td>
                                <td>{{ $contact->contact_subject }}</td>
                                <td>{{ $contact->contact_message }}</td>
                                <td>{{ $contact->created_at }}</td>
                                <td>
                                    @if ($contact->contact_attachment)
                                        <a href="{{ url('contact/upload/download') }}/{{ $contact->id }}"><i class="fa fa-download"></i></a> |
                                        <a target="_blank" href="{{ asset('storage') }}/{{ $contact->contact_attachment }}"><i class="fa fa-file"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="50" class="text-center text-danger">No Data Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

{{-- </div>  --}}
{{-- </x-app-layout> --}}
