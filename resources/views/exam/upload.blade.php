@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="medium-6 large-5 columns">
            <h2>Upload your Exams</h2>
            <p>Upload your exams in the form of a CSV file here</p>
            <p>Your csv needs to have the question first and then 4 options following it on each line to upload correctly.</p>
            <form method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <label>Name of the exam
                    <input type="text" name="exam_name">
                </label>
                <label>
                    <input type="checkbox" name="header" checked>Does your file contain a header row?
                </label>
                <input type="file" name="file_upload">
                <small class="error">{{$errors->first('file_upload')}}</small>
                <input type="submit" value="UPLOAD" class="button success hollow">
            </form>
        </div>
    </div>
@endsection