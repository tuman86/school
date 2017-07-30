@extends('layouts.app')

@section('content')
<style>
.panel{
  padding: 30px;
}
.field{
  clear:both;
}
</style>
<div class="panel panel-default" id="divIdToPrint">
    <div class="panel-heading">Fee Details</div>
          <div class="panel-body">
            <b>Student Name :- <?php echo ucfirst($studentFeeDet->student->first_name) ." ".  ucfirst($studentFeeDet->student->last_name) ?></b><br>
            <b>Class :- <?php echo $studentFeeDet->student->class ?></b><br>
            <b>Section :- <?php echo ucfirst($studentFeeDet->student->section) ?></b><br>
            <b>Collected By :- <?php echo $studentFeeDet->user->name ?></b><br>
            <b>Collection Date :- <?php echo date('Y-m-d', strtotime($studentFeeDet->fee_date)) ?></b><br>
            <b>Session :- <?php echo $studentFeeDet->student->session ?></b><br><br><br>
  <!-- if there are creation errors, they will show here -->
  <?php $feeTotal = 0; ?>
  <table style="width:100%;" border="1">
    <tr>
      <th align="left">Fee Title</th>
        <th align="left">Payment Date</th>
      <th align="left">Amount</th>
    </tr>

  <?php
  foreach($studentFeeDet->reciept_details as $value) { ?>

        <tr>
          <td>
           <?php echo $value->fee->title;?>
         </td>
         <td>
          <?php echo $value->created_at;?>
        </td>
         <td>
             <?php echo $value->amount;?>
             <?php $feeTotal += $value->amount?>
           </td>
          </tr>

<?php } ?>
  <tr>
    <td>
       <strong>Total Fee</sprong>
       </td>
       <td></td>
<td>
         <strong><?php echo $feeTotal;?></strong>
</td>
  </tr>
</table>

    </div>
  </div>
  <input type='button' id='btn' value='Print' onclick='printDiv();'>
<div>
  <script type="text/javascript">
  function printDiv()
{

  var divToPrint=document.getElementById('divIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
  </script>
@endsection
