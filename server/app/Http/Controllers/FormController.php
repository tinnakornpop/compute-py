<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(Request $request)
    {
        $cpu   = array('AMD1', 'AMD2');
        $cpu_r = array('Ryzen-5', 'Ryzen-7', 'Ryzen-9');

        return view('form.index', [
            // Data
            'cpu'   => $cpu,
            'cpu_r' => $cpu_r,
            // Index
            'cpu_1'      => $request->input('cpu_1'),
            'cpu_spec_1' => $request->input('cpu_spec_1'),
            'cpu_2'      => $request->input('cpu_2'),
            'cpu_spec_2' => $request->input('cpu_spec_2'),

            'firstname' => $request->input('firstname'),
            'lastname'  => $request->input('lastname'),
            'mail'      => $request->input('mail'),
            'mail_c'    => $request->input('mail_c'),
            'loginid'   => $request->input('loginid'),
            'password'  => $request->input('password'),
            'password_c'=> $request->input('password_c'),
        ]);
    }

    public function confirm1(Request $request)
    {
        $cpu   = array('AMD1', 'AMD2');
        $cpu_r = array('Ryzen-5', 'Ryzen-7', 'Ryzen-9');

        $firstname = $request->input('firstname');
        $lastname  = $request->input('lastname');
        $mail      = $request->input('mail');
        $mail_c    = $request->input('mail_c');
        $loginid   = $request->input('loginid');
        $password  = $request->input('password');
        $password_c  = $request->input('password_c');
        return view('form.confirm1', [
            // Data
            'cpu'   => $cpu,
            'cpu_r' => $cpu_r,
            // Index
            'cpu_1'      => $request->input('cpu_1'),
            'cpu_spec_1' => $request->input('cpu_spec_1'),
            'cpu_2'      => $request->input('cpu_2'),
            'cpu_spec_2' => $request->input('cpu_spec_2'),
            // Confirm1 input
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'mail'      => $mail,
            'mail_c'    => $mail_c,
            'loginid'   => $loginid,
            'password'  => $password,
            'password_c'=> $password_c,
        ]);
    }
}
