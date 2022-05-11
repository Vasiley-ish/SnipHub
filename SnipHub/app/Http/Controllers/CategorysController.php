<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;

use App\Models\Categorys;
use App\Models\Subcategorys;
use App\Models\Comments;
use App\Models\AppointmentModel;
use App\Models\OrderCallModel;

class CategorysController extends Controller
{
  

    public  function createCategory(CategoryRequest $req){
     
        $form = new Categorys();

        $form->category_name = $req->input('newCategory');

        $form->save();

        return redirect()->route('admin', [ '#tab3' ]);
    }


    public  function createSubcategory(CategoryRequest $req){
     
        $form = new Subcategorys();
        $form->subcategory_parent = $req->input('category');
        $form->subcategory_name = $req->input('newSubcategory');

        $form->save();

        return redirect()->route('admin', [ '#tab3' ]);
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

                // данные для вывода читабельных дней недели и месяцев
        // Вывод месяца на русском
        $monthes = array(
            1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
            5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
            9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
        );
        // для вывода используй $monthes[(date('n', strtotime($date)))] 

        // Вывод дня недели
        $days = array(
            'Вс', 'Пн', 'Вт', 'Ср',
            'Чт', 'Пт', 'Сб'
        );
        // для вывода используй $days[(date('w', strtotime($date)))]
     
        $cats = new Categorys();
        $subcats = new Subcategorys();
        $calls = new OrderCallModel();
        $appointments = new AppointmentModel();

        return view('admin',  [ '#tab1' ])
        ->with(['cats' => $cats->orderBy('created_at', 'asc')->get()])
        ->with(['subcats' => $subcats->orderBy('created_at', 'asc')->get()])
        ->with(['appointments' => $appointments->orderBy('day', 'asc')->orderBy('time', 'asc')->get()])
        ->with(['calls' => $calls->orderBy('created_at', 'asc')->get()])
        
        ->with(['monthes' => $monthes])
        ->with(['days' => $days])
        ;
    }

    public  function deleteOutdatedAppointments(){
     
        $today = date('Y-m-d');

        AppointmentModel::where('day', '<', $today)->delete();
        
        return redirect()->route('admin', [ '#tab1' ]);
    }

}
