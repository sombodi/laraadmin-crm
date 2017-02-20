@extends("la.layouts.app")

@section("contentheader_title")
    <a href="{{ url(config('laraadmin.adminRoute') . '/tests') }}">Test</a> :
@endsection
@section("contentheader_description", $test->$view_col)
@section("section", "Tests")
@section("section_url", url(config('laraadmin.adminRoute') . '/tests'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Tests Edit : ".$test->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
    <div class="box-header">
        
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::model($test, ['route' => [config('laraadmin.adminRoute') . '.tests.update', $test->id ], 'method'=>'PUT', 'id' => 'test-edit-form']) !!}
                    @la_form($module)
                    
                    {{--
                    @la_input($module, 'test')
                    --}}
                    <br>
                    <div class="form-group">
                        {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <a href="{{ url(config('laraadmin.adminRoute') . '/tests') }}" class="btn btn-default pull-right">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
    $("#test-edit-form").validate({
        
    });
});
</script>
@endpush
