@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="row">
           <div class="col-xs-12"> 
                <div class="box box-primary">   
                    <div class="box-header">
                        <h3 class="text-center">New Patient Form</h3>
                        <h4 class="text-center text-success">{{ session('success') }}</h4>
                    </div>
                    <form action="{{route('patient')}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Patient Name</label>
                                        <input type="text" class="form-control @error('patient_name') is-invalid @enderror" placeholder="Enter Patient Name" name="patient_name">

                                        @error('patient_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Father's Name</label>
                                        <input type="text" class="form-control @error('father_name') is-invalid @enderror" placeholder="Enter Father Name" name="father_name">

                                        @error('father_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Age</label>
                                        <input type="text" class="form-control @error('age') is-invalid @enderror" placeholder="Enter Patient Age" name="age">

                                        @error('age')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Mobile</label>
                                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" placeholder="Enter Patient Mobile Number" name="mobile">

                                        @error('mobile')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Patient Address</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Patient Address" name="address">

                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        </div>
                    </form>
                </div>
           </div> 
        </div>
        <div class="row">
            <div class="col-xs-12">                            
                <div class="box">
                    <div class="box-header">
                        <h3 class="text-center">Operation Name List</h3>                
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Patient Name</th>
                                    <th>Father's Name</th>
                                    <th>Age</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1
                            @endphp
                            @foreach($patients as $patient)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$patient->patient_name.' [ '.$patient->id. ' ]'}}</td>
                                    <td>{{$patient->father_name}}</td>
                                    <td>{{$patient->age}}</td>
                                    <td>{{$patient->mobile}}</td>
                                    <td>{{$patient->address}}</td>
                                    <td>
                                        <a href="{{route('edit-patient',['id' => $patient->id])}}" class="btn btn-success">Edit</a>
                                        <a href="{{route('delete-patient',['id' => $patient->id])}}" class="btn btn-danger" onclick="return confirm('Are You Sure??')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section>
@endsection