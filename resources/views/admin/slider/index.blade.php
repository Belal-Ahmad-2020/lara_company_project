@extends('layouts.backend.app')

@section('content')
    <div class="py-12">
        <div class="container-fluid">
            <div class="row">                            

                {{-- all sliders --}}        
                <div class="col-md-12 col-xl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header text-center bg-primary text-white">
                          All Sliders
                        </div>
                        <div class="card-body text-center">
                            <div class="float-right p-2 m-2">
                                <a href="{{ route('slider.create') }}" class="btn btn-success btn-sm">New Slider</a>
                            </div>
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
                                        <th scope="col" width="5%">#</th>
                                        <th scope="col" width="10%">Name</th>                                                                                
                                        <th scope="col" width="20%">Description</th>                                                                                
                                        <th scope="col" width="12%">Image</th>                                                                                
                                        <th scope="col" width="8%" colspan="2">Action</th>                                                                                
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ($sliders as $s)
                                      <tr class="text-info  bg-white">
                                        <th scope="row">{{ $s->id }}</th>
                                        <td>{{ $s->title }}</td>
                                        <td>{{ $s->description }}</td>
                                        <td><img src="{{ asset($s->image) }}" class="img img-responsive" width="100" height="100" alt=""></td>
                                        <td>
                                          <a href="{{ url('slider/'.$s->id.'/edit') }}" class="btn btn-info">Edit</a>
                                        </td>
                                        <td>  
                                          <form action="{{ url('/slider/'.$s->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>                                        
                                          </form>                                                                                    
                                        </td>
                                        
                                    </tr>
                                      @empty
                                        <p>
                                          No Slider Found!
                                        </p>
                                      @endforelse                                      
                                    </tbody>
                                  </table>                                                  
                                  {{-- pagination --}}
                                  {{ $sliders->links() }}
                              </div>
                      </div>
                </div>
                {{-- end all Sliders --}}


            </div>
        </div> 
              

    </div>
@endsection