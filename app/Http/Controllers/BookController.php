<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Validator;
use Auth;
use App\Models\User;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'asc')->get();
        return view('books', ['books' => $books]);
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
    public function store(Request $request)
    {
		// バリデーション
	    $validator = Validator::make($request->all(), [
	        'item_name'   => 'required | max:255',
	        'maker' => 'required | max:255',
	        'item_number' => 'required | max:255',
	        'item_amount' => 'required | max:255',
	        'published'   => 'required',
	        'image' => 'required'
	    ]);
	    
	   

			// バリデーション:エラー時の処理
	    if ($validator->fails()) {
	        return redirect('/')
	            ->withInput()
	            ->withErrors($validator);
	    }
	    
	    //画像のアップロード
	    $time = date("YmdHis");
	    $image = $request->file('image');
        // 画像がアップロードされていれば、storageに保存
        if($request->hasFile('image')){
            $path = \Storage::putFileAs('/public', $image, Auth::id().'_'.'1F'.$time.'.jpg');
            $path = explode('/', $path);
        }else{
            $path = null;
        }
	    
        $image2 = $request->file('image2');
        // dd($image);
        // 画像がアップロードされていれば、storageに保存
        if($request->hasFile('image2')){
            $path = \Storage::putFileAs('/public', $image2, Auth::id().'_'.'2F'.$time.'.jpg');
            $path = explode('/', $path);
        }else{
            $path = null;
        }
        
        $image3 = $request->file('image3');
        // dd($image);
        // 画像がアップロードされていれば、storageに保存
        if($request->hasFile('image3')){
            $path = \Storage::putFileAs('/public', $image3, Auth::id().'_'.'etc'.$time.'.jpg');
            $path = explode('/', $path);
        }else{
            $path = null;
        }
        			
		// 登録処理
        $book = new Book;
        $book->user_id    =  Auth::id();
        $book->item_name =    $request->item_name;
        $book->maker =        $request->maker;
        $book->item_number =  $request->item_number;
        $book->item_amount =  $request->item_amount;
        $book->published =    $request->published;
        $book->image =    $request->image; //画像アップロード
        $book->image2 =    $request->image2; //画像アップロード
        $book->image3 =    $request->image3; //画像アップロード
        
        $book->create_at =    $request->create_at; //画像アップロード
        $book->update_at =    $request->update_at; //画像アップロード
        
        
        $book->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('booksedit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
		// バリデーション
		$validator = Validator::make($request->all(), [
		    'id' => 'required', // storeに対しての追加分
		    'maker' => 'required | max:255',
		    'item_name' => 'required | max:255',
		    'item_number' => 'required | max:255',
		    'item_amount' => 'required | max:255',
		    'published' => 'required',
		    'image' => 'required'
		]);

		// バリデーション:エラー
		if ($validator->fails()) {
		    return redirect('/booksedit/'.$request->id)
		        ->withInput()
		        ->withErrors($validator);
		}

        $book = Book::find($request->id);
        $book->item_name =    $request->item_name;
        $book->maker =        $request->maker;
        $book->item_number =  $request->item_number;
        $book->item_amount =  $request->item_amount;
        $book->published =    $request->published;
        $book->image =    $request->image; //画像アップロード
        $book->image2 =    $request->image2; //画像アップロード
        $book->image3 =    $request->image3; //画像アップロード
        
        // $book->create_at =    $request->create_at; 
        // $book->update_at =    $request->update_at; 
        
        $book->save(); 
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/');
    }
    
    public function likeBook(Book $book)
    {
    		$book->favoriteBook()->attach(Auth::id());
    		return back();
    }

    public function unlikeBook(Book $book)
    {
        $book->favoriteBook()->detach(Auth::id());
        return back();
    }
    // 管理者ページ ※便宜的にBookコントローラーに作成
	public function adminIndex()
	{
		// 1対多の複数の例
		$users = User::with('books')->get();
		return view('admin', ['users' => $users]);
	}

}