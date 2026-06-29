<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $books = Book::all();
        $books = Book::orderBy('created_at', 'desc')->get();
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:3048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/books'), $imageName);
            $data['image'] = $imageName;
        }


        $book = Book::create($data);
        return redirect(route('book.index'))->with('success', 'Product Stored Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', ['book' => $book]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $book = Book::find($id);

        $data = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:3048'
        ]);

        if ($request->hasFile('image')) {
            // purani image delete karo
            if ($book->image) {
                $oldImage = public_path('uploads/books/' . $book->image);
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            // nayi image save karo
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/books'), $imageName);
            $data['image'] = $imageName;
        }

        $book->update($data);
        return redirect(route('book.index'))->with('success', 'Book Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect(route('book.index'))->with('success', 'Product Deleted Successfully!');
    }
}
