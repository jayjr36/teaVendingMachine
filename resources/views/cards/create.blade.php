@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Register New Card</h1>
    <form action="{{ route('cards.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select class="form-control" id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="card_number" class="form-label">Card Number</label>
            <input type="text" class="form-control" id="card_number" name="card_number" required>
        </div>
        <div class="mb-3">
            <label for="balance" class="form-label">Initial Balance</label>
            <input type="number" class="form-control" id="balance" name="balance" required>
        </div>
        <button type="submit" class="btn btn-primary">Register Card</button>
    </form>
</div>
@endsection
