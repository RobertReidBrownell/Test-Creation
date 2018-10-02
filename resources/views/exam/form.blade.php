@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="medium-12 large-12 columns">
            <h4>Modify Exam</h4>
            <form action="" method="post">
                {{ csrf_field() }}
                @foreach( $names as $name )

                <div class="medium-12  columns">
                    <label>Exam Name</label>
                    <input name="name" type="text" value="{{ old('name') ? old('name') : $name->name }}">
                    <small class="error">{{$errors->first('name')}}</small>

                </div>
                @endforeach
                @foreach( $questions as $question )


                    <div class="medium-8  columns">
                        <label>Question</label>
                        <div class="editable">{{ old('question') ? old('question') : $question->question }}</div>
                        <small class="error">{{$errors->first('question')}}</small>

                    </div>
                    @foreach( $answers as $answer )

                    @if($answer->question_id == $question->id)

                        <div class="medium-8  columns">
                            <label>Answer</label>
                            <input name="name" type="text" value="{{ old('question') ? old('question') : $answer->answer }}">
                            <small class="error">{{$errors->first('question')}}</small>
                        </div>

                    @endif

                    @endforeach


                @endforeach



                <div class="medium-12  columns">
                    <input value="SAVE" class="button success hollow" type="submit">
                </div>
            </form>
        </div>
    </div>
@endsection