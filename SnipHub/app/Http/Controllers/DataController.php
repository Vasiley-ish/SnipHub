<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorys;
use App\Models\Subcategorys;
use App\Models\Messages;

use App\Http\Requests\MessageRequest;
use App\Http\Requests\CategoryRequest;

use App\Http\Controllers\Auth;

class DataController extends Controller
{
   
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

    public  function showDashboard(CategoryRequest $req){

        $current_user = $req->user()->name;

        $messages = new Messages();
        $cats = new Categorys();
        $subcats = new Subcategorys();
        return view('dashboard', 
        // ['cats' => $cats->orderBy('created_at', 'asc')->get()],                //Почему то на страницу передаются только первые 2 массива, а третий игнорируется
        ['subcats' => $subcats->orderBy('created_at', 'asc')->get()],   
        ['messages' => $messages->where('author', $current_user)->orderBy('created_at', 'desc')->get()],
        );
    }

    public  function showAdmin(){
     
        $cats = new Categorys();
        $subcats = new Subcategorys();
        return view('admin', ['cats' => $cats->orderBy('created_at', 'asc')->get()], ['subcats' => $subcats->orderBy('created_at', 'asc')->get()]);
    }

    public  function showAdminUserMessages(){
     
        $messages = new Messages();
       
        return view('admin-messages', ['messages' => $messages->orderBy('created_at', 'desc')->get()]);
    }

   

}
