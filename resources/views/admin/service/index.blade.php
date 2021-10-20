@extends('layouts.backend.app')

@section('content')
    <div class="py-12">
        <div class="container-fluid">
            <div class="row">                            

                {{-- all abouts --}}        
                <div class="col-md-12 col-xl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header text-center bg-primary text-white">
                          All Services 
                        </div>
                        <div class="card-body text-center">
                            <div class="float-right p-2 m-2">
                                <a href="{{ route('service.create') }}" class="btn btn-success btn-sm">New Service</a>
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
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>                                                                                                                                                                                                     
                                        <th scope="col"> Description</th>                                                                                
                                        <th scope="col" colspan="2">Action</th>                                                                                
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ($services as $s)
                                      <tr class="text-info  bg-white">
                                        <th scope="row">{{ $s->id }}</th>
                                        <td>{{ $s->title }}</td>
                                        <td>{{ $s->description }}</td>                                        
                                        <td>
                                          <a href="{{ url('service/'.$s->id.'/edit') }}" class="btn btn-info">Edit</a>
                                        </td>
                                        <td>  
                                          <form action="{{ url('/service/'.$s->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>                                        
                                          </form>                                                                                    
                                        </td>
                                        
                                    </tr>
                                      @empty
                                        <p>
                                          No Service Found!
                                        </p>
                                      @endforelse                                      
                                    </tbody>
                                  </table>                                                  
                                  {{-- pagination --}}
                                  {{ $services->links() }}
                              </div>
                      </div>
                </div>
                {{-- end all brands --}}


            </div>
        </div>             
    </div>
@endsection