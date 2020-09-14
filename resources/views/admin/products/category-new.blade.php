@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="row">
           <div class="col-xs-12"> 
                <div class="box box-primary">   
                    <div class="box-header">
                        <h3 class="text-center">Product Category Form</h3>
                        <h4 class="text-center text-success">{{ session('success') }}</h4>
                    </div>
                    <form action="{{route('product-category')}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Product Category</label>
                                        <input type="text" class="form-control @error('product_category') is-invalid @enderror" placeholder="Enter Product Category" name="product_category">

                                        @error('product_category')
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
                        <h3 class="text-center">Product Category List</h3>                
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Product Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($value as $val)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $val->product_category }}</td>
                                    <td>
                                        <a href="{{route('edit-product-category',['id' => $val->id])}}" class="btn btn-success">Edit</a>
                                        <a href="{{route('delete-product-category',['id' => $val->id])}}" class="btn btn-danger" onclick="return confirm('Are You Sure ?')">Delete</a>
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