@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="row">
           <div class="col-xs-12"> 
                <div class="box box-primary">   
                    <div class="box-header">
                        <h3 class="text-center">Operation Name Form</h3>
                        <h4 class="text-center text-success">{{ session('success') }}</h4>
                    </div>
                    <form action="{{route('operation-name')}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Operation Category</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                            <option value="">--Select Category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{$category->operation_category}}</option>
                                            @endforeach    
                                        </select>
                                        @error('category_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Operation Name</label>
                                        <input type="text" class="form-control @error('operation_name') is-invalid @enderror" placeholder="Enter Operation Name" name="operation_name">

                                        @error('operation_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Rate</label>
                                        <input type="number" class="form-control @error('rate') is-invalid @enderror" placeholder="Enter Operation Rate" name="rate">

                                        @error('rate')
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
                                    <th>Operation Category</th>
                                    <th>Operation Name</th>
                                    <th>Rate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($operations as $operation)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$operation->OperationCategory->operation_category}}</td>
                                        <td>{{$operation->operation_name}}</td>
                                        <td>{{$operation->rate}}</td>
                                        <td>
                                            <a href="{{route('edit-operation-name',['id' => $operation->id])}}" class="btn btn-success">Edit</a>
                                            <a href="{{route('delete-operation-name',['id' => $operation->id])}}" class="btn btn-danger" onclick="return confirm('Are You Sure ?')">Delete</a>
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