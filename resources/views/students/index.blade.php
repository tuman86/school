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
    <div class="panel-heading">Student Listing</div>
    <a href="{{ route('students.create') }}" style="float:right"> Add New Student</a>
      <div class="panel-body">

        <table id="transactionTable1" class="table table-striped projects_list_table"  style="background:#fff;">
          <thead>
              <tr>
                <th>ID</th>
                <th>Class</th>
                <th>Section</th>
                <th>First Name</th>
                <th>Last Name</th>            
                <th>Gender</th>
                <th>Admission Number</th>
                <th>Date Of Birth</th>
                <th>Session</th>
                <th nowrap>Actions</th>
              </tr>
          </thead>
          <tbody>
        @foreach($students as $key => $value)
              <tr>
                  <td><?php echo $value->id ; ?></td>
                  <td><?php echo ucfirst($value->class) ?></td>
                  <td><?php echo ucfirst($value->section) ?></td>
                  <td><?php echo ucfirst($value->first_name) ?></td>
                  <td><?php echo ucfirst($value->last_name) ?></td>                  
                  <td><?php echo ucfirst($value->gender) ?></td>
                  <td><?php echo $value->admission_number ?></td>
                  <td><?php echo date('Y-m-d', strtotime($value->date_of_birth)) ?></td>
                  <td><?php echo $value->session ?></td>
                  <!-- we will also add show, edit, and delete buttons -->
                  <td nowrap="nowrap">
                    <a class="btn btn-small btn-success btngrp" href="{{ URL::to('students/' . $value->id) }}">Show</a>
              <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
              <a class="btn btn-small btn-info btngrp" href="{{ URL::to('students/' . $value->id . '/edit') }}">Edit</a>
              <!-- <a onclick="return comfirm('Are you sure to delete this record?');" class="btn btn-small btn-danger" href="{{ route('fees.destroy', $value) }}" data-method="delete" data-token="{{ csrf_token() }}">Delete</a> -->
              {!! Form::open(array('route' => array('students.destroy', $value->id), 'method' => 'delete', 'class' => 'btngrp dlte-btn')) !!}
                      <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                  {!! Form::close() !!}

                  </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <th>ID</th>
                  <th>Class</th>
                  <th>Section</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Gender</th>
                  <th>Admission Number</th>
                  <th>Date Of Birth</th>
                  <th>Session</th>
                  <th nowrap>Actions</th>
              </tr>
          </tfoot>
      </table>
    </div>
  </div>
<div>

  <script type="text/javascript">
  $(document).ready(function() {
    $('#transactionTable1').DataTable();
} );
  </script>
@endsection
