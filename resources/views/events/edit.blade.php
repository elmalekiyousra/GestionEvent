@extends('layouts.app')
 
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit New Item</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/event') }}"> Back</a>
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


     <form method="POST" action="{{route('events.update',$item->id)}}">
    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
               <input type="String" name="nom" id="nom" placeholder="Veuillez saisir le nom.." class="form-control" value="{{ $item->nom}}" >
            </div>
        </div>
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                <input type="date" name="date" id="date" placeholder="Veuillez saisir la date.." class="form-control" value="{{$item->date}}" required/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Adresse:</strong>
                <input type="text" name="lieu" id="lieu" placeholder="Veuillez saisir l'adresse'.." class="form-control" value="{{$item->lieu}}" required/>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
               <textarea type="text" name="description" id="description" class="form-control" value="$item->description" required>
                </textarea>
            </div>
        </div>
         <div>
         	 <form action="insert" method="POST" enctype="Multipart/form-data">
                <input type="file" name="photo"  value="{{$item->photo}}">
        </form>
         </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary" name="update">Submit</button>
        </div>


    </div>
    </form>


@endsection