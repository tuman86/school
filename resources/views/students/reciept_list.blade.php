@extends('layouts.app')

@section('content')
<style>
.field{
  clear:both;
}
</style>
<div class="panel panel-default" id="divIdToPrint">
    <div class="panel-heading">Fee Reciept Details</div>
          <div class="panel-body">
            <b>Student Name :- <?php echo ucfirst($student->first_name) ." ".  ucfirst($student->last_name) ?></b><br>
            <b>Class :- <?php echo $student->class ?></b><br>
            <b>Section :- <?php echo ucfirst($student->section) ?></b><br>
            <b>Bill Number :- <?php echo $billNumber; ?></b><br>

  <!-- if there are creation errors, they will show here -->
  <?php $feeTotal = 0; ?>
  <table style="width:100%;" border="1">
    <tr>
      <th align="left">Reciept Number</th>
      <th align="left">Payment Date</th>
      <th align="left">Reciept Amount</th>
      <th align="left">Action</th>
    </tr>

  <?php
  foreach($feeDetail as $value) { ?>

        <tr>
          <td>
           <?php echo $value->id;?>
         </td>
         <td>
          <?php echo $value->created_at;?>
        </td>
        <td>
         <?php echo $value->amount;?>
       </td>
         <td>
           <a class="btn btn-small btn-success btngrp" href="{{ URL::to('print_reciept/' . $billNumber) }}?fee_date={{$value->created_at}}">Print Reciept</a>
           </td>
          </tr>

<?php } ?>

</table>

    </div>
  </div>

<div>
@endsection
