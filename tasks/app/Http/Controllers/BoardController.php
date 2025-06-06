<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(){
        return response()->json(Board::all());
    }

    public function show(int $id)
    {
        // separate
        $board = Board::find($id);
        $items = $board->items;

        // together
        // make $board and $items in the same collections   
        $board = Board::with('items')->where('id', $id)->first();

        return response()->json($board);
    }
}
