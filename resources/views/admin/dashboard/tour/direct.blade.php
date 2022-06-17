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
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Business</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        @if (myPurchaseDirectSellUnderFivek($user->id) > 9999)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->status }}</td>
                                <td>{{ number_format(myPurchaseDirectSellUnderFivek($user->id), 2) }}</td>
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
