@extends('layouts.app')


@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajouter Programme</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{url('/programme')}}"> Back</a>
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

        <form action="{{ route('programmes.insert') }}" method="POST" class="form" role="form">
    <div class="row">

        
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id_Event:</strong>
                <input type="String" name="id_event" id="id_event" placeholder="............." class="form-control" value="{{ Request :: old ('id_event') }}" >
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
        
         <form action="insert" method="POST" enctype="multipart/form-data">
            <!-- <input type="file" name="ipload" accept="image/*" multiple>-->
            <input type="file" class="form-control-file" name="photo" id="photo" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
        </form>



    <!--------------------------------Test---------------------------------------------->

    

    <!------------------------------------------------------------------------------------>


        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary" name="create">Submit</button>
        </div>


    </div>
 </form>


@endsection