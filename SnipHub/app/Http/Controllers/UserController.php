<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;


use App\Models\OrderCallModel;
use App\Models\AppointmentModel;


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

    public  function orderCall(Request $req){

        $form = new OrderCallModel();

        $form->user = $req->user()->email;
        $form->phone = $req->input('phone');

        $form->save();

        return redirect()->route('dashboard')->with('success', 'Ваш номер телефона успешно отправлен! В скором времени ожидайте звонок');;
    }

    public  function showDashboard(Request $req){

        $appointments = new AppointmentModel();
        $current_user = $req->user()->name;

        return view('dashboard', 
        ['appointments' => $appointments->where('user_name', $current_user)->orderBy('day', 'asc')->orderBy('time', 'asc')->get()],
        );
    }
}
