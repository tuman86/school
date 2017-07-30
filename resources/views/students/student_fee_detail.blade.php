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

  <!-- if there are creation errors, they will show here -->
  <?php $feeTotal = 0; ?>
  <table style="width:100%;" class="table table-striped projects_list_table">
    <tr>
      <th align="left">Bill Number</th>
      <th align="left">Student Name</th>
      <th align="left">Class</th>
      <th align="left">Section</th>
      <th align="left">Collected By</th>
      <th align="left">Collection Date</th>
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
          <?php echo ucfirst($value->user->name);?>
        </td>
        <td>
             <?php echo date('d-m-Y',strtotime($value->fee_date));?>
        </td>
        <td>
          <!-- <a class="btn btn-small btn-info btngrp" href="{{ URL::to('student_fee_edit/' . $value->id) }}">Edit Fee</a> -->
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
@endsection
