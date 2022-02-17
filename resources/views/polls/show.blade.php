@extends('layouts.dashboard.main')
@section('title','Show Poll')
@section('content')
<style type="text/css">
    label{
        font-weight: bold;
    }
</style>
 <div class="card yellow_border shadow h-100 py-2">
    <div class="card-body">


        <div class="row">
            <h3>Poll Question</h3>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Poll Question:</label>
                    <p style="border: 1px solid lightgrey; padding: 2%;">
                        {{$polls->question}}
                    </p>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Poll Question(Proof-Readed):</label>
                    <p>
                        @if($polls->proofread_by)
                            <p style="border: 1px solid lightgrey; padding: 2%;">{{$polls->proofreaded_question}}</p>
                        @else
                            N\A
                        @endif
                    </p>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Poll Question(Translated):</label>
                    <p>
                        @if($polls->translated_by)
                            <p style="border: 1px solid lightgrey; padding: 2%;">{{$polls->translated_question}}</p>
                        @else
                            N\A
                        @endif
                    </p>
                </div>
            </div>

            {{-- @role('Polls Proofreader')
                @if(!$polls->proofread_by)
                        <form method="POST" action="{{route('translated.poll.question')}}">
                            @csrf
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Translate Poll Question:</label>
                                    <input type="text" name="proofreaded_question" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Send Back to Editor</button>
                                </div>
                            </div>
                        </form>
                @endif
            @endif --}}

            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                @role('Poll Editor')
                    @if($polls->redressal_status == 1)

                                @if(!$polls->proofread_by)
                                    <a  href="{{route('send.poll.to.proofreader', $polls->id)}}" title="Send for proof reading"  class="btn btn-primary">Proofreader</a>
                                 @endif   
                                @if(!$polls->translated_by)
                                    {{-- <a href="{{route('send.poll.to.translator', $polls->id)}}" class="btn btn-danger">Translator</a> --}}
                                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#lang_select_Modal">
                                    {{-- <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> --}}
                                    Translator
                                </a>

                                    <div class="modal fade" id="lang_select_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Select Language for Poll Translation</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> --}}
                                                        <a href="{{route('send.poll.to.translator', [$polls->id, 0])}}" class="btn btn-success">English</a>
                                                        <a href="{{route('send.poll.to.translator', [$polls->id, 1] )}}" class="btn btn-primary">Urdu</a>
                                                        <a href="{{route('send.poll.to.translator', [$polls->id, 2])}}" class="btn btn-warning">Hindi</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endif

                                @if($polls->published == 0)
                                        <a href="{{route('publish.poll', $polls->id)}}" class="btn btn-success" id="check_action">Publish</a>
                                @else
                                        <a href="{{route('unpublish.poll', $polls->id)}}" class="btn btn-danger" id="check_action">Un-Publish</a>
                                @endif
                    @endif
                @endif    

                @role('Polls Proofreader')
                    @if($polls->redressal_status == 2)

                                @if(!$polls->proofread_by)
                                    <form method="POST" action="{{route('backtoeditor.poll.question')}}">
                                        @csrf
                                        <div class="col-xs-12 col-sm-12 col-md-12" >
                                            <div class="form-group" style="text-align: left !important; ">
                                                <label>ProofRead Poll Question:</label>
                                                <input type="text" name="proofreaded_question" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                    <input type="hidden" name="mode" value="proofreader">
                                                    <input type="hidden" name="poll_id" value="{{ $polls->id }}">
                                                <button type="submit" class="btn btn-success">Send Back to Editor</button>
                                            </div>
                                        </div>
                                    </form>
                                 @endif   
                                
                    @endif
                @endif


                @role('Poll Translator')
                    @if($polls->redressal_status == 3)

                                @if(!$polls->translated_by)
                                    <form method="POST" action="{{route('backtoeditor.poll.question')}}">
                                        @csrf
                                        <div class="col-xs-12 col-sm-12 col-md-12" >
                                            <div class="form-group" style="text-align: left !important; ">
                                                <label>Translate Poll Question (Language : 
                                                        @if($polls->lang_type == 0)
                                                                <b>English</b>
                                                        @elseif($polls->lang_type == 1)
                                                                <b>Urdu</b>
                                                        @else
                                                                <b>Hindi</b>
                                                        @endif
                                                        ) 
                                                </label>
                                                <input type="text" name="translated_question" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                    <input type="hidden" name="mode" value="translator">
                                                    <input type="hidden" name="poll_id" value="{{ $polls->id }}">
                                                <button type="submit" class="btn btn-primary">Send Back to Editor</button>
                                            </div>
                                        </div>
                                    </form>
                                 @endif   
                                
                    @endif
                @endif


                @role('Poll Creator')
                    @if($polls->redressal_status == 0)
                        <a href="{{route('send.poll.to.editor', $polls->id)}}" class="btn btn-danger" >Send to Editor</a>
                    @endif
                @endif
                {{-- <a href="{{route('polls.index')}}" class="btn btn-warning">Back</a> --}}
            </div>

            
    </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">

        $('#check_action').on('click', function(){
            if(confirm('Are you Sure you want to do this action?')){
                return true;
            }else{
                return false;
            }
        });   
</script>
@endsection