<?php

namespace App\Http\Controllers;

use App\SchoolSession;
use Illuminate\Http\Request;
use App\Fee;
use App\StudentFee;
use Auth;
use App\FeeDetail;
use App\RecieptDetail;
use App\Reciept;

class SchoolSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('school_sessions.index', ['school_sessions' => SchoolSession::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school_sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $schoolSession = new SchoolSession;
        $schoolSession->school_session      = $request->input('school_session');
        if ($schoolSession->save()) {
          $request->session()->flash('message.level', 'success');
          $request->session()->flash('message.content', 'School Session is created Successfully!');
        } else {
          $request->session()->flash('message.level', 'danger');
          $request->session()->flash('message.content', 'School Session is not created please try again!');
        }
        return redirect('guardians');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SchoolSession  $schoolSession
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolSession $schoolSession)
    {
        return view('school_sessions.show', ['school_session' => SchoolSession::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SchoolSession  $schoolSession
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolSession $schoolSession)
    {
      $school_session = SchoolSession::find($schoolSession->id);
      return view('school_sessions.edit')->with('school_session', $school_session);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SchoolSession  $schoolSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolSession $schoolSession)
    {
      $school_session = SchoolSession::find($schoolSession->id);
      $school_session->school_session       = $request->input('school_session');
      if ($school_session->save()) {
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Successfully updated School Session!');
      } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'School session is not updated please try again!');
      }
      return redirect('school_sessions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SchoolSession  $schoolSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolSession $schoolSession)
    {
      $schoolSession= SchoolSession::find($id);
      if ($schoolSession->delete()) {
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Successfully deleted School Session!');
      } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'School Session is not deleted please try again!');
      }
      return redirect('school_sessions');
    }

    public function update_all_records(){
      $firstSession = SchoolSession::first()->id;
      StudentFee::where('school_session_id', '=', 0)
      ->update(['school_session_id' => $firstSession]);

      FeeDetail::where('school_session_id', '=', 0)
      ->update(['school_session_id' => $firstSession]);
      echo 'I am here' . $firstSession;
    }
}
