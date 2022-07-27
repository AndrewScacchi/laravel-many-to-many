@extends('admin.layouts.base')

@section('mainContent')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Birth</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr data-id="{{ $user->id }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    {{-- userDetails() is the method to acced data from other tab, get() necessary --}}

                    @php
                        $details = $user->userDetails()->first()
                    @endphp

                    {{-- get not first! --}}
                    @if($user->userDetails()->get())
                    <td>{{ $details ? $details->address : "no data" }}</td>
                    <td>{{ $details ? $details->phone : "no data" }}</td>
                    <td>{{ $details ? $details->birth : "no data" }}</td>

                    @endif

                    <td>
                        <a href="{{--{{ route('admin.users.show', ['user' => $user]) }}--}}" class="btn btn-primary">View</a>
                    </td>
                    <td>
                        <a href="{{--{{ route('admin.users.edit', ['user' => $user]) }}--}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <button class="btn btn-danger js-delete">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
