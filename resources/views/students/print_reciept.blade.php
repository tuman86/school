@extends('layouts.app')

@section('content')
<style>
.field{
  clear:both;
}
</style>
<div class="panel panel-default" id="divIdToPrint">
  <div style="padding:10px;">

  </div>
    <div class="panel-heading">
      <img class="img-rounded"
           src="{{asset("/assets/img/logo.jpg")}}">
      <h1>Govind Vidya Mandir Rudrapur (U.S.N.)</h1>
      <h2>Fee Details</h2>
    </div>
          <div class="panel-body">
            <b>Student Name :- <?php echo ucfirst($student->first_name) ." ".  ucfirst($student->last_name) ?></b><br>
            <b>Class :- <?php echo $student->class ?></b><br>
            <b>Section :- <?php echo ucfirst($student->section) ?></b><br>
            <b>Bill Numbner :- <?php echo $billNumber ?></b><br>
            <b>Reciept Numbner :- <?php echo $feeDetail->first()->id ?></b><br>

  <!-- if there are creation errors, they will show here -->
  <?php $feeTotal = 0; ?>
  <table style="width:100%;" border="1">
    <tr>
      <th align="left">Collected By</th>
        <th align="left">Collection Date</th>
      <th align="left">Amount</th>
    </tr>

  <?php
  foreach($feeDetail as $value) { ?>

        <tr>
          <td>
           <?php echo $value->user->name;?>
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
