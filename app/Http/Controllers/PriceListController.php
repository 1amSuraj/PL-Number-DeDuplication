<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PriceList;

class PriceListController extends Controller
{
    // List all duplicate PL numbers
    public function index()
    {
        $duplicates = PriceList::select('pl_number')
            ->groupBy('pl_number')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('pl_number');

        $records = PriceList::whereIn('pl_number', $duplicates)->get();

        return response()->json($records);
    }

    // Merge duplicates by keeping one
    public function merge(Request $request)
    {
        $request->validate([
            'keep_id' => 'required|exists:price_lists,id',
            'merge_ids' => 'required|array',
        ]);

        // Keep one, delete others
        PriceList::whereIn('id', $request->merge_ids)
            ->where('id', '!=', $request->keep_id)
            ->delete();

            return redirect()->route('pl.manage')->with('success', 'Duplicates merged successfully.');
        }

    // Delete an entry
    // public function destroy($id)
    // {
    //     $item = PriceList::findOrFail($id);
    //     $item->delete();

    //     return response()->json(['message' => 'Deleted successfully.']);
    // }

    public function destroy($id)
    {
        // Find and delete the record
        $record = PriceList::findOrFail($id);
        $record->delete();
    
        // Redirect back to the pl-manage page with updated duplicate records
        return redirect()->route('pl.manage')->with('success', 'Record deleted successfully.');
    }


    // Update an entry
    public function update(Request $request, $id)
{
    $request->validate([
        'pl_number' => 'required|string|unique:price_lists,pl_number,' . $id,
    ], [
        'pl_number.unique' => 'The PL number already exists. Please use a different one.',
    ]);

    // Find and update the record
    $item = PriceList::findOrFail($id);
    $item->pl_number = $request->pl_number;
    $item->save();

    // Redirect back to the pl-manage page with a success message
    return redirect()->route('pl.manage')->with('success', 'Record updated successfully.');
}


    public function store(Request $request)
{
    $request->validate([
        'pl_number' => 'required|string|unique:price_lists,pl_number'
    ]);

    $priceList = PriceList::create([
        'pl_number' => $request->pl_number
    ]);

    return response()->json(['message' => 'Price List created successfully.', 'data' => $priceList]);
}

// Show the Blade form
public function create()
{
    return view('pl.create');
}

// Handle form submission (not JSON)
public function submitViaForm(Request $request)
{
    $request->validate([
        'pl_number' => 'required|string|unique:price_lists,pl_number'
    ]);

    PriceList::create([
        'pl_number' => $request->pl_number
    ]);

    return redirect()->route('pl.create')->with('success', 'Price List created successfully.');
}

// Optional: Show duplicate entries in a Blade view
// public function showDuplicates()
// {
//     $duplicates = PriceList::select('pl_number')
//         ->groupBy('pl_number')
//         ->havingRaw('COUNT(*) > 1')
//         ->pluck('pl_number');

//     $records = PriceList::whereIn('pl_number', $duplicates)->get();

//     return view('pl.duplicates', compact('records'));
// }






// public function showDuplicates()
// {
//     $duplicates = PriceList::select('pl_number')
//         ->groupBy('pl_number')
//         ->havingRaw('COUNT(*) > 1')
//         ->pluck('pl_number');

//     $records = PriceList::whereIn('pl_number', $duplicates)->get();

//     return view('pl.manage', compact('records'));
// }
public function showDuplicates(Request $request)
{
    $sortColumn = $request->get('sort', 'id'); // Default sort by 'id'
    $sortDirection = $request->get('direction', 'asc'); // Default sort direction is 'asc'

    $duplicates = PriceList::select('pl_number')
        ->groupBy('pl_number')
        ->havingRaw('COUNT(*) > 1')
        ->pluck('pl_number');

    $records = PriceList::whereIn('pl_number', $duplicates)
        ->orderBy($sortColumn, $sortDirection)
        ->get();

    return view('pl.manage', compact('records', 'sortColumn', 'sortDirection'));
}





}