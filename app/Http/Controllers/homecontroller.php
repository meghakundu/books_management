<?php

namespace App\Http\Controllers;
use App\Models\authors;
use App\Models\books;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    //
    public function indexAuthor(){
        $authors = authors::where('flag',1)->get();
        return view('authors.index',compact('authors'));
    }

    public function indexBooks(){
        $books= books::with(['author'])->whereNull('deleted_at')->get();
        return view('books.index',compact('books'));
    }

    public function createAuthors(){
        return view('authors.create');
    }

    public function storeAuthors(Request $req){
        $req->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email:rfc,dns|unique:authors,email'
            ]);
        $input = [
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'email' => $req->email,
            'flag'=>1
        ];
            authors::create($input);
        return redirect('/authors')->with('success','Author created successfully');
    }

    public function editAuthors($id){
        $data = authors::where('id',$id)->first();
        return view('authors.edit',compact('data'));

    }
    public function updateAuthors(Request $request,$id){
        $request->validate([
            'first_name' => 'required|string',
            'email' => 'required|email:rfc,dns|unique:authors,email',
            'last_name' => 'required|string'
         ]);
        
         authors::where('id',$id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        return redirect('/authors')->with('success','Author updated successfully');
    }
    public function deleteAuthors(Request $request,$id){
        authors::where('id',$id)->update([
            'flag' => 0
        ]);
        return redirect('/authors')->with('success','Author deleted successfully');
   
    }
    public function createBooks(){
        $authors = authors::all();
        return view('books.create',compact('authors'));
    }

    public function storeBooks(Request $req){ 
        $req->validate([
        'name' => 'required|string',
        'published_at' => 'required',
        'author_id' => 'required|numeric'
        ]);
    $input = [
        'name' => $req->name,
        'published_at' => $req->published_at,
        'author_id' => $req->author_id,
        'flag'=>1
    ];
        books::create($input);

        return redirect('/books')->with('success','Books created successfully');
    }

    public function editBooks($id){
        $data = books::where('id',$id)->first();
        $authors = authors::all();
        return view('books.edit',compact('data','authors'));

    }
    public function updateBooks(Request $request,$id){
        $request->validate([
            'name' => 'required|string',
            'published_at' => 'required',
            'author_id' => 'required'
         ]);
        
         books::where('id',$id)->update([
            'name' => $request->name,
            'published_at' => $request->published_at,
            'author_id' => $request->author_id,
        ]);

        return redirect('/books')->with('success','Book updated successfully');
   
    }
    public function deleteBooks(Request $request,$id){
        // books::where('id',$id)->update([
        //     'flag' => 0
        // ]);
        $product = books::find( $id )->delete();
       // $product->delete();
        return redirect('/books')->with('success','Book deleted successfully');
   
    }

}
