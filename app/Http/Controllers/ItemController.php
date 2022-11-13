<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;

class ItemController extends Controller
{

    function addItem(Request $req)
    {
        $item = new Items();
        $item->sno = null;
        $item->item = $req->item;
        $item->save();
        return redirect('/');
    }

    function showItem()
    {
        $items = Items::all();
        return view('index', ['items' => $items]);
    }

    function deleteItem($sno)
    {
        $item = Items::find($sno);
        $item->delete();
        return redirect('/');
    }

    function editItem($sno)
    {
        $items = Items::find($sno);
        return view('edit', ['items' => $items]);
    }

    function updateItem(Request $req)
    {
        $item = Items::find($req->sno);
        $item->item = $req->item;
        $item->save();
        return redirect('/');
    }
}
