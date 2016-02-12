@section('title','')
@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header"><h3>Save a new Page</h3></div>
                <div class="box-body">

                   <input type="text" id="sendUrlInput">
                </div>
                <div id="result"></div>
                <div class="box-footer">
                    <button onclick="sendUrl(); return false" type="button">Save</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header"><h3>Look for a Domain</h3></div>
                <div class="box-body">
                   <input type="text" id="sendDomain">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="search-tabs">
                            
                  
                        </ul>
                        <div class="tab-content" id="search-results">
                           
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button onclick="searchDomain(); return false" type="button">Search</button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ URL::asset('assets/js/domains.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('assets/js/home.js') }}"></script>

@endsection
