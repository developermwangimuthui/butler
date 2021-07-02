@extends('backend.layouts.app')
@section('content')
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Shipments</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Shipments</a>
                                </li>
                                <li class="breadcrumb-item active">All Shipments
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round  box-shadow-2 px-2 mb-1" data-toggle="modal" data-backdrop="false"
                            data-target="#shipment_info"><i class="ft-plus icon-left"></i> Add Shipment</button>

                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Butler Logistics Shipments </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">

                                        <table class="table table-striped table-bordered file-export dataex-res-immediately">
                                            <thead>
                                                <tr>
                                                    <th>Customer Name</th>
                                                    <th>Shipment dispatch date</th>
                                                    <th>Shipment dispatch time</th>
                                                    <th>Truck Details </th>
                                                    <th>Loading Point</th>
                                                    <th>Cargo Description</th>
                                                    <th>Delivery Note Number</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                    <td>$320,800</td>
                                                    <td>$320,800</td>
                                                </tr>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                <th>Customer Name</th>
                                                    <th>Shipment dispatch date</th>
                                                    <th>Shipment dispatch time</th>
                                                    <th>Truck Details </th>
                                                    <th>Loading Point</th>
                                                    <th>Cargo Description</th>
                                                    <th>Delivery Note Number</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- File export table -->
                

            </div>
        </div>
    </div>
 <!-- Modal -->
 <div class="modal fade text-left" id="shipment_info" data-backdrop="false" tabindex="-1" role="dialog"
 aria-labelledby="myModalLabel11" aria-hidden="true">
 <div class=" modal-lg modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header bg-info white">
             <h4 class="modal-title white" id="myModalLabel11">Add Shipment</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
             <form class="form" method="POST" action="{{ route('shipment.store') }}">
                 @csrf
                 <div class="form-body">
                    <div class="row">
                        <div class="form-group  col-md-3">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control round" name="name">
                        </div>
   
                        <div class="form-group col-md-3">
                            <label for="name">Email</label>
                            <input type="email" id="email" class="form-control round" name="email">
                        </div>
   
                        <div class="form-group col-md-3">
                            <label for="complaintinput1">Phone</label>
                            <input type="text" id="complaintinput1" class="form-control round" name="phone">
                        </div>
   
                        <div class="form-group col-md-3">
                            <label for="complaintinput2">Town</label>
                            <input type="text" id="complaintinput2" class="form-control round" name="town">
                        </div>
   
                        
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-3">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control round" name="name">
                        </div>
   
                        <div class="form-group col-md-3">
                            <label for="name">Email</label>
                            <input type="email" id="email" class="form-control round" name="email">
                        </div>
   
                        <div class="form-group col-md-3">
                            <label for="complaintinput1">Phone</label>
                            <input type="text" id="complaintinput1" class="form-control round" name="phone">
                        </div>
   
                        <div class="form-group col-md-3">
                            <label for="complaintinput2">Town</label>
                            <input type="text" id="complaintinput2" class="form-control round" name="town">
                        </div>
   
                        
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-3">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control round" name="name">
                        </div>
   
                        <div class="form-group col-md-3">
                            <label for="name">Email</label>
                            <input type="email" id="email" class="form-control round" name="email">
                        </div>
   
                        <div class="form-group col-md-3">
                            <label for="complaintinput1">Phone</label>
                            <input type="text" id="complaintinput1" class="form-control round" name="phone">
                        </div>
   
                        <div class="form-group col-md-3">
                            <label for="complaintinput2">Town</label>
                            <input type="text" id="complaintinput2" class="form-control round" name="town">
                        </div>
   
                        
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-3">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control round" name="name">
                        </div>
   
                        <div class="form-group col-md-3">
                            <label for="name">Email</label>
                            <input type="email" id="email" class="form-control round" name="email">
                        </div>
   
                        <div class="form-group col-md-3">
                            <label for="complaintinput1">Phone</label>
                            <input type="text" id="complaintinput1" class="form-control round" name="phone">
                        </div>
   
                        <div class="form-group col-md-3">
                            <label for="complaintinput2">Town</label>
                            <input type="text" id="complaintinput2" class="form-control round" name="town">
                        </div>
   
                        
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-3">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control round" name="name">
                        </div>
   
                        <div class="form-group col-md-3">
                            <label for="name">Email</label>
                            <input type="email" id="email" class="form-control round" name="email">
                        </div>
   
                        <div class="form-group col-md-3">
                            <label for="complaintinput1">Phone</label>
                            <input type="text" id="complaintinput1" class="form-control round" name="phone">
                        </div>
   
                        <div class="form-group col-md-3">
                            <label for="complaintinput2">Town</label>
                            <input type="text" id="complaintinput2" class="form-control round" name="town">
                        </div>
   
                        
                    </div>
                    


                     <div class="form-actions">
                         <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                             <i class="ft-x"></i> Cancel
                         </button>
                         <button type="submit" class="btn btn-primary">
                             <i class="la la-check-square-o"></i> Save
                         </button>
                     </div>
                 </div>
             </form>
         </div>

     </div>
 </div>
</div>
@endsection
