<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;
use App\Http\Requests\CommentRequest;


use App\Models\OrderCallModel;
use App\Models\AppointmentModel;
use App\Models\Comments;


class UserController extends Controller
{

    public  function makeAppointment(AppointmentRequest $req){

        $form = new AppointmentModel();
        
        $form->email = $req->user()->email;
        $form->user_name = $req->user()->name;
        $form->day = $req->input('apointmentDay');
        $form->time = $req->input('apointmentTime');

        $form->save();

        return redirect()->route('dashboard')->with('success', 'консультация была успешно назначена');
    }

    public  function deleteAppointment($id){

        AppointmentModel::find($id)->delete();

        return redirect()->route('dashboard');

    }

    public  function makeComment(CommentRequest $req){

        $form = new Comments();

        $form->author = $req->user()->name;
        $form->comment = $req->input('comment');
       
        if($req->file('photo') != null) {
            $form->photo = substr($req->file('photo')->store('public/images') , 13);
        }

        $form->save();

        return redirect()->route('dashboard')->with('success', 'Успешно! Спасибо за оставленный отзыв');
    }

    public  function orderCall(Request $req){

        $form = new OrderCallModel();

        $form->user = $req->user()->email;
        $form->phone = $req->input('phone');

        $form->save();

        return redirect()->route('dashboard')->with('success', 'Ваш номер телефона успешно отправлен! В скором времени ожидайте звонок');
    }

    public  function showDashboard(Request $req){

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

        $appointments = new AppointmentModel();
        $current_user = $req->user()->name;

        return view('dashboard')
        ->with(['appointments' => $appointments->orderBy('day', 'asc')->orderBy('time', 'asc')->get()])
        ->with(['user_appointment' => $appointments->where('user_name', $current_user)->get()])
        ->with(['monthes' => $monthes])
        ->with(['days' => $days])
        ;
        }
}
