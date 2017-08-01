@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Student Reports</div>
      <div class="panel-body">
  <!-- if there are creation errors, they will show here -->
      {!! Form::open(['url' => ['get_reports'], 'method' => 'post']) !!}
      <div class="field">
        <div class="form-group">
           <?php echo Form::label('date', 'Enter Date', ['class' => 'col-md-3 control-label']);?>
           <div class="col-md-5">
             <?php echo Form::date('created_at', \Carbon\Carbon::now(), ['class' => 'form-control']) ?>
           </div>
           <div class="col-md-4">
          <?php echo Form::submit('Search', ['class' => 'btn btn-primary']);?>
        </div>
       </div>
     </div>

      {!! Form::close() !!}
      <?php if (!empty($recipt_detail)) { ?>
        <table class="table table-striped">
          <tr>
            <th>Reciept Number</th>
            <th>Bill Number</th>
            <th>Student Name</th>
            <th>Fee Collected By</th>
            <th>Date</th>
            <th>amount</th>
          </tr>
          <?php
          $collection = 0;
          foreach($recipt_detail as $value) { ?>
            <tr>
              <td><?php echo $value->id; ?></td>
              <td><?php echo $value->student_fee_id; ?></td>
              <td><?php echo $value->student->first_name . ' ' . $value->student->first_name; ?></td>
              <td><?php echo $value->user->name; ?></td>
              <td><?php echo $value->created_at; ?></td>
              <td><?php echo $value->amount; ?></td>
              <?php $collection = $collection + $value->amount;?>
            </tr>
          <?php } ?>
          <tr>
            <td colspan="5" align="right"><strong>Total Collection</strong></td>
            <td><strong><?php echo $collection; ?></strong></td>
          </tr>
          </table>
        <?php } ?>
    </div>
  </div>
<div>
@endsection
