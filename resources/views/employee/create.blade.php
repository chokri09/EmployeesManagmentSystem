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
                     <h4>Employees Management
                        <a href="{{ url('employee') }}" class="btn btn-danger float-end">Back</a>
                 </h4>
                 </div> 
            <div class="card-body">
               <form action="{{ url('add-employee') }}" method="POST" enctype="mutipart/form-data">
                    @csrf  <!-- @csrf : c'est un token pour accepter le sublition por le formulaire -->

                    <div class="form-group mb-3">
                        <label for="">FirstName</label>
                        <input class="form-control" type="text" name="fn" class="form-control">   
                    </div>      

                    <div class="form-group mb-3">
                        <label for="">LastName</label>
                        <input type="text" name="ln" class="form-control">   
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Date of birth</label>
                        <input type="datetime-local"  name="dof" class="form-control">   
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Salary</label>
                        <input type="text" name="salary" class="form-control">   
                    </div>

                    <div class="form-group mb-3">
                        <label for="">ContratType</label>
                        <input type="text" name="ct" class="form-control">   
                    </div>

                    <div class="form-group mb-3">
                        <label for="">profile_image</label>
                        <input type="file" name="profile_image" class="form-control">   
                    </div>

                    <div classe="form-group mb-3"> 
                        <button type="submit" class="btn btn-primary">Save Employee</button>

                    </div>

                 </form>

                </div>
            </div>
        </div>
</div>

       @endsection