@extends('layouts.dashboard.main')
@section('title', 'News List')
@section('content')


 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        <div class="row">

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>News Management</h4>
                </div>
                    @can('news-create')
                        <div class="pull-right" style="text-align: right;">
                            <a class="btn btn-success btn-sm" href="{{ route('news.create') }}"><i class="fas fa-plus"></i> News</a>
                        </div>
                    @endcan
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
                             {{-- @role('Super Admin') --}}
                                 <th>Author</th>
                             {{-- @endif --}}
                             <!-- <th>News Heading</th> -->
                             @role('News Reporter')
                                <th>Send to Editor</th>
                             @endif
                             <th>Added On</th>
                             <th>News Status</th>
                             <th>Publisher Status</th>
                             <th>Action</th>
                          </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        @if($news)
                            @foreach($news as $item)
                                <tr>
                                    <td>{{ ++$loop->index }}</td>
                                    {{-- @role('Super Admin') --}}
                                        <td>{{ $item->user->name }}</td>
                                    {{-- @endif --}}
                                    <!-- <td>{{ $item->main_heading }}</td> -->
                                    @role('News Reporter')
                                    <td>
                                        @if($item->status == 0)
                                            <a href="{{route('news.send.toeditor', $item->id)}}" class="btn btn-sm btn-primary" title="Send to Editor"><i class="fas fa-arrow-right"></i></a>
                                        @elseif($item->status == 1)
                                            <a href="{{route('news.send.toeditor', $item->id)}}" class="btn btn-sm btn-success" title="Sended to Editor"><i class="fas fa-check"></i></a>
                                        @endif
                                    </td>
                                    @endif
                                    <td>{{ $item->created_at->format('M d Y') }}</td>
                                    <td>
                                        @if($item->status == 0)
                                            <label class="badge badge-primary">Reported</label>
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

                                        @can('news-edit')
                                                @if($item->status == 1)
                                                        <a href="{{  route('news.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                                @endif
                                        @endcan
<!--                                         @can('news-edit')
                                            <a href="{{  route('news.show', $item->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                        @endcan
                                        @can('news-proofreading')
                                            <a href="{{  route('news.show', $item->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                        @endcan -->
                                        <a href="{{  route('news.show', $item->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
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
