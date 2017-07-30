@extends('layouts.app')

@section('content')
<style>
.field{
  clear:both;
}
</style>
<div class="panel panel-default">
    <div class="panel-heading">Student Fees</div>
      <div class="panel-body">
  <!-- if there are creation errors, they will show here -->
  <h1>{{ ucfirst($studentFeeDet->student->first_name) . ' ' . ucfirst($studentFeeDet->student->last_name)}}</h1>
  {!! Form::open(['url' => ['post_fee_edit'], 'method' => 'post']) !!}
  <div class="field">
    <div class="form-group">
        <div class="col-md-6"></div>
      <div class="col-md-6">
        <!-- <a href="#" id="addNew" style="float:right">add More Fee</a> -->
        <input name="student_id" value="{{$studentFeeDet->student->id}}" type="hidden">
        <input name="class" value="{{$studentFeeDet->student->class}}" type="hidden">
        <input name="section" value="{{$studentFeeDet->student->section}}" type="hidden">
        <input name="id" value="{{$studentFeeDet->id}}" type="hidden">
      </div>
  </div>

      <div class="field">
        <?php
        $ind = 0;
        foreach($studentFeeDet->fee_details as $fee_val) {?>
        <div class="form-group new-input-set">
          <div class="col-md-5">
            <input class="form-control" name="student_fee[{{$ind}}][id]" value="{{$fee_val->id}}" type="hidden">
            <select class="form-control selected-fee" name="student_fee[{{$ind}}][fee]">

              <option value="">Select Fee Type</option>
               <?php foreach($fees as $val) {
                 $selected = ($val->id == $fee_val->fee_id ? "selected" : "")
                 ?>
                 <option value="{{$val->id . '+' . $val->fee_amount}}"  {{$selected}}>{{$val->title}}</option>
               <?php } ?>
             </select>
         </div>
           <div class="col-md-5">
             <input class="form-control fee-amnt" name="student_fee[{{$ind}}][amount]" value="{{$fee_val->deposited_fee}}" type="text">

           </div>
           <div class="col-md-2">
             Balance :- {{$fee_val->balance_fee}}
           </div>
       </div>
       <?php
       $ind = $ind + 1;
     } ?>
     </div>

     <div class="field">
       <div class="form-group ">
         <div class="col-md-6 ">
          <a href="#" class="getTotal">Click Here to Calculate Total</a>
          <b style="float:right; display:none;" id="totalSumB">Total</b>
        </div>
          <div class="col-md-6">

            <span id="totalFeeAmountSpan"></span>
          </div>
      </div>
     </div>
     <div class="field">
       <div class="form-group">
           <div class="col-md-6 col-md-offset-4">
          <?php echo Form::submit('Save', ['class' => 'btn btn-primary']);?>
        </div>
      </div>
    </div>


  {!! Form::close() !!}
    </div>
  </div>
<div>
  <script type="text/javascript">
  $(document).on('change', '.selected-fee', function(e){
    e.preventDefault();
    $('#totalFeeAmountSpan').html('');
    _this = $(this);
    var totalFee = parseInt($('#totalFeeAmount').val());
    var amount = parseInt(_this.val().split('+')[1]);
    _this.parent().next().children('input[type=text]').val(amount);
    //$('#totalFeeAmount').val((totalFee + amount))
    //$('#totalFeeAmountSpan').text((totalFee + amount))
  })

  $(document).on('click', '#addNew', function(e){
    e.preventDefault();
    $($('.new-input-set').first().clone()).insertAfter($('.new-input-set').last());
    $('.remove-field').show();
  })

  $(document).on('click', '.remove-field', function(e){
    e.preventDefault();
    if ($('.new-input-set').length <= 2) {
      $('.remove-field').hide();
    }
    $(this).parent().parent().remove();
  })

  $(document).on('blur', '.fee-amnt', function(e){
    e.preventDefault();
    _this = $(this);
    var actual_fee = _this.parent().prev().find('.selected-fee').val().split('+')[1];
    if (parseInt(_this.val()) > parseInt(actual_fee)){
      alert('You can not add more than ' + actual_fee + ' for this fee type!!')
    }
  })

  $(document).on('click', '.getTotal', function(e) {
    e.preventDefault();
    var amnt_sum = 0;
    $('.fee-amnt').each(function(){
        amnt_sum += parseFloat(this.value);
    });
    if (isNaN(amnt_sum)) {
      amnt_sum = 0
    }
    $('#totalSumB').show();
    $('#totalFeeAmountSpan').text(amnt_sum);
  })
  </script>
@endsection
