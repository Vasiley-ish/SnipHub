<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;

use App\Models\Categorys;
use App\Models\Subcategorys;

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
     
        $cats = new Categorys();
        $subcats = new Subcategorys();
        return view('index', ['cats' => $cats->orderBy('created_at', 'asc')->get()], ['subcats' => $subcats->orderBy('created_at', 'asc')->get()]);
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
