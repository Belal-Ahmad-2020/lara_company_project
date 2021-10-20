@extends('layouts.backend.app')

@section('content')
    <div class="py-12">
        <div class="container-fluid">
            <div class="row">                            

                {{-- all brands --}}        
                <div class="col-md-8 col-xl-8 col-sm-12">
                    <div class="card">
                        <div class="card-header text-center bg-primary text-white">
                          All Brands
                        </div>
                        <div class="card-body text-center">
                          {{-- alert --}}
                              @if (session('success'))                                                              
                                <div class="alert alert-success alert-dismissible fade show  mb-2" role="alert">                               
                                  <strong>{{ session('success') }}</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>                                  
                                </div>
                              @endif                            
                                <table class="table table-hover  text-center">
                                    <thead>
                                      <tr class="text-secondary ">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>                                                                                
                                        <th scope="col">Image</th>                                                                                
                                        <th scope="col">Create At</th>                                                                                
                                        <th scope="col" colspan="2">Action</th>                                                                                
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ($brands as $b)
                                      <tr class="text-info  bg-white">
                                        <th scope="row">{{ $b->id }}</th>
                                        <td>{{ $b->brand_name }}</td>
                                        <td><img src="{{ asset($b->brand_image) }}" class="img img-responsive" width="100" height="100" alt=""></td>
                                        <td>
                                          @if ($b->created_at == NULL)
                                            <p class="text-danger">No Date</p>
                                          @else
                                            {{ $b->created_at->diffForHumans() }}  
                                          @endif                                          
                                        </td>
                                        <td>
                                          <a href="{{ url('brand/'.$b->id.'/edit') }}" class="btn btn-info">Edit</a>
                                        </td>
                                        <td>  
                                          <form action="{{ url('/brand/'.$b->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>                                        
                                          </form>                                                                                    
                                        </td>
                                        
                                    </tr>
                                      @empty
                                        <p>
                                          No Brand Found!
                                        </p>
                                      @endforelse                                      
                                    </tbody>
                                  </table>                                                  
                                  {{-- pagination --}}
                                  {{ $brands->links() }}
                              </div>
                      </div>
                </div>
                {{-- end all brands --}}

                {{-- add brnad --}}
                <div class="col-md-4 col-xl-4 col-sm-12">
                    <div class="card ">
                        <div class="card-header bg-success text-center text-white">
                          Add Brand
                        </div>
                        <div class="card-body ">
                            @if ($errors->any())                            
                   
                            @endif
                            <form method="POST" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="brand_name">Brand Name</label>
                                  <input type="text" class="form-control" name="brand_name" id="brand_name"  placeholder="Brand Name ..." aria-describedby="nameError">
                                    @error('brand_name')
                                    <small id="nameError" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>                                    
                                    </small>                                            
                                    @enderror        
                                </div>

                                <div class="form-group">
                                    <label for="brand_image">Brand Image</label>
                                    <input type="file" class="form-control" name="brand_image" id="brand_image" aria-describedby="imageError">    
                                    @error('brand_image')
                                    <small id="imageError" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>                                    
                                    </small>                                            
                                    @enderror        
                                </div>                                                                                              
  
                                <input type="submit" value="Add Brand" class="btn btn-success btn-md btn-block"> 
                              </form>
                        </div>
                      </div>
                </div>
                {{-- ENd Add brnad --}}

            </div>
        </div> 
  
        <br><br><br> <hr>
              {{-- Trash List --}}
              <div class="containear-fluid">
                <div class="row">                            
                  <div class="col-md-1"></div>
                    <div class="col-md-10 col-xl-10 col-sm-12">
                        <div class="card">
                            <div class="card-header text-center bg-warning text-white">
                              Trash List
                            </div>
                            <div class="card-body text-center">
                              {{-- alert --}}
                                   @if (session('forceDelete'))                                                              
                                    <div class="alert alert-success alert-dismissible fade show  mb-2" role="alert">                               
                                      <strong>{{ session('forceDelete') }}</strong>
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>                                  
                                    </div>
                                  @endif                             
                                    <table class="table table-hover  text-center">
                                        <thead>
                                          <tr class="text-secondary ">
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>                                                                                
                                            <th scope="col">Image</th>                                                                                
                                            <th scope="col">Create At</th>                                                                                
                                            <th scope="col" colspan="2">Action</th>                                                                                
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @forelse ($trashBrand as $trash)
                                          <tr class="text-info  bg-white">
                                            <th scope="row">{{ $trash->id }}</th>
                                            <td>{{ $trash->brand_name }}</td>
                                            <td><img src="{{ asset($trash->brand_image) }}" class="img img-responsive" width="100" height="100" alt=""></td>
                                            <td>
                                              @if ($trash->created_at == NULL)
                                                <p class="text-danger">No Date</p>
                                              @else
                                                {{ $trash->created_at->diffForHumans() }}  
                                              @endif                                          
                                            </td>
                                            <td>                                                                             
                                              <a href="{{ url('/brandRestore/'.$trash->id) }}" class="btn btn-success">Restore</a>                                                      
                                            </td>
                                            <td>
                                              <a href="{{ url('/brandForceDelete/'.$trash->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>                                                      
                                            </td>
                                        </tr>
                                          @empty
                                            <p>
                                              No Category Found!
                                            </p>
                                          @endforelse                                      
                                        </tbody>
                                      </table>   
                                      
                                      {{-- pagination --}}
                                      {{ $trashBrand->links() }}
                                  </div> 
                          </div>
                    </div>
      
      
                </div>
            </div>
            {{-- end Trash LIst --}}              

    </div>
@endsection