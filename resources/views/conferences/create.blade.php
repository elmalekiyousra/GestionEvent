@extends('layouts.app')


@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajouter Conference</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{url('/conference')}}"> Back</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form action="{{ route('conferences.insert') }}" method="POST" class="form" role="form">
    <div class="row">

        
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id_Event:</strong>
                <input type="String" name="id_event" id="id_event" placeholder="............." class="form-control" value="{{ Request :: old ('id_event') }}" >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                <input type="String" name="nom" id="nom" placeholder="................." class="form-control" value="{{ Request :: old ('nom') }}" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type:</strong>
                <input type="String" name="type" id="type" placeholder="................." class="form-control" value="{{ Request :: old ('type') }}" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                <input type="date" name="date" id="date" placeholder="Veuillez saisir la date.." class="form-control" value="{{ Request :: old ('date') }}" required/>
            </div>
        </div>
  

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea type="text" name="description" id="description" class="form-control" value="{{ Request :: old ('description') }}" required>
                </textarea>
            </div>
        </div>
        <div>
         <form action="insert" method="POST" enctype="Multipart/form-data">
                <input type="file" name="photo" >
        </form>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary" name="create">Submit</button>
        </div>


    </div>
 </form>


@endsection