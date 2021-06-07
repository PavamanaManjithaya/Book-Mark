@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @include('inc.messeges')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal" type="button">Add BookMark</button>
                    <hr>
                    <h3> My BookMarks</h3>
                    <ul class="list-group">
                       @foreach ($bookmarks as $bookmark)
                          <li class="list-group-item clearfix">
                           <a href="{{$bookmark->url}}" target="_blank">{{$bookmark->name}}</a>
                        <span class="badge badge-pill badge-secondary">{{$bookmark->description}}</span>
                        <span class="float-right button-group">
                            <button type="button" class="delete-bookmark btn btn-danger"data-id="{{$bookmark->id}}">
                                <span class="glyphicon glyphicon-remove"></span>DELETE
                            </button>
                            
                        </span>
                        
                               
                        </li> 
                       @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center d-block">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title d-inline-block">Add Bookmark</h4>
        </div>
        <div class="modal-body">
            <form action="{{route('bookmarks.store')}}" method="post">
                {{csrf_field()}} 
                <div class="form-group">
                   <label>BookMark Name</label>
                   <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>BookMark URL</label>
                    <input type="text" name="url" class="form-control">
                 </div>
                 <div class="form-group">
                    <label>Website Description</label>
                    <textarea name="description" class="form-control"></textarea>
                 </div>
                 <input type="submit" value="Submit" name="submit" class="btn btn-success">


            </form>
          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
@endsection
