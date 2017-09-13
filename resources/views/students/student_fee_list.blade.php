@extends('layouts.app')

@section('content')
<style>
.panel{
  padding: 5px;
}
.field{
  clear:both;
}
h2, b{
  text-transform: uppercase;
}
</style>
<div class="panel panel-default" id="divIdToPrint" style="height:350px; width:450px;">
 <div style="width:100%;  ">
    <table>
      <tr>
        <!-- <td>
  <div style="width:25%; float:left;">
  <img style="height:176px;" class="img-rounded"
       src="{{asset("/assets/img/logo.jpg")}}">
     </div>
   </td>-->
   <td>
       <div style="width:100%;  padding:2px;">
  <h1 style="font-size:20px;">Govind Vidhya Mandir Inter College,<br/> Rudrapur, U. S. Nagar, 263153</h1>
</div>
</td>
</tr>
</table>
</div>
<div style=" border-top: 2px solid; width: 100%;">
    <div class="panel-heading" ><h2 style="font-size:20px;">Fee Details</h2></div>
          <div>
            Student Name :- <?php echo ucfirst($studentFeeDet->student->first_name) ." ".  ucfirst($studentFeeDet->student->last_name) ?>
			<br/>
           Class :- <?php echo $studentFeeDet->student->class ?> &nbsp;&nbsp;<?php echo ucfirst($studentFeeDet->student->section) ?>
			&nbsp;&nbsp;| &nbsp;&nbsp;
			Session :- <?php echo $studentFeeDet->student->session ?><br>
            Collected By :- <?php echo $studentFeeDet->user->name ?>&nbsp;&nbsp;| &nbsp;&nbsp;
            Collection Date :- <?php echo date('Y-m-d', strtotime($studentFeeDet->fee_date)) ?><br/>
  <!-- if there are creation errors, they will show here -->
  <?php $feeTotal = $remaining_bal = 0; ?>
  <table style="width:80%;" border="1" align="center">
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

  newWin.document.write('<html><body onload="window.print()" style="height:350px; width:450px;">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
  </script>
@endsection
