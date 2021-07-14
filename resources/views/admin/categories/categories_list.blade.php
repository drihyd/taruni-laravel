@extends('admin.template_v1')
@section('content')
			
            <div class="paddingleftright pt-2 pb-5" >
            	@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif	
    <div class="float-right">
    	<a href="{{ route('categories.create') }}" class="btn btn-brand">+ Add Parent Category</a>
      <a href="{{ route('pages.create') }}" class="btn btn-brand">+ Add Child Category</a>
    </div>
                <!-- <table id="orders-table" class="table customdatatable" style="width:100%"> -->
                <table  class="table customdatatable" style="width:100%">
                  <thead>
                      <tr>
                        <th>Category Name</th>
                        <th>Parent</th>
                        <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                  	 @foreach($categories_data as $category)
                     @if($category->parent_id == 0)
                      <tr class="processing odd">
                          <td><a href="#" class="edit mr-2" title="Edit" >{{ucwords($category->name) }}</a></td>
                          <td>  </td>
                          <td width="10%">
            
                          	<a href="#" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i>
                          	</a>
      
                          </td>
                      </tr>
                      @foreach($categories_data as $parentfilter)
                      @if($parentfilter->parent_id == $category->id)
                      <tr >
                          <td><a href="#" class="edit mr-2" title="Edit" >{{ucwords($parentfilter->name) }}</a></td>
                          <td>{{ucwords($category->name) }}  </td>
                          <td width="10%">
                            <a href="#" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i>
                            </a>
      
                          </td>
                      </tr>
                        @endif
                      @endforeach
                      @endif
                      @endforeach
                  </tbody>
              </table>
            </div>
@endsection