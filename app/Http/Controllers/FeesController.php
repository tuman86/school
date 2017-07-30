<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fee;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fees.index', ['fees' => Fee::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $fee = new Fee;
      $fee->title       = $request->input('title');
      $fee->fee_amount      = $request->input('fee_amount');
      if ($fee->save()) {
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Successfully created Fee!');
      } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Fee is not created please try again!');
      }
      return redirect('fees');
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
    public function edit($id)
    {
      // get the nerd
      $fee = Fee::find($id);
      return view('fees.edit')->with('fee', $fee);
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
      $fee = Fee::find($id);
      $fee->title       = $request->input('title');
      $fee->fee_amount      = $request->input('fee_amount');
      if ($fee->save()) {
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Successfully updated Fee!');
      } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Fee is not updated please try again!');
      }
      return redirect('fees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $fee = Fee::find($id);
      if ($fee->delete()) {
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Successfully deleted Fee!');
      } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Fee is not deleted please try again!');
      }
      return redirect('fees');
    }
}
