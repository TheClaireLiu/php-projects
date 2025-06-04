<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    // retrieve all quotes use index()
    public function index(Request $request)
    {
        if(isset($request['search'])){
            $quotes = Quote::where('text','like', "%{$request['search']}%")
                ->orWhere('author','like',"%{$request['search']}%")
                ->get();
            return response()->json($quotes);
        }

        $quotes = Quote::all();
        return response()->json($quotes);
    } 

    // retrieve single quote
    public function show(int $id)
    {
        $quote = Quote::find($id);
        if(is_null($quote))
        {
            return response()->json(['error' => 'Quote not found'], 404);
        }
        return response()->json($quote);
    }

    // create a new quote
    public function store(Request $request)
    {
        $quote = new Quote();
        $quote->text = $request->text;
        $quote->author = $request->author;
        $quote->save();

        return response()->json($quote, 201);
    }

    // update a quote
    public function update(int $id, Request $request)
    {
        $quote = Quote::find($id);
        if(is_null($quote))
        {
            return response()->json(['error'=>'Quote not found'], 404);
        }

        $quote->text = $request->text;
        $quote->author = $request->author;
        $quote->save();

        return response() ->json($quote);
    }

    // delete a quote
    public function destroy(int $id)
    {
        $quote = Quote::find($id);
        if(is_null($quote))
        {
            return response()->json(['error' => 'Quote not found'], 404);
        }
        
        $quote->delete();

        return response()->noContent();
    }
}
