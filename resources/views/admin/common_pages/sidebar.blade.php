<!-- Sidebar -->
          <nav id="sidebar">
              <div class="sidebar-header">
                  <img src="{{ URL::to('assets/admin//img/logo.svg') }}" class="img-fluid">
              </div>

              <ul class="list-unstyled components">
                <li class="active">
                      <a href="{{url('admin')}}">Dashboard</a>
                  </li>

                  <li class="active">
                      <a href="#ordersSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Orders</a>
                      <ul class="collapse list-unstyled" id="ordersSubmenu">
                          <li>
                              <a href="{{url('admin/orders')}}">View All</a>
                          </li>
                          <li>
                              <a href="#">Foreign Orders</a>
                          </li>
                          <li>
                              <a href="#">Abandoned Carts</a>
                          </li>
                          <li>
                              <a href="#">Abandoned Payments</a>
                          </li>
                          <li>
                              <a href="#">Paypal Outbox</a>
                          </li>
                      </ul>
                  </li>
                  <li class="">
                      <a href="#cusSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Customers</a>
                      <ul class="collapse list-unstyled" id="cusSubmenu">
                          <li>
                              <a href="#">View All</a>
                          </li>
                          <li>
                              <a href="#">Export</a>
                          </li>
                          <li>
                              <a href="#">Loyal Customers</a>
                          </li>
                          <li>
                              <a href="#">Wishlists</a>
                          </li>
                          <li>
                              <a href="#">Clicks</a>
                          </li>
                      </ul>
                  </li>
                  <li class="">
                      <a href="#productsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Products</a>
                      <ul class="collapse list-unstyled" id="productsSubmenu">
                          <li>
                              <a href="#">View All</a>
                          </li>
                          <li>
                              <a href="#">Filter</a>
                          </li>
                          <li>
                              <a href="#">Add Products</a>
                          </li>
                          <li>
                              <a href="#">Attributes</a>
                          </li>
                          <li>
                              <a href="#">Recommended</a>
                          </li>
                          <li>
                              <a href="#">Update $ Price</a>
                          </li>
                      </ul>
                  </li>
                  <li class="">
                      <a href="#uploadSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Bulk Upload</a>
                      <ul class="collapse list-unstyled" id="uploadSubmenu">
                          <li>
                              <a href="#">Downlaod XLSX File</a>
                          </li>
                          <li>
                              <a href="#">Upload Bulk Data</a>
                          </li>
                          <li>
                              <a href="#">Bulk Image Upload</a>
                          </li>
                          <li>
                              <a href="#">Upload Postal Codes</a>
                          </li>
                      </ul>
                  </li>
                  <li class="">
                      <a href="#catSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Categories</a>
                      <ul class="collapse list-unstyled" id="catSubmenu">
                          <li>
                              <a href="#">View Categories</a>
                          </li>
                          <li>
                              <a href="#">Add Parent Category</a>
                          </li>
                          <li>
                              <a href="#">Add Child Category</a>
                          </li>
                          <li>
                              <a href="#">Edit Re-order Values</a>
                          </li>
                      </ul>
                  </li>
                  <li class="">
                      <a href="#masterSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Masters Data</a>
                      <ul class="collapse list-unstyled" id="masterSubmenu">
                          <li>
                              <a href="#">Tags</a>
                          </li>
                          <li>
                              <a href="#">Shipping Rates</a>
                          </li>
                          <li>
                              <a href="#">Shipping Times</a>
                          </li>
                          <li>
                              <a href="#">Countries</a>
                          </li>
                          <li>
                              <a href="#">States</a>
                          </li>
                          <li>
                              <a href="#">Cities</a>
                          </li>
                      </ul>
                  </li>
                  <li class="">
                      <a href="#promotionsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Promotions</a>
                      <ul class="collapse list-unstyled" id="promotionsSubmenu">
                          <li>
                              <a href="#">Contest</a>
                          </li>
                          <li>
                              <a href="#">Coupons</a>
                          </li>
                          <li>
                              <a href="#">Discounts</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Content & Pages</a>
                      <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                              <a href="#">Homepage Featured</a>
                          </li>
                          <li>
                              <a href="{{url('admin/pages')}}">Pages</a>
                          </li>
                          <li>
                              <a href="#">Static Pages SEO</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="#reportSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Reports & Analytics</a>
                      <ul class="collapse list-unstyled" id="reportSubmenu">
                        <li>
                              <a href="#">Order Analytics</a>
                          </li>
                          <li>
                              <a href="#">Cart Analytics</a>
                          </li>
                          <li>
                              <a href="#">Stock Reports</a>
                          </li>
                          <li>
                              <a href="#">Product Report</a>
                          </li>
                          <li>
                              <a href="#">Monthly Reports</a>
                          </li>
                          <li>
                              <a href="#">Monitor Stock</a>
                          </li>
                          <li>
                              <a href="#">Color Report</a>
                          </li><li>
                              <a href="#">Order Location Report</a>
                          </li><li>
                              <a href="#">Inventory Age</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="#">Feedback</a>
                  </li>
              </ul>

          </nav>