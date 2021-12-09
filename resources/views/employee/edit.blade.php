  @extends('home')

  @section('content')
        <!-- workkk    -->
        <div class="container">
     <div class="row">
         <div class="col-md-12">  

          @if (session('status'))
               <h6 class="alert alert-success"> {{ session('status') }} </h6>
          @endif

             <div class="card">
                 <div class="card-header"> 
                     <h4>Edit employee
                        <a href="{{ url('employee') }}" class="btn btn-danger float-end">Back</a>
                 </h4>
                 </div> 
            <div class="card-body">
               <form action="{{ url('update-employee/'.$employeeWillBeEdit->id) }}" method="POST" enctype="mutipart/form-data">
                    @csrf  <!-- @csrf : c'est un token pour accepter le sublition por le formulaire -->
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="">FirstName</label>
                        <input type="text" value="{{ $employeeWillBeEdit->firstName }}" name="fn" class="form-control">   
                    </div>

                    <div class="form-group mb-3">
                        <label for="">LastName</label>
                        <input type="text" value="{{ $employeeWillBeEdit->lastName }}" name="ln" class="form-control">   
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Date of birth</label>
                        <input type="datetime-local value="{{ $employeeWillBeEdit->dof }}" name="dof" class="form-control">   
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Salary</label>
                        <input type="text" value="{{ $employeeWillBeEdit->salary }}" name="salary" class="form-control">   
                    </div>

                    <div class="form-group mb-3">
                        <label for="">ContratType</label>
                        <input type="text" value="{{ $employeeWillBeEdit->ContratType }}" name="ct" class="form-control">   
                    </div>

                    <div class="form-group mb-3">
                        <label for="">profile_image</label>
                        <input type="file" name="profile_image" class="form-control">
                     <!--  <img src="{{ asset('uploads/employees/'.$employeeWillBeEdit->profile_image) }}" width="70px" height="70px" alt="image"> -->  
                    </div>

                    <div classe="form-group mb-3"> 
                        <button type="submit" class="btn btn-primary">Update Employee</button>

                    </div>

                 </form>

                </div>
            </div>
        </div>
</div>

@endsection