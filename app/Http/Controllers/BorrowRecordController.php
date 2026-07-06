<?php

namespace App\Http\Controllers;
use App\Models\BorrowRecord;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;

class BorrowRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = BorrowRecord::with(['book', 'member'])->orderBy('created_at', 'desc')->get();
        return view('borrows.index', ['borrows' => $borrows]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        $members = Member::all();
        return view('borrows.create', [
            'books' => $books,
            'members' => $members
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'book_id' => 'required',
            'member_id' => 'required',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date'
        ]);

        BorrowRecord::create($data);
        return redirect(route('borrow.index'))->with('success', 'Book Borrowed Successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(BorrowRecord $borrowRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $borrow = BorrowRecord::find($id);
        return view('borrows.edit', ['borrow' => $borrow]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $borrow = BorrowRecord::find($id);
        $data = $request = $request->validate([
            'return_date' => 'required|date'
        ]);

        $borrow->update($data);
        return redirect(route('borrow.index'))->with('success', 'Book Returned Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $borrow = BorrowRecord::find($id);
        $borrow->delete();
        return redirect(route('borrow.index'));
    }
}
