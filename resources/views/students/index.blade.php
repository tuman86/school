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
                <th>Student Admission Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Admission Number</th>
                <th>Date Of Birth</th>
                <th>Admission Date</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Zip Code</th>
                <th>Aadhar Number</th>
                <th>Bank Account Number</th>
                <th>Ifsc Code</th>
                <th>Comments</th>
                <th>Category</th>
                <th>Religion</th>
                <th>Mother Tongue</th>
                <th>RTE Act</th>
                <th>Medium Instruction</th>
                <th>House</th>
                <th>Session</th>
                <th>Nationality</th>
                <th>Actions</th>
              </tr>
          </thead>
          <tbody>
        @foreach($students as $key => $value)
              <tr>
                  <td><?php echo $value->id ; ?></td>
                  <td><?php echo ucfirst($value->class) ?></td>
                  <td><?php echo ucfirst($value->section) ?></td>
                  <td><?php echo $value->student_admission_id ; ?></td>
                  <td><?php echo ucfirst($value->first_name) ?></td>
                  <td><?php echo ucfirst($value->last_name) ?></td>
                  <td><?php echo $value->email ?></td>
                  <td><?php echo ucfirst($value->father_name) ?></td>
                  <td><?php echo ucfirst($value->mother_name) ?></td>
                  <td><?php echo $value->mobile ?></td>
                  <td><?php echo ucfirst($value->gender) ?></td>
                  <td><?php echo $value->admission_number ?></td>
                  <td><?php echo date('Y-m-d', strtotime($value->date_of_birth)) ?></td>
                  <td><?php echo date('Y-m-d', strtotime($value->admission_date)) ?></td>
                  <td><?php echo ucfirst($value->address) ?></td>
                  <td><?php echo ucfirst($value->city) ?></td>
                  <td><?php echo ucfirst($value->state) ?></td>
                  <td><?php echo ucfirst($value->country) ?></td>
                  <td><?php echo $value->zip_code ?></td>
                  <td><?php echo $value->aadhar_number ?></td>
                  <td><?php echo $value->bank_account_number ?></td>
                  <td><?php echo $value->ifsc_code ?></td>
                  <td><?php echo ucfirst($value->comments) ?></td>
                  <td><?php echo ucfirst($value->category) ?></td>
                  <td><?php echo ucfirst($value->religion) ?></td>
                  <td><?php echo ucfirst($value->mothier_tongue) ?></td>
                  <td><?php echo $value->rte_act ?></td>
                  <td><?php echo ucfirst($value->medium_instruction) ?></td>
                  <td><?php echo ucfirst($value->house) ?></td>
                  <td><?php echo $value->session ?></td>
                  <td><?php echo ucfirst($value->nationality) ?></td>
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
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Admission Number</th>
                  <th>Date Of Birth</th>
                  <th>Admission Date</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Country</th>
                  <th>Zip Code</th>
                  <th>Aadhar Number</th>
                  <th>Bank Account Number</th>
                  <th>Ifsc Code</th>
                  <th>Comments</th>
                  <th>Category</th>
                  <th>Religion</th>
                  <th>Mother Tongue</th>
                  <th>RTE Act</th>
                  <th>Medium Instruction</th>
                  <th>House</th>
                  <th>Session</th>
                  <th>Nationality</th>
                  <th>Actions</th>
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
