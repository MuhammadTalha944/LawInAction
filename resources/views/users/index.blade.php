@extends('layouts.dashboard.main')
@section('title','Memberships')
@section('content')

 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Users Management</h4>
                </div>
                {{-- <div class="pull-right" style="text-align: right;">
                    <a class="btn btn-success btn-sm" href="{{ route('users.create') }}"><i class="fas fa-plus"></i> Add User</a>
                </div> --}}
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
                          <thead style="text-align: center;">
                             <tr style="text-align: center;">
                                   <th>No</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Verification</th>
                                   <th>Evaluation</th>
                                   <th>Evaluator Action</th>
                                   @role('Super Admin')
                                        <th>Roles</th>
                                   @endif
                                   <th width="280px">Action</th>
                             </tr>
                           </thead>
                           <tbody>
                             @php $i=0; @endphp
                             @foreach ($data as $key => $user)
                                  <tr style="text-align: center;">
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->email_verified_at)
                                                <label class="badge badge-success">Email Verified</label>
                                            @else
                                                <label class="badge badge-warning">Email Not Verified</label>
                                            @endif
                                        </td>
                                       <td>
                                            @if($user->done_by_evaluator)
                                               @if($user->done_by_evaluator == 'yes')
                                                        <label class="badge badge-success">Eligible</label>
                                               @else
                                                        <label class="badge badge-danger">Not Eligible</label>
                                               @endif
                                             @else
                                                        In Process
                                            @endif
                                       </td>
                                       <th>
                                           @can('user-edit')
                                                    @if($user->verified_by_admin == 0)
                                                        <form method="POST" action="{{route('user.verify', $user->id)}}">
                                                            @csrf
                                                                <input type="hidden" name="verified_by_admin" value="{{$user->verified_by_admin}}">
                                                            {{-- <a class="btn btn-warning btn-sm" href="{{ route('user.verify',$user->id) }}">
                                                                    Not Verified</a> --}}
                                                                    <button class="btn btn-sm btn-warning" type="submit">Not Verified</button>
                                                        </form>
                                                    @else
                                                        <form method="POST" action="{{route('user.verify', $user->id)}}">
                                                            @csrf
                                                                <input type="hidden" name="verified_by_admin" value="{{$user->verified_by_admin}}">
                                                            {{-- <a class="btn btn-warning btn-sm" href="{{ route('user.verify',$user->id) }}">
                                                                    Verified</a> --}}
                                                                    <button class="btn btn-sm btn-success" type="submit">Verified</button>
                                                        </form>
                                                    @endif
                                            @endcan
                                       </th>
                                        @role('Super Admin')
                                                <td>
                                                  @if(!empty($user->getRoleNames()))
                                                    @foreach($user->getRoleNames() as $v)
                                                       <label class="badge badge-primary">{{ $v }}</label>
                                                    @endforeach
                                                  @endif
                                                </td>
                                        @endif
                                        <td>
                                           {{-- <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fas fa-eye"></i></a> --}}
                                           @role('Super Admin')
                                               <a class="btn btn-warning btn-sm" href="{{ route('users.edit',$user->id) }}"
                                                style="color: black;"
                                                ><i class="fas fa-pen"></i> Edit</a>
                                            @endif

                                            @can('user-evaluate')
                                               <a class="btn btn-primary btn-sm" href="{{ route('users.evaluate',$user->id) }}"
                                                ><i class="fas fa-eye"></i> Evaluate</a>
                                            @endcan




                                            {{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}

                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                            {!! Form::close() !!} --}}

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
