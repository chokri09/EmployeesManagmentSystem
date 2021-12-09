@extends('home')

@section('content')
<div class="container">
     <div class="row">
         <div class="col-md-12">    
             <div class="card">
                 <div class="card-header"> 
                     <h4>Employees Management
                        <a href="{{ url('add-employee') }}" class="btn btn-primary float-end">Add Employee</a>
                 </h4>
                 </div> 
                 <div class="card-body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Date of birth</th>
                                <th>Salary</th>
                                <th>Contrat Type</th>
                                <th>Picture</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($employees as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->firstName }}</td>
                                <td>{{ $item->lastName }}</td>
                                <td>{{ $item->DOB }}</td>
                                <td>{{ $item->salary }}</td>
                                <td>{{ $item->ContratType }}</td>
                                <td>
                                <img src="{{ asset('uploads/employees/'.$item->profile_image) }}" width="70px" height="70px" alt="image">
                                </td>   
                               <!-- <td>{{ $item->profile_image }}</td> -->
                                 <td>
                                     <a href="{{ url('edit-employee/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                 </td>
                                 <td>
                                     <a href="{{ url('delete-employee/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                 </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                    <!--Paginantion-->

                    {{ $employees->links() }}

                 </div>
                </div>
            </div>
        </div>
</div>
</div>
@endsection      
        
        