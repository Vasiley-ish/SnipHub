<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;

use App\Models\Categorys;
use App\Models\Subcategorys;
use App\Models\Comments;

class CategorysController extends Controller
{
  

    public  function createCategory(CategoryRequest $req){
     
        $form = new Categorys();

        $form->category_name = $req->input('newCategory');

        $form->save();

        return redirect()->route('admin');
    }


    public  function createSubcategory(CategoryRequest $req){
     
        $form = new Subcategorys();
        $form->subcategory_parent = $req->input('category');
        $form->subcategory_name = $req->input('newSubcategory');

        $form->save();

        return redirect()->route('admin');
    }

    public  function showIndex(){
        
        $comments = new Comments();
        $cats = new Categorys();
        $subcats = new Subcategorys();

        return view('index')
        ->with(['cats' => $cats->orderBy('created_at', 'asc')->get()])
        ->with(['subcats' => $subcats->orderBy('created_at', 'asc')->get()])
        ->with(['comments' => $comments->take(3)->orderBy('created_at', 'desc')->get()])
        ; 

    }

    public  function showPrice(){
     
        $cats = new Categorys();
        $subcats = new Subcategorys();
        return view('price', ['cats' => $cats->orderBy('created_at', 'asc')->get()], ['subcats' => $subcats->orderBy('created_at', 'asc')->get()]);
    }

    public  function showAdmin(){
     
        $cats = new Categorys();
        $subcats = new Subcategorys();
        return view('admin', ['cats' => $cats->orderBy('created_at', 'asc')->get()], ['subcats' => $subcats->orderBy('created_at', 'asc')->get()]);
    }


}
