@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Submit an Issue</div>
                <div class="panel-body">
                    <p>
                        Please provide as detailed of a description of your issue as possible so I can help you promptly.
                    </p>

                    <form method="POST" action="/api/issues/add">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <input type="submit" class="btn btn-lg btn-success pull-right" value="Submit Issue">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection