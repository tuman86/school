@extends('layouts.app')

@section('content')
<style>
.field{
  clear:both;
}
h2, b{
  text-transform: uppercase;
}
</style>
<div class="panel panel-default" id="divIdToPrint" style="height:350px; width:450px;">

  <div style="width:100%;">
    <table>
      <tr>
       <!--<td>
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
    <div ><h2 style="font-size:20px;">Receipt Detail</h2></div>
          <div class="panel-body">
            Student Name :- <?php echo ucfirst($student->first_name) ." ".  ucfirst($student->last_name) ?><br>
            Class :- <?php echo $student->class ?>&nbsp;&nbsp;| &nbsp;&nbsp;
            Section :- <?php echo ucfirst($student->section) ?><br>
            Fee Bill Number :- <?php echo $billNumber ?>&nbsp;&nbsp;| &nbsp;&nbsp;
            Receipt Number :- <?php echo $feeDetail->first()->id ?><br>

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
