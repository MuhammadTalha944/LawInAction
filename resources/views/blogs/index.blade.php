@extends('layouts.dashboard.main')
@section('title', 'Blogs List')
@section('content')


 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        <div class="row">

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Blogs Management</h4>
                </div>
                    <!-- @can('news-create') -->
                        <div class="pull-right" style="text-align: right;">
                            <a class="btn btn-success btn-sm" href="{{ route('blogs.create') }}"><i class="fas fa-plus"></i> Blog</a>
                        </div>
                    <!-- @endcan -->
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row" style="margin-top: 1%;">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 80%;">
                    <thead style="text-align: center;">
                          <tr>
                             <th>#</th>
                             <th>Heading</th>
                             <th>Added On</th>
                             <th>Publish Status</th>
                             <th>Blog Status</th>
                             <th>Action</th>
                          </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        @if($blog)
                            @foreach($blog as $item)
                                <tr>
                                    <td>{{$loop->index}}</td>
                                    <td>{{$item->main_heading}}</td>
                                    <td>{{ $item->created_at->format('M d Y') }}</td>
                                    <td>
                                        @if($item->status == 0)
                                            <label class="badge badge-primary">Initiated</label>
                                        @elseif($item->status == 1)
                                            <label class="badge badge-primary">Currently : Editor</label>
                                        @elseif($item->status == 2)
                                            <label class="badge badge-primary">Currently : Translater</label>
                                        @elseif($item->status == 3)
                                            <label class="badge badge-primary">Currently : Proofreader</label>
                                        @endif
                                        <br>
                                        @if($item->proofread_by)
                                            {{-- <a href="#" class="btn btn-sm btn-warning"></a> --}}
                                                <label class="badge badge-success">Proofreading Done</label>
                                        @endif

                                        @if($item->translated_by)
                                            {{-- <a href="#" class="btn btn-sm btn-warning"></a> --}}
                                                <label class="badge badge-warning">Translation Done</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->published == 0)
                                                <span class="btn btn-sm btn-danger btn-sm">UnPublished</span>
                                        @elseif($item->published == 1)
                                                <span class="btn btn-sm btn-success btn-sm">Published</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if($item->status == 0 || $item->status == 1 )
                                            <a href="{{  route('blogs.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                        @endif

<!--                                         @if($item->status == 0 || $item->status == 1 && $item->published == 0)
                                            <a href="{{  route('blogs.custom.delete', $item->id) }}" id="" class="check btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        @endif -->
                                        

                                        <a href="{{  route('blogs.show', $item->id) }}"  class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                    </td>
                                                                        
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection

@section('javascript')
    <script type="text/javascript">
        $('.check').on('click', function(){
            if(confirm('Are yous sure?')){
               return true; 
            }else{
                return false;
            }
        });
    </script>
@endsection