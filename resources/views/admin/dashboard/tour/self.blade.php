@extends('layout.dashboard')
@section('title')
    Admin Deposit History
@endsection
@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Business</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        @if (myPurchase($user->id) > 4999)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->status }}</td>
                                <td>{{ number_format(myPurchase($user->id), 2) }}</td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td>No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
