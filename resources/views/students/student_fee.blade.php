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
  <h1>{{ ucfirst($student->first_name) . ' ' . ucfirst($student->last_name)}}</h1>
  {!! Form::open(['url' => ['post_student_fee'], 'method' => 'post']) !!}
  <div class="field">
    <div class="form-group">
        <div class="col-md-6"></div>
      <div class="col-md-6">
        <a href="#" id="addNew" style="float:right">add More Fee</a>
        <input name="student_id" value="{{$student->id}}" type="hidden">
        <input name="class" value="{{$student->class}}" type="hidden">
        <input name="section" value="{{$student->section}}" type="hidden">
      </div>
  </div>
  <div class="field" style="margin-bottom: 20px; float: left; clear: both;  width: 100%;">
    <div class="form-group">
       <?php echo Form::label('fee_date', 'Fee Date', ['class' => 'col-md-4 control-label']);?>
       <div class="col-md-6">
         <?php echo Form::date('fee_date', \Carbon\Carbon::now(), ['class' => 'form-control']); ?>
       </div>
   </div>
 </div>

 <div class="field" style="margin-bottom: 20px; float: left; clear: both; width: 100%;">
   <div class="form-group">
      <?php echo Form::label('school_session', 'Session', ['class' => 'col-md-4 control-label']);?>
      <div class="col-md-6">
        <select class="form-control selected-fee" name="school_session_id">

          <option value=""> Session</option>
           @foreach($school_session as $session_val)
             <option value="{{$session_val->id }}">{{$session_val->school_session}}</option>
           @endforeach
         </select>
      </div>
  </div>
</div>
      <div class="field">
        <div class="form-group new-input-set">
          <div class="col-md-5">
            <select class="form-control selected-fee" name="student_fee[0][fee]">

              <option value="">Select Fee Type</option>
               @foreach($fees as $val)
                 <option value="{{$val->id . '+' . $val->fee_amount}}">{{$val->title}}</option>
               @endforeach
             </select>
         </div>
           <div class="col-md-5">
             <input class="form-control fee-amnt" name="student_fee[0][amount]" value="" type="text">
           </div>
           <div class="col-md-2">
             <a href="#" class="remove-field" style="display:none;">Remove</a>
           </div>
       </div>
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

  $(document).on('blur',)

  $(document).on('click', '#addNew', function(e){
    e.preventDefault();
    var ind = $('.new-input-set').length;
    var clone = $('.new-input-set').first().clone();
    $(clone).insertAfter($('.new-input-set').last());
    clone.find('select').attr('name', 'student_fee['+ind+'][fee]');
    clone.find('input[type=text]').attr('name', 'student_fee['+ind+'][amount]');
    $('.remove-field').show();
  })

  $(document).on('click', '.remove-field', function(e){
    e.preventDefault();
    if ($('.new-input-set').length <= 2) {
      $('.remove-field').hide();
    }
    $(this).parent().parent().remove();
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

  $(document).on('blur', '.fee-amnt', function(e){
    e.preventDefault();
    _this = $(this);
    var actual_fee = _this.parent().prev().find('.selected-fee').val().split('+')[1];
    if (parseInt(_this.val()) > parseInt(actual_fee)){
      alert('You can not add more than ' + actual_fee + ' for this fee type!!')
    }
  })

  </script>
@endsection
