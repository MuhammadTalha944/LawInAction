@extends('layouts.dashboard.main')

@section('content')

 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        <div class="row">

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Complaints Management</h4>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row" style="margin-top: 1%;">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 80%;">
                          <thead>
                            <tr>
                               <th>#</th>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Country</th>
                               <th>Complaint Related</th>
                               <th>Victim / Accused</th>
                               <th>Registered On</th>
                               <!-- <th>confidentiality</th> -->
                               <th>Complaint Number</th>
                               <th>Complaint Status</th>
                               <!-- <th>Translation</th> -->
                               <th>Action</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach ($complaints as $complaint)

                            <tr>
                                <td>{{ ++$loop->index }}</td>
                                <td>{{ $complaint->name }}</td>
                                <td><a href="mailto:{{ $complaint->email }}">{{ $complaint->email }}</a></td>
                                {{-- <td>{{ $complaint->gender }}</td> --}}
                                <td>{{ $complaint->country }}</td>

                                <td>

                                    @if($complaint->complaint_related_to == 'Communal_Riots')
                                        Communal Riots
                                    @elseif($complaint->complaint_related_to == 'Tablighi_Jamaat')
                                        Tablighi Jamaat
                                    @elseif($complaint->complaint_related_to == 'Corona_Related')
                                        Corona Related
                                    @elseif($complaint->complaint_related_to == 'Other_Issues')
                                        Other Issues
                                    @elseif($complaint->complaint_related_to == 'Personal_Matter')
                                        Personal Matter
                                    @endif

                                </td>

                                <td>{{ $complaint->vistim_accused }}</td>
                                <td>{{  $complaint->created_at->format('M d Y') }}</td>
                                <!-- <td>{{ $complaint->confidentiality }}</td> -->
                                <td>
                                    <a href="#" class="btn btn-sm">{{ $complaint->complaint_number }}</a>
                                </td>
                                <td>
                                    {{-- @if($complaint->status->name == 'Initiated') --}}
                                        {{-- <button type="button" class="btn btn-warning btn-sm">{{$complaint->status->name}}</button> --}}
                                    {{-- @else --}}
                                        {{-- {{ $complaint->status->name }} --}}
                                    {{-- @endif --}}
                                        <button type="button" class="btn
                                        @if($complaint->status->name == 'Initiated')
                                            btn-primary
                                        @elseif($complaint->status->name == 'Open')
                                            btn-primary
                                        @elseif($complaint->status->name == 'Under Proceesing')
                                            btn-success
                                        @elseif($complaint->status->name == 'Pending')
                                            btn-danger
                                        @elseif($complaint->status->name == 'Resolved')
                                            btn-success
                                        @elseif($complaint->status->name == 'Closed')
                                            btn-warning
                                        @endif
                                         btn-sm" style="font-size: 75%;">{{$complaint->status->name}}</button>
                                </td>
                                <!-- <td>
                                    @if($complaint->translated_file == null)
                                        not translated
                                    @else
                                        <a type="button"  style="font-size: 75%;" class="btn btn-sm btn-primary" href="{{ URL::to('/') }}/translated_documents/{{$complaint->translated_file}}" download>Download</a>
                                    @endif
                                </td> -->
                                <td>
                                    <a href="{{ route('complaint_section.show', $complaint->complaint_number) }}" class="btn btn-sm btn-success"><i class="fas fa-external-link-alt"></i></a>
                                </td>
                            </tr>

                            @endforeach
                          </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
