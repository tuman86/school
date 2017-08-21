@extends('layouts.app')

@section('content')
<style>
.panel{
  padding: 30px;
}
.field{
  clear:both;
}
h2, b{
  text-transform: uppercase;
}
</style>
<div class="panel panel-default" id="divIdToPrint" style="height:630px; width:874px">
  <div style="width:100%;  float:left;">
    <table>
      <tr>
        <td>
  <div style="width:25%; float:left;">
  <img style="height:176px;" class="img-rounded"
       src="{{asset("/assets/img/logo.jpg")}}">
     </div>
   </td>
   <td>
       <div style="width:100%; float:left; padding:17px;">
  <h1 style="font-size:32px;">GOVIND VIDHYA MANDIR I.COLLEGE
  RUDRAPUR,U.S.NAGAR,263153</h1>
</div>
</td>
</tr>
</table>
</div>
<div style="float: left; margin-top: 15px; border-top: 2px solid; width: 100%;">
    <div class="panel-heading"><h2>Fee Details</h2></div>
          <div class="panel-body">
            <b>STUDENT NAME :- <?php echo ucfirst($studentFeeDet->student->first_name) ." ".  ucfirst($studentFeeDet->student->last_name) ?></b><br>
            <b>CLASS :- <?php echo $studentFeeDet->student->class ?></b><br>
            <b>SECTION :- <?php echo ucfirst($studentFeeDet->student->section) ?></b><br>
            <b>COLLECTED BY :- <?php echo $studentFeeDet->user->name ?></b><br>
            <b>COLLECTION DATE :- <?php echo date('Y-m-d', strtotime($studentFeeDet->fee_date)) ?></b><br>
            <b>SECTION :- <?php echo $studentFeeDet->student->session ?></b><br><br><br>
  <!-- if there are creation errors, they will show here -->
  <?php $feeTotal = $remaining_bal = 0; ?>
  <table style="width:100%;" border="1">
    <tr>
      <th align="left">Fee Title</th>
      <th align="left">Fee Amount</th>
      <!-- <th align="left">Amount Paid</th> -->
      <!-- <th align="left">Balance</th> -->
    </tr>

  <?php foreach($studentFeeDet->fee_details as $value) { ?>

        <tr>
          <td>
           <?php echo $value->fee->title;?>
         </td>
         <td>
          <?php echo $value->amount;
          $feeTotal += $value->amount;

          ?>
        </td>
         <!-- <td> -->
             <?php //echo $value->deposited_fee;?>
             <?php //$feeTotal += $value->deposited_fee?>
           <!-- </td> -->
           <!-- <td> -->
               <?php //echo $value->balance_fee;?>
               <?php //$remaining_bal += $value->balance_fee?>
             <!-- </td> -->
          </tr>

<?php } ?>
  <tr>
    <td>
       <strong>Total Fee</strong>
       </td>
       <!-- <td> -->
       <!-- </td> -->
<td>
         <strong><?php echo $feeTotal;?></strong>
</td>
<!-- <td> -->
<?php //echo $remaining_bal;?>
<!-- </td> -->
  </tr>
</table>
  </div>
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

  newWin.document.write('<html><body onload="window.print()" style="height:630px; width:874px">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
  </script>
@endsection
