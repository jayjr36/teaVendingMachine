@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registered Users</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Register New User</a>
    <a href="{{ route('cards.create') }}" class="btn btn-primary">Register Card</a>
    <a href="{{ route('cards.topup.form') }}" class="btn btn-primary">Top Up Card</a>
    {{-- <a class="nav-link" href="{{ route('cards.topup.form') }}">Top Up Card</a> --}}

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Cards</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->cards as $card)
                            <div>Card Number: {{ $card->card_number }}, Balance: {{ $card->balance }}</div>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
