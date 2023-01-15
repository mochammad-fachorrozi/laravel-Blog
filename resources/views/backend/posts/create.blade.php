@extends('backend.layouts.app')

@section('add-styles')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Datatables -->
    <link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

@endsection


@section('contents')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                  <div class="page-title">
                    <div class="title_left">
                      <h3>Add Post</h3>
                    </div>
      
                    <div class="title_right">
                      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
      
                  <div class="clearfix"></div>
      
                  <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel">
                        <div class="x_title">
                          {{-- <h2>Default Example <small>Users</small></h2> --}}
                          <a href="{{ route('posts.index') }}" class="btn btn-success btn-md"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Settings 1</a>
                                  <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                  <div class="card-box table-responsive">
                          <p class="text-muted font-13 m-b-30">
                            {{-- DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code> --}}
                          </p>
                          {{-- <table id="datatable" class="table table-striped table-bordered text-center" style="width:100%">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
      
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($posts as $post)
                                <tr>
                                    <td class="no">{{ $no }}</td>
                                    <td>
                                        <img src="{{ asset('backend/storage/posts/'.$post->image) }}" class="rounded" width="100">
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->author }}</td>
                                    <td>{{ $post->created_at->format('d M Y') }}</td>
                                    <td>{{ $post->is_accept }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @empty
                                <div class="alert alert-danger">
                                    Data Post belum Tersedia.
                                </div>
                                @endforelse
                              
                            </tbody>
                          </table> --}}

                          <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">IMAGE</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            
                                <!-- error message untuk title -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">IMAGE DESCRIPTION</label>
                                <input type="text" class="form-control @error('image_description') is-invalid @enderror" name="image_description" value="{{ old('image_description') }}" placeholder="Input Image Description" required>
                            
                                <!-- error message untuk image desc -->
                                @error('image_description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">TITLE</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Input Title Post" required>
                            
                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SLUG</label>
                                <input type="text" class="form-control" name="slug" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">CONTENT</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Input Content Post" required>{{ old('content') }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('content')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            

                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label class="font-weight-bold">KEYWORDS</label>
                                  <textarea type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{ old('keywords') }}" placeholder="Input Keywords Post" required></textarea>
                              
                                  <!-- error message untuk keywords -->
                                  @error('keywords')
                                      <div class="alert alert-danger mt-2">
                                          {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="font-weight-bold">TAGS</label>
                                  <textarea type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ old('tags') }}" placeholder="Input Tags Post" required></textarea>
                              
                                  <!-- error message untuk tags -->
                                  @error('tags')
                                      <div class="alert alert-danger mt-2">
                                          {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label class="font-weight-bold">CATEGORY</label>
                                  <select class="form-control" id="category">
                                    <option selected>Choose Category ...</option>
                                    <option value="linux-mint">Linux Mint</option>
                                    <option value="2">Two</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="font-weight-bold">ACCEPT ?</label>
                                  <select class="form-control" id="is_accept">
                                    <option selected>Choose ...</option>
                                    <option value="accept">Accepted</option>
                                    <option value="reject">Rejected</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="font-weight-bold">MESSAGE</label>
                                <textarea type="text" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" placeholder="Input message Post" rows="5" required></textarea>
                            
                                <!-- error message untuk tags -->
                                @error('message')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label class="font-weight-bold">DATE PUBLISH</label>
                                  <input type="date" class="form-control @error('publish_at') is-invalid @enderror" name="publish_at" value="{{ old('publish_at') }}" placeholder="Input publish_at Post" required>
                              
                                  <!-- error message untuk publish_at -->
                                  @error('publish_at')
                                      <div class="alert alert-danger mt-2">
                                          {{ $message }}
                                      </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="font-weight-bold">ACTIVE ?</label>
                                  <select class="form-control" id="is_accept">
                                    <option selected>Choose ...</option>
                                    <option value="accept">Yes</option>
                                    <option value="reject">No</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <label class="font-weight-bold">ID USER</label>
                                  <input type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" placeholder="Input user_id Post" readonly>
                              
                                  <!-- error message untuk user_id -->
                                  @error('user_id')
                                      <div class="alert alert-danger mt-2">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                              </div>
                            </div>
                            
                            <div class="mt-4 d-flex justify-content-end">
                              <button type="submit" class="btn btn-md btn-primary">SAVE</button>
                              <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            </div>

                        </form> 
                        </div>
                        </div>
                    </div>
                  </div>
                    </div>
                </div>
    
                  </div>
                </div>
              </div>
              <!-- /page content -->
    
@endsection


@section('add-scripts')
    <!-- Datatables -->
    <script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/pdfmake/build/vfs_fonts.js') }}"></script>

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection