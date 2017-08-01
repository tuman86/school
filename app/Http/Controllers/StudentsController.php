<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Student;
use App\Fee;
use App\StudentFee;
use Auth;
use App\FeeDetail;
use App\RecieptDetail;
use App\Reciept;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index', ['students' => Student::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $student = new Student;
      $student->create($request->all());
      return redirect('students');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
      return view('students.show', ['student' => Student::findOrFail($student->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
      $student_det = Student::find($student->id);
      return view('students.edit')->with('student', $student_det);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
      $student = Student::find($student->id);
      $student->student_admission_id       = $request->input('student_admission_id');
      $student->first_name       = $request->input('first_name');
      $student->last_name      = $request->input('last_name');
      $student->father_name      = $request->input('father_name');
      $student->mother_name      = $request->input('mother_name');
      $student->mobile      = $request->input('mobile');
      $student->email      = $request->input('email');
      $student->gender      = $request->input('gender');
      $student->admission_number      = $request->input('admission_number');
      $student->date_of_birth      = $request->input('date_of_birth');
      $student->admission_date      = $request->input('admission_date');
      $student->address      = $request->input('address');
      $student->city      = $request->input('city');
      $student->state      = $request->input('state');
      $student->country      = $request->input('country');
      $student->zip_code      = $request->input('zip_code');
      $student->aadhar_number      = $request->input('aadhar_number');
      $student->bank_account_number      = $request->input('bank_account_number');
      $student->ifsc_code      = $request->input('ifsc_code');
      $student->comments      = $request->input('comments');
      $student->category      = $request->input('category');
      $student->religion      = $request->input('religion');
      $student->mothier_tongue      = $request->input('mothier_tongue');
      $student->rte_act      = $request->input('rte_act');
      $student->medium_instruction      = $request->input('medium_instruction');
      $student->house      = $request->input('house');
      $student->session      = $request->input('session');
      $student->class      = $request->input('class');
      $student->section      = $request->input('section');
      $student->nationality      = $request->input('nationality');
      $student->student_photo      = $request->input('student_photo');
      if ($student->save()) {
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Successfully updated Student!');
      } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Student is not updated please try again!');
      }
      return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $student = Student::find($id);
      if ($student->delete()) {
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Successfully deleted Student!');
      } else {
        $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Student is not deleted please try again!');
      }
      return redirect('students');
    }

    public function student_fee($id)
    {
        return view('students.student_fee', ['student' => Student::findOrFail($id), 'fees' => Fee::All()]);
    }

    public function post_student_fee(Request $request)
    {

      $fee = new StudentFee;
      $studentFee = [];
      $user_id = Auth::id();
      $fee_detail = new FeeDetail;
      //$reciept_detail = new RecieptDetail;
      $fee->student_id = $request->input('student_id');
      $fee->user_id = $user_id;
      $fee->fee_date = $request->input('fee_date');
      $fee->save();
      foreach($request->input('student_fee') as $key => $val) {

        if (array_key_exists("fee", $val)) {
          //if (!empty($val['fee'])) {
            $fee_stu = explode('+', $val['fee']);
            $balance_fee = ($fee_stu[1] - $val['amount']);
            $fee_detail->create(['fee_id' => $fee_stu[0], 'amount' =>$fee_stu[1],  'student_fee_id' => $fee->id, 'deposited_fee' => $val['amount'], 'balance_fee' => $balance_fee]);
            //$reciept_detail->create(['fee_id' => $fee_stu[0], 'amount' =>$val['amount'],  'student_fee_id' => $fee->id]);
          //}
        }
      }
      return redirect()->action('StudentsController@student_fee_detail', ['id' => $request->input('student_id')]);
    }

    public function student_fee_detail($id){
      $studentFeeDet = StudentFee::where('student_id', $id)->get();
      return view('students.student_fee_detail', ['studentFeeDet' => $studentFeeDet, 'student' => Student::find($id)]);
    }

    public function student_fee_list($id){
      $studentFees = StudentFee::find($id);
      return view('students.student_fee_list', ['studentFeeDet' => $studentFees]);
    }

    public function student_fee_edit($id) {
      $studentFees = StudentFee::find($id);
      $fees = Fee::All();
      return view('students.student_fee_edit', ['studentFeeDet' => $studentFees, 'fees' => $fees]);
    }

    public function post_fee_edit(Request $request) {
      foreach($request->input('student_fee') as $key => $val) {
        $feeDetail = FeeDetail::find($val['id']);
        $reciept_detail = new RecieptDetail;
        if (array_key_exists("fee", $val)) {
          //if (!empty($val['fee'])) {
          $fee_stu = explode('+', $val['fee']);
          $balance_fee = ($fee_stu[1] - $val['amount']);
          if ($feeDetail->balance_fee != $balance_fee) {
            //$reciept_detail->create(['fee_id' => $fee_stu[0], 'amount' =>($val['amount'] - $feeDetail->deposited_fee),  'student_fee_id' => $request->input('id')]);
          }
            $feeDetail->id =  $val['id'];
            $feeDetail->fee_id =  $fee_stu[0];
            $feeDetail->amount =  $fee_stu[1];
            $feeDetail->deposited_fee = $val['amount'];
            $feeDetail->balance_fee = $balance_fee;
            $feeDetail->save();
            //$fee_detail->create(['fee_id' => $fee_stu[0], 'amount' =>$fee_stu[1], 'deposited_fee' => $val['amount'], 'balance_fee' => $balance_fee]);
          //}
        }
      }
      return redirect()->action('StudentsController@student_fee_detail', ['id' => $request->input('student_id')]);
    }

    public function fee_reciept($id){
      $studentFees = StudentFee::find($id);
      return view('students.fee_reciept', ['studentFeeDet' => $studentFees]);
    }

    public function student_reciept($id)
    {
        return view('students.student_reciept', ['studentFeeDetail' => StudentFee::findOrFail($id)]);
    }

    public function post_reciept_fee(Request $request) {
        // foreach($request->input('student_fee') as $key => $val) {
        //
        //
        //   $reciept_detail = new RecieptDetail;
        //   if (array_key_exists("fee", $val)) {
        //     //if (!empty($val['fee'])) {
        //     $fee_stu = explode('+', $val['fee']);
        //     $feeDetail = FeeDetail::where([['fee_id', '=', $fee_stu[0]],['student_fee_id', '=', $request->input('student_id')]])->first();
        //     //echo '<pre>';print_r($feeDetail);die;
        //   //  if ($feeDetail->balance_fee != $balance_fee) {
        //       $reciept_detail->create(['fee_id' => $fee_stu[0], 'amount' =>($val['amount']),  'student_fee_id' => $request->input('student_id')]);
        //     //}
        //
        //       $tot_deposit = $val['amount'] + $feeDetail->deposited_fee;
        //       $balance_fee = ($feeDetail->amount - $tot_deposit);
        //       $feeDetail->deposited_fee = $tot_deposit;
        //       $feeDetail->balance_fee = $balance_fee;
        //       $feeDetail->save();
        //       //$fee_detail->create(['fee_id' => $fee_stu[0], 'amount' =>$fee_stu[1], 'deposited_fee' => $val['amount'], 'balance_fee' => $balance_fee]);
        //     //}
        //   }
        // }
        $student = new Reciept;
        $student->student_id = $request->input('student_id');
        $student->amount = $request->input('amount');
        $student->student_fee_id = $request->input('id');
        $student->user_id = Auth::id();
        $student->save();
        return redirect()->action('StudentsController@student_fee_detail', ['id' => $request->input('student_id')]);

    }

    public function reciept_list($id)
    {
        $reciept = Reciept::where('student_fee_id', '=', $id)->groupBy('created_at')->get();
        return view('students.reciept_list', ['student' => Student::findOrFail($reciept->first()->student_id), 'billNumber' => $id ,  'feeDetail' => $reciept]);
    }

    public function print_reciept(Request $request, $id)
    {
      $recipt_details = Reciept::where([['student_fee_id', '=', $id], ['created_at', '=', $request->input('fee_date')]])->get();
      return view('students.print_reciept', ['student' => Student::findOrFail($recipt_details->first()->student_id), 'feeDetail' => $recipt_details, 'billNumber' => $id] );
    }

    public function my_reports() {
      return view('students.my_reports');
    }

    public function get_my_reports(Request $request) {
      $user_id = Auth::id();
      //$recipt_details = Reciept::where('user_id', '=', $user_id).whereDate('created_at', $request->input('created_at'))->get();
      $recipt_details = Reciept::where([['user_id', '=', $user_id], ['created_at', '>=', date('Y-m-d', strtotime($request->input('created_at'))) . ' 00:00:00'], ['created_at', '<=', date('Y-m-d', strtotime($request->input('created_at'))) . ' 23:59:59']])->get();
      return view('students.my_reports', ['recipt_detail' => $recipt_details]);
    }

}
