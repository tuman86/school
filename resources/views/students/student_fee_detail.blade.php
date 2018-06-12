@extends('layouts.app')

@section('content')
<style>
.field{
  clear:both;
}
</style>
<div class="panel panel-default" id="divIdToPrint">
    <div class="panel-heading">Fee Details</div>
    <a href="{{ URL::to('student_fee', $student->id) }}" style="float:right;margin-right:10px;"> Submit Fees</a>
          <div class="panel-body">
            <div class="col-md-2">
              <select class="form-control selected-fee" name="school_session_id" id ="school_session_id">

                <option value="">Select Session</option>
                 @foreach($school_session as $session_val)
                   <option value="{{$session_val->id }}" <?php echo ($session_val->id == $selected_session ? "selected" : "")?>>{{$session_val->school_session}}</option>
                 @endforeach
               </select>
            </div>
  <!-- if there are creation errors, they will show here -->
  <?php $feeTotal = 0; ?>
  <table style="width:100%;" class="table table-striped projects_list_table">
    <tr>
      <th align="left">Bill Number</th>
      <th align="left">Student Name</th>
      <th align="left">Class</th>
      <th align="left">Section</th>
      <th align="left">Session</th>
      <th align="left">Collected By</th>
      <th align="left">Collection Date</th>
      <th align="left">Total Fee</th>
      <th align="left">Deposited On due date</th>
      <th align="left">Reciepts</th>
      <th align="left">Balance</th>
      <th align="left">Action</th>
    </tr>
  @foreach($studentFeeDet as $value)

        <tr>
          <td>
           <?php echo $value->id;?>
         </td>
          <td>
           <?php echo ucfirst($value->student->first_name) . ' ' . ucfirst($value->student->last_name);?>
         </td>
         <td>
          <?php echo $value->student->class;?>
        </td>
          <td>
           <?php echo ucfirst($value->student->section);?>
         </td>
         <td>
          <?php echo (!empty($value->school_session) ? $value->school_session->school_session : '-');?>
        </td>
         <td>
          <?php echo ucfirst($value->user->name);?>
        </td>
        <td>
             <?php echo date('d-m-Y',strtotime($value->fee_date));?>
        </td>
        <td>
          <?php
          $total_amount = $total_deposited = $total_balance = 0;
          foreach($value->fee_details as $fee_val) {
            $total_amount  += $fee_val->amount;
            $total_deposited  += $fee_val->deposited_fee;
            $total_balance += $fee_val->balance_fee;
          }

          $total_reciepts = 0;
          foreach($value->reciepts as $reciept) {
            $total_reciepts  += $reciept->amount;
          }

      echo $total_amount;
          ?>
        </td>
        <td>
             <?php echo ( $total_deposited );?>
        </td>
        <td>
             <?php echo $total_reciepts;?>
        </td>
        <td>
             <?php echo ($total_balance - $total_reciepts);?>
        </td>
        <td>
          <!--a class="btn btn-small btn-info btngrp" href="{{ URL::to('student_fee_edit/' . $value->id) }}">Edit Fee</a-->
          <a class="btn btn-small btn-success btngrp" href="{{ URL::to('student_fee_list/' . $value->id) }}">Show Bill</a>
          <?php if (sizeof($value->reciepts) > 0) { ?>
          <a class="btn btn-small btn-success btngrp" href="{{ URL::to('reciept_list/' . $value->id) }}">Show Reciepts</a>
          <?php } ?>
          <a class="btn btn-small btn-success btngrp" href="{{ URL::to('student_reciept/' . $value->id) }}">Add Reciept</a>
        </td>
      </tr>

@endforeach

</table>

    </div>
  </div>
<div>
  <script>
  $(document).on('change', '#school_session_id', function(e) {
    e.preventDefault();
    page_url = window.location.href;
    selected_session = $(this).val();
    window.location.href = page_url + '?session=' + selected_session
  })
  </script>
@endsection
