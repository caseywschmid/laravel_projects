<?php

namespace App\Http\Controllers;

use App\Models\Month;
use App\Models\Budget;
use App\Models\Frequency;
use App\Models\BudgetItem;
use Illuminate\Http\Request;
use App\Models\ExpenseCategory;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budgetItems = BudgetItem::all();
        $months = Month::all();


        return view('/budget', compact('budgetItems', 'months'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expenseCategories = ExpenseCategory::all();
        $frequencies = Frequency::all();
        
        return view('/additem', compact('expenseCategories', 'frequencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entry = new BudgetItem;
        $entry->name = $request->name;
        $entry->amount = $request->amount;
        $entry->category_id = $request->category;
        $entry->frequency_id = $request->frequency;
        $entry->user_id = auth()->user()->id;
        $entry->save();

        return redirect('/budget')->with('message', "Budget Item created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $expenseCategories = ExpenseCategory::all();
        $frequencies = Frequency::all();
        $budgetItems = BudgetItem::all();
        return view('edit', compact('expenseCategories', 'frequencies', 'budgetItems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BudgetItem $item)
    {
        $item->name = $request->name;
        $item->amount = $request->amount;
        $item->category_id = $request->category;
        $item->frequency_id = $request->frequency;
        $item->update();
        
        return redirect('/edit')->with('message', "Budget Item updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(BudgetItem $item)
    {
        dd($item);
        $item->delete();
        return redirect('/edit')->with('message', "Budget Item deleted successfully");
    }
}
 