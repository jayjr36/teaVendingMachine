@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Top Up Card</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('cards.topup') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="card_number" class="form-label">Card Number</label>
            <select class="form-control" id="card_number" name="card_number" required>
                @foreach($cards as $card)
                    <option value="{{ $card->card_number }}">{{ $card->card_number }} (Balance: {{ $card->balance }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Top Up Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Top Up</button>
    </form>
</div>
@endsection
