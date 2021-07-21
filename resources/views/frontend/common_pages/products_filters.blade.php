  <form action="{{ route('products.search') }}" method="post" accept-charset="utf-8" id="ajaxfilter" onsubmit="return false">
  @csrf
 <div id="product-fliter">
 

 
       
                  <h3>Ghararas</h3>
              <div id="accordion">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Fabric
                        </button>
                      </h5>
                    </div>
                
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                          <div class="form-check mb-3">
                            <input autocomplete="off" name="fabrics[]" type="checkbox" class="form-check-input filled-in" id="new" value="silk">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="new">Silk</label>
                          </div>
                          <div class="form-check mb-3">
                            <input autocomplete="off" name="fabrics[]" type="checkbox" class="form-check-input filled-in" id="used" value="chanderi">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="used">Chanderi</label>
                          </div>
                          <div class="form-check mb-3">
                            <input autocomplete="off" name="fabrics[]" type="checkbox" class="form-check-input filled-in" id="collectible" value="cotton">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="collectible">Cotton</label>
                          </div>
                          <div class="form-check mb-3 pb-1">
                            <input autocomplete="off" name="fabrics[]" type="checkbox" class="form-check-input filled-in" id="renewed" value="reyon silk">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="renewed">Reyon silk</label>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Color
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                          <div class="form-check mb-3">
                            <input autocomplete="off" type="checkbox" name="colors[]" class="form-check-input filled-in" id="new" value="green">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="new">Green</label>
                          </div>
                          <div class="form-check mb-3">
                            <input autocomplete="off" type="checkbox" name="colors[]" class="form-check-input filled-in" id="used" value="yellow">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="used">Yellow</label>
                          </div>
                          <div class="form-check mb-3">
                            <input autocomplete="off" type="checkbox" name="colors[]" class="form-check-input filled-in" id="collectible" value="gray">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="collectible">Grey</label>
                          </div>
                          <div class="form-check mb-3 pb-1">
                            <input autocomplete="off" type="checkbox" name="colors[]" class="form-check-input filled-in" id="renewed" value="olive green">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="renewed">Olive green</label>
                          </div>
						    <div class="form-check mb-3 pb-1">
                            <input autocomplete="off" type="checkbox" name="colors[]" class="form-check-input filled-in" id="renewed" value="orange">
                            <label class="form-check-label small text-uppercase card-link-secondary" for="renewed">Orange</label>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Price Range
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                    
						  
						  
						   <input type="text" id="rangePrimary" class="js-range-slider s_update" name="my_range" value="" />
						  
						  
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingFour">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          Size
                        </button>
                      </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                      <div class="card-body">
                       <div class="filter-wrapper">
                        <div class="btn-group size-filter filter-checkboxes-2" data-toggle="buttons">
                            <label class="btn btn-size-select btn-xs " title="m: Available">
                            <input type="checkbox" name="sizes[]" value="m" id="size_m" autocomplete="off">M</label>
                                              <label class="btn btn-size-select btn-xs " title="l: Available">
                            <input type="checkbox" name="sizes[]" value="l" id="size_l" autocomplete="off">L</label>
                                              <label class="btn btn-size-select btn-xs " title="xl: Available">
                            <input type="checkbox" name="sizes[]" value="xl" id="size_xl" autocomplete="off">XL</label>
                                              <label class="btn btn-size-select btn-xs " title="xxl: Available">
                            <input type="checkbox" name="sizes[]" value="xxl" id="size_xxl" autocomplete="off">XXL</label>
                                              <label class="btn btn-size-select btn-xs " title="free: Available">
                            <input type="checkbox" name="sizes[]" value="free" id="size_free" autocomplete="off">FREE</label>          
                        </div>                
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
               
                </div>
				<input type="hidden" name="cat_slug" id="cat_slug" value="{{$catslug}}"/>
				
				 </form>