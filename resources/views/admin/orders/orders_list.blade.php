@extends('admin.template_v1')
@section('content')
			
            <div class="paddingleftright custom-tabs">
                <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-recent-tab" data-toggle="tab" href="#nav-recent" role="tab" aria-controls="nav-recent" aria-selected="true">Recent</a>
                  <a class="nav-item nav-link" id="nav-todays-tab" data-toggle="tab" href="#nav-todays" role="tab" aria-controls="nav-todays" aria-selected="false">Today's Orders</a>
                  <a class="nav-item nav-link" id="nav-monthly-tab" data-toggle="tab" href="#nav-monthly" role="tab" aria-controls="nav-monthly" aria-selected="false">Monthly</a>
                </div>
              </nav>
            </div>
            <div class="tab-content paddingleftright pt-5 pb-5" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-recent" role="tabpanel" aria-labelledby="nav-recent-tab">
                <table id="orders-table" class="table customdatatable" style="width:100%">
                  <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th width="100">Ship To</th>
                        <th>Customer</th>
                        <th>Products</th>
                        <th> </th>
                        <th >Payments</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($orders_data as $order)
                      <tr class="">
                          <td>{{$order->order_number }}</td>
                          <td>02 Jul 2021</td>
                          <td><img src="{{ URL::to('assets/admin/img/ico-globe.png') }}"></td>
                          <td><b>{{$order->shipername }}</b><br>{{$order->shiperemail }}<br>{{$order->shiperphone }}</td>
                          <td><b>{{$order->itemqty}} Items</b><br>1.5 kgs</td>
                          <td><b>✂</b></td>
                          <td><b>USD 1000</b><br>{{$order->pggateway }}/Fully Paid<br>RZP-101udas1234sd</td>
                          <td><b>{{ucwords($order->order_status) }}</b><br>#156345</td>
                          <td><a href="#"><img src="{{ URL::to('assets/admin/img/ico-arrow.png') }}"></a></td>
                          
                      </tr>
                      @endforeach
                      
                  </tbody>
              </table>
              </div>




              <div class="tab-pane fade" id="nav-todays" role="tabpanel" aria-labelledby="nav-todays-tab">
                <table id="orders-table2" class="table customdatatable" style="width:100%">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr class="dispatched">
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          <td>2011/04/25</td>
                          <td>$320,800</td>
                      </tr>
                      <tr class="processing">
                          <td>Garrett Winters</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>63</td>
                          <td>2011/07/25</td>
                          <td>$170,750</td>
                      </tr>
                      <tr>
                          <td>Ashton Cox</td>
                          <td>Junior Technical Author</td>
                          <td>San Francisco</td>
                          <td>66</td>
                          <td>2009/01/12</td>
                          <td>$86,000</td>
                      </tr>
                      <tr>
                          <td>Cedric Kelly</td>
                          <td>Senior Javascript Developer</td>
                          <td>Edinburgh</td>
                          <td>22</td>
                          <td>2012/03/29</td>
                          <td>$433,060</td>
                      </tr>
                      <tr>
                          <td>Airi Satou</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>33</td>
                          <td>2008/11/28</td>
                          <td>$162,700</td>
                      </tr>
                      <tr>
                          <td>Brielle Williamson</td>
                          <td>Integration Specialist</td>
                          <td>New York</td>
                          <td>61</td>
                          <td>2012/12/02</td>
                          <td>$372,000</td>
                      </tr>
                      <tr>
                          <td>Herrod Chandler</td>
                          <td>Sales Assistant</td>
                          <td>San Francisco</td>
                          <td>59</td>
                          <td>2012/08/06</td>
                          <td>$137,500</td>
                      </tr>
                  </tbody>
              </table>
              </div>
              <div class="tab-pane fade" id="nav-monthly" role="tabpanel" aria-labelledby="nav-monthly-tab">
               <table id="orders-table3" class="table customdatatable" style="width:100%">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr class="dispatched">
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          <td>2011/04/25</td>
                          <td>$320,800</td>
                      </tr>
                      <tr class="processing">
                          <td>Garrett Winters</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>63</td>
                          <td>2011/07/25</td>
                          <td>$170,750</td>
                      </tr>
                      <tr>
                          <td>Ashton Cox</td>
                          <td>Junior Technical Author</td>
                          <td>San Francisco</td>
                          <td>66</td>
                          <td>2009/01/12</td>
                          <td>$86,000</td>
                      </tr>
                      <tr>
                          <td>Cedric Kelly</td>
                          <td>Senior Javascript Developer</td>
                          <td>Edinburgh</td>
                          <td>22</td>
                          <td>2012/03/29</td>
                          <td>$433,060</td>
                      </tr>
                      <tr>
                          <td>Airi Satou</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>33</td>
                          <td>2008/11/28</td>
                          <td>$162,700</td>
                      </tr>
                      <tr>
                          <td>Brielle Williamson</td>
                          <td>Integration Specialist</td>
                          <td>New York</td>
                          <td>61</td>
                          <td>2012/12/02</td>
                          <td>$372,000</td>
                      </tr>
                      <tr>
                          <td>Herrod Chandler</td>
                          <td>Sales Assistant</td>
                          <td>San Francisco</td>
                          <td>59</td>
                          <td>2012/08/06</td>
                          <td>$137,500</td>
                      </tr>
                  </tbody>
              </table>
              </div>
            </div>
@endsection