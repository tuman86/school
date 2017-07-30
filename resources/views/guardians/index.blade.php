@extends('layouts.app')

@section('content')
<style>
.btngrp{
  float:left;
}
.dlte-btn {
  width:71px;
}
</style>
<div class="panel panel-default">
    <div class="panel-heading">Guardian Listing</div>
    <a href="{{ route('guardians.create') }}?std_id=<?php echo $std_id?>" style="float:right"> Add Guardian</a>
      <div class="panel-body">

        <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <td>ID</td>
                  <td>Student</td>
                  <td>Relation</td>
                  <td>First Name</td>
                  <td>Last Name</td>
                  <td>Email</td>
                  <td>Contact Number</td>
                  <td>Actions</td>
              </tr>
          </thead>
          <tbody>
        @foreach($guardians as $key => $value)
              <tr>
                  <td><?php echo $value->id ; ?></td>
                  <td><?php echo ($value->student->first_name . ' ' . $value->student->last_name) ; ?></td>
                  <td><?php echo $value->relation ?></td>
                  <td><?php echo $value->first_name ?></td>
                  <td><?php echo $value->last_name ?></td>
                  <td><?php echo $value->email ?></td>
                  <td><?php echo $value->contact_number ?></td>
                  <!-- we will also add show, edit, and delete buttons -->
                  <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
              <!-- we will add this later since its a little more complicated than the other two buttons -->
              <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
              <a class="btn btn-small btn-info btngrp" href="{{ URL::to('guardians/' . $value->id . '/edit?std_id='.$std_id) }}">Edit</a>
              <!-- <a onclick="return comfirm('Are you sure to delete this record?');" class="btn btn-small btn-danger" href="{{ route('fees.destroy', $value) }}" data-method="delete" data-token="{{ csrf_token() }}">Delete</a> -->
              {!! Form::open(array('route' => array('guardians.destroy', $value->id), 'method' => 'delete', 'class' => 'btngrp dlte-btn')) !!}
                      <?php echo Form::hidden('std_id', $std_id); ?>
                      <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                  {!! Form::close() !!}

                  </td>
              </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </div>
<div>
@endsection
