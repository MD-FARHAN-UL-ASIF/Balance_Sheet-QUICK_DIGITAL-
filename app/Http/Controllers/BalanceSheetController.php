<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BalanceSheet;

class BalanceSheetController extends Controller
{
    public function index(){
        $balances = BalanceSheet::all();
        return view('admin.balanceSheet.home', compact('balances'));
    }

    public function create(){
        return view('admin.balanceSheet.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'particular' => 'required',
            'quantity' => 'required',
            'revenue' => 'required',
            'expense' => 'required',
        ]);

        $userId = auth()->id();
        $latestBalanceRecord = BalanceSheet::latest()->first();
        $previousBalance = $latestBalanceRecord ? $latestBalanceRecord->balance : 0;
        $newBalance = $previousBalance + $request->revenue - $request->expense;

        $data = new BalanceSheet([
            'date' => $request->date,
            'particular' => $request->particular,
            'quantity' => $request->quantity,
            'revenue' => $request->revenue,
            'expense' => $request->expense,
            'balance' => $newBalance,
            'user_id' => $userId,
        ]);

        $data->save();

        // Recalculate balances for entries that come after the current one
        $nextBalanceSheets = BalanceSheet::where('id', '>', $data->id)->get();
        foreach ($nextBalanceSheets as $nextBalanceSheet) {
            $nextBalanceSheet->balance = $nextBalanceSheet->balance + $request->revenue - $request->expense;
            $nextBalanceSheet->save();
        }

        session()->flash('success', 'Data added successfully.');
        return redirect()->route('admin.balanceSheet');
    }

    public function edit($id)
    {
        $balance = BalanceSheet::findOrFail($id);
        return view('admin.balanceSheet.update', compact('balance'));
    }

public function update(Request $request, $id)
{
    $balance = BalanceSheet::findOrFail($id);

    $request->validate([
        'date' => 'required',
        'particular' => 'required',
        'quantity' => 'required',
        'revenue' => 'required',
        'expense' => 'required',
    ]);

    // Calculate the difference between the old and new values
    $oldBalance = $balance->balance;
    $revenueDifference = $request->revenue - $balance->revenue;
    $expenseDifference = $request->expense - $balance->expense;
    $newBalance = $oldBalance + $revenueDifference - $expenseDifference;

    // Update the current entry
    $balance->update([
        'date' => $request->date,
        'particular' => $request->particular,
        'quantity' => $request->quantity,
        'revenue' => $request->revenue,
        'expense' => $request->expense,
        'balance' => $newBalance,
    ]);

    // Recalculate balances for entries that come after the updated entry
    $nextBalanceSheets = BalanceSheet::where('id', '>', $id)->get();
    foreach ($nextBalanceSheets as $nextBalanceSheet) {
        $nextBalanceSheet->balance = $nextBalanceSheet->balance + $revenueDifference - $expenseDifference;
        $nextBalanceSheet->save();
    }

    session()->flash('success', 'Data updated successfully.');
    return redirect()->route('admin.balanceSheet');
}

    public function delete($id)
    {
        $balance = BalanceSheet::findOrFail($id);

        // Recalculate balances for entries that come after the deleted entry
        $nextBalanceSheets = BalanceSheet::where('id','>', $id)->get();
        foreach ($nextBalanceSheets as $nextBalanceSheet) {
            $nextBalanceSheet->balance = $nextBalanceSheet->balance - $balance->revenue + $balance->expense;
            $nextBalanceSheet->save();
        }

        $balance->delete();

        session()->flash('success', 'Data deleted successfully.');
        return redirect()->route('admin.balanceSheet');
    }
}
