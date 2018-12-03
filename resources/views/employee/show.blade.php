@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ route('employee.index') }}" class="btn btn-primary">Back</a>
    <div class="row justify-content-center">
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                        {{$emp->name}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Birthdate:</strong>
                         {{$emp->birthdate}}
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gender:</strong><br>
                        {{$emp->gender}}
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contact:</strong>
                        {{$emp->contact}}  
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Department:</strong>
                        {{$emp->department}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    {{$emp->status}}
                </div>
            </div>
        </form>
    </div>
</div>
@endsection