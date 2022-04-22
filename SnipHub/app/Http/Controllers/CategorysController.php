<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MessageRequest;
use App\Http\Requests\CategoryRequest;

use App\Models\Categorys;
use App\Models\Subcategorys;
use App\Models\Messages;

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


    public  function createMessage(CategoryRequest $req){
     
        $form = new Messages();
        $form->author = $req->user()->name;
        $form->telephone = $req->input('phone');
        $form->servise = $req->input('category');
        $form->how_to_contact = $req->input('contact');

        ($req->input('comment') != null) 
        ? $form->message = $req->input('comment')
        : $form->message = 'Клиент не оставил сообщение';
        
        $form->read = '0';
        
        $form->save();

        return redirect()->route('dashboard');
    }

    public  function deleteMessage($id, CategoryRequest $req){
        
        $current_user = $req->user()->name;

        Messages::find($id)->delete();

        if ($current_user == 'Admin') {return redirect()->route('admin-messages');}
        
        return redirect()->route('dashboard');
        
    }

    public  function markAsSeen ($id, CategoryRequest $req){
      
        $form =  Messages::find($id);

        $form->read = '1';
        
        $form->save();
        
        return redirect()->route('admin-messages');
        
    }

}
