@extends('layout.dashboard')
@section('title')
    Direct Business History
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
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($users as $user)
                        @if (myPurchaseDirectSellUnderFivek($user->id) > 9999)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->status }}</td>
                                <td>{{ number_format(myPurchaseDirectSellUnderFivek($user->id), 2) }}</td>
                            </tr>
                        @endif
                        @php
                            $i++;
                        @endphp
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
