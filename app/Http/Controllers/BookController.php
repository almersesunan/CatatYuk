<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBook(Request $request)
    {
        $request->validate([
            'book_name' => 'required',
        ], [
            'book_name.required' => 'Nama tidak boleh kosong',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Book::create($data);
        return redirect()->back()->with('status','Data Berhasil Ditambahkan!');
    }
 }
