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
                      <h3>Data Post</h3>
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
                          <a href="{{ route('posts.create') }}" class="btn btn-success btn-md">[+] Add Post</a>
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
                          <table id="datatable" class="table table-striped table-bordered text-center" style="width:100%">
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
                          </table>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
@endsection