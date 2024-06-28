<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Card;

class CardController extends Controller
{

    public function showTopUpForm()
    {
        $cards = Card::all();
        return view('cards.topup', compact('cards'));
    }
    public function create()
    {
        $users = User::all();
        return view('cards.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'card_number' => 'required|unique:cards',
            'balance' => 'required|numeric|min:0',
        ]);

        Card::create($validated);

        return redirect()->route('users.index');
    }

    public function topup(Request $request)
    {
        $validated = $request->validate([
            'card_number' => 'required|exists:cards,card_number',
            'amount' => 'required|numeric|min:0',
        ]);

        $card = Card::where('card_number', $validated['card_number'])->first();
        $card->balance += $validated['amount'];
        $card->save();

        return redirect()->route('users.index');
    }

    public function deduct(Request $request)
    {
        $validated = $request->validate([
            'card_number' => 'required|exists:cards,card_number',
        ]);

        $card = Card::where('card_number', $validated['card_number'])->first();

        if ($card->balance >= 500) {
            $card->balance -= 500;
            $card->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}

