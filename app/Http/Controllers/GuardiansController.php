<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guardian;

class GuardiansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $guardians = Guardian::where('student_id', $request->input('std_id'))->get();
        return view('guardians.index', ['guardians' => $guardians, 'std_id' => $request->input('std_id')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('guardians.create', ['std_id' => $request->input('std_id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $guardian = new Guardian;
      $guardian->first_name       = $request->input('first_name');
      $guardian->last_name       = $request->input('last_name');
      $guardian->email       = $request->input('email');
      $guardian->relation       = $request->input('relation');
      $guardian->contact_number       = $request->input('contact_number');
      $guardian->student_id       = $request->input('student_id');
      if ($guardian->save()) {
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Successfully created guardian!');
      } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Guardian is not created please try again!');
      }
      return redirect('guardians?std_id='. $request->input('student_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('fees.show', ['fee' => Fee::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
      // get the nerd
      $guardian = Guardian::find($id);
      return view('guardians.edit', ['guardian' => $guardian, 'std_id' => $request->input('std_id')]);
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
      $guardian = Guardian::find($id);
      $guardian->first_name       = $request->input('first_name');
      $guardian->last_name       = $request->input('last_name');
      $guardian->email       = $request->input('email');
      $guardian->relation       = $request->input('relation');
      $guardian->contact_number       = $request->input('contact_number');
      $guardian->student_id       = $request->input('student_id');
      if ($guardian->save()) {
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Successfully updated guardian!');
      } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Guardian is not updated please try again!');
      }
      return redirect('guardians?std_id='. $request->input('student_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $guardian = Guardian::find($id);
      if ($guardian->delete()) {
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Successfully deleted Guardian!');
      } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Guardian is not deleted please try again!');
      }
      return redirect('guardians?std_id='. $request->input('std_id'));
    }
}
