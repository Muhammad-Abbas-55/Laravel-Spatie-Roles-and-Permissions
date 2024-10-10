<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Quantity;
use App\Models\Quotation;
use App\Models\Term;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index(Request $request, Quotation $quotation)
    {
        $quotations = $quotation->all();
        $customers = Customer::all();
        $terms = Term::all();
        $items = Item::all();
        // dd($terms);
        return view('quot', compact('customers','terms','items','quotations'));
    }

    public function store(Request $request)
    {
        // dd(request()->get('quot',''));

        request()->validate([
            'content' => 'required|min:3|max:250',
            'date' => 'required',
            'status' => 'required',
            'customer_id' => 'required',
            'item_id' => 'required',
            'term_id' => 'required',
        ]);

        $quot = Quotation::create([
            'quot' => request()->get('quot', ''),
            'date' => request()->get('date', ''),
            'status' => request()->get('status', ''),
            'customer_id' => request()->get('customer_id', ''),
            'item_id' => request()->get('item_id', ''),
            'term_id' => request()->get('term_id', ''),
        ]);

        $qty = Quantity::create([
            'qty' => request()->get('qty', ''),
        ]);


        // $quot = new Quotation();

        // $quot->quot = $request->quot ?? '';
        // $quot->date = $request->date;
        // $quot->status = $request->status;
        // $quot->customer_id = $request->customer_id;
        // $quot->item_id = $request->item_id;
        // $quot->term_id = $request->term_id;

        // $quot->save();


        // $quot = new Quantity();

        // $quot->qty = $request->qty ?? '';

        // $quot->save();



        return redirect()->route('dashboard')->with('success', 'Quotation created successfully');
    }
}
