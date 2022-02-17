@extends('layouts.dashboard.main')

@section('content')

 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        <div class="row">

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>HateForms Management</h4>
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
                    <tbody style="text-align: center;">
                          <tr>

                             <th>#</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Country</th>
                             <th>Mobile No.</th>
                             <th>Form No.</th>
                             <th>Confidentiality</th>
                             <th>Status</th>
                              <th>Translation</th>
                              <th>Action</th>
                             {{-- <th width="280px">Action</th> --}}
                          </tr>

                            @foreach ($hate_form as $hate_form)

                            <tr>
                                <td>{{ ++$loop->index }}</td>
                                <td>{{ $hate_form->name }}</td>
                                <td><a href="mailto:{{ $hate_form->email }}">{{ $hate_form->email }}</a></td>
                                <td>{{ $hate_form->country }}</td>
                                <td>{{ $hate_form->phone_number }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm">{{ $hate_form->hateform_number }}</a>

                                </td>
                                <td>
                                    @if($hate_form->confidentiality == 'public')
                                        <a href="#" class="btn btn-sm btn-success">Public</a>
                                    @else
                                        <a href="#" class="btn btn-sm btn-warning">Private</a>
                                    @endif
                                </td>
                                <td>
                                        <button type="button" class="btn
                                        @if($hate_form->status->name == 'Initiated')
                                            btn-primary
                                        @elseif($hate_form->status->name == 'Open')
                                            btn-primary
                                        @elseif($hate_form->status->name == 'Under Proceesing')
                                            btn-success
                                        @elseif($hate_form->status->name == 'Pending')
                                            btn-danger
                                        @elseif($hate_form->status->name == 'Resolved')
                                            btn-success
                                        @elseif($hate_form->status->name == 'Closed')
                                            btn-warning
                                        @endif
                                         btn-sm" style="font-size: 75%;">{{$hate_form->status->name}}</button>
                                </td>
                                <td>
                                    @if($hate_form->translated_file == null)
                                        not translated
                                    @else
                                        <a type="button"  style="font-size: 75%;" class="btn btn-sm btn-primary" href="{{ URL::to('/') }}/translated_documents/{{$hate_form->translated_file}}" download>Download</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('hateform_section.show', $hate_form->hateform_number) }}" class="btn btn-sm btn-success"><i class="fas fa-external-link-alt"></i></a>
                                </td>
                                {{-- <td>
                                </td> --}}
                            </tr>

                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
