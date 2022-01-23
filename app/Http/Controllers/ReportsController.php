<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Auth;
use App\Report;
use App\User;
use Validator;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $userReports = Report::get();
        return view('reports/index', ['userReports' => $userReports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reports/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'content' => 'required|max:1000',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($validator->fails()) {
            return redirect('reports/create')
                ->withErrors($validator)
                ->withInput();
        }

        if (!$user) {
            return redirect('reports/create')
                ->withErrors(['user' => 'User is not Registered with our the system!'])
                ->withInput();
        }

        Mail::to($request->email)->send(new SendMailable($user->name, $request->content));
        $report = new Report;
        $report->email_content = $request->content;
        $report->user_email = $request->email;

        if (Mail::failures()) {
            $report->delivered = false;
        } else {
            $report->delivered = true;
        }
        $report->user_id = $user->id;
        $report->save();
        return redirect('/reports');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
