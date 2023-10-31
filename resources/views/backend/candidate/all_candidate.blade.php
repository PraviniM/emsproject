@extends('admin_dashboard')
@section('admin')

 <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                       <!-- <div class="row">
                            <div class="col-12">
                             <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="basic-datatable_length">
                                        <label class="form-label">Show <select name="basic-datatable_length" aria-controls="basic-datatable" class="form-select form-select-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="basic-datatable_filter" class="dataTables_filter">
                                    <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="basic-datatable"></label>
                                </div>
                            </div>
                        </div> -->


                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
       <a href="{{ route('add.candidate') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Add Candidate </a>   
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Candidates</h4>
                                          <div id="basic-datatable_filter" class="dataTables_filter">
                                          <label>Filter:<input type="filter" class="form-control form-control-sm" placeholder="filter" aria-controls="basic-datatable"></label>
                                         </div>
                            </div>
                                </div> 
                               
                        </div>     
                        <!-- end page title --> 

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     
                    
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                
                                <th>Candidate Name</th>
                                <th>Rating</th>
                                <th>Stages</th>
                                <th>Applied date</th>
                                <th>Owner</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    
    
        <tbody>
        @foreach($candidate as $key=> $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <!-- <td> <img src="{{ asset($item->image) }}" style="width:50px; height: 40px;"> </td> -->
                <td>{{ $item->candidate_name }}</td>
                <td>{{ $item->rating }}</td>
                <td>{{ $item->stages }}</td>
                <td>{{ $item->applied_date }}</td>
                <td>{{ $item->owner }}</td>
                <td>
<a href="{{ route('edit.employee',$item->id) }}" class="btn btn-blue rounded-pill waves-effect waves-light">Edit</a>
<a href="{{ route('delete.employee',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Delete</a>

                </td>
            </tr>
            @endforeach
        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->


                      
                        
                    </div> <!-- container -->

                </div> <!-- content -->


@endsection 