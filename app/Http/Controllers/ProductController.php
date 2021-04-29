<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Awe\JsonUtility;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $file="products.json";
    public function index()
    {
         
        $products=JsonUtility::makeProductArray(public_path($this->file));
        return view('products.index',['products'=>$products]);
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
        $result=JsonUtility::addNewProduct(public_path($this->file),  $request->producttype,  $request->title,  $request->fname,  $request->sname,  $request->price,  $request->pages);
        return  $result?
                redirect()->back()->with(['success'=>'success']):
                redirect()->back()->with(['error'=>'error']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=JsonUtility::getProductWithId(public_path($this->file),$id);
        return view('products.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result=JsonUtility::updateProductWithId(public_path($this->file),$id, $request->title,  $request->fname,  $request->sname,  $request->price,  $request->pages);
        return  $result?
                redirect('/')->with(['success'=>'success']):
                redirect('/')->with(['error'=>'error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=JsonUtility::deleteProductWithId(public_path($this->file),$id);
        return  $result?
                redirect('/')->with(['success'=>'success']):
                redirect('/')->with(['error'=>'error']);
    }
}
