<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Poem;

class PoemController extends Controller
{
    /**
     * index 
    */
    public function index(Request $request)
    {
        // todo 
    }


    /**
     * show
     */
    public function show(Request $request, $id)
    {
        $poem = Poem::find($id);
        return view('poem', compact('poem'));
    }
}
