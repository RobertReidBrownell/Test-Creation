@extends('layouts.app')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>Exams</h4>
        <div class="medium-2  columns"><a class="button hollow success" href="{{ route('upload') }}">ADD NEW EXAM</a></div>


        <table class="stack">
          <thead>
            <tr>
              <th width="200">Exam Name</th>

              <th width="200">Action</th>
            </tr>
          </thead>
          <tbody>

          @foreach( $exams as $exam )
              <tr>
                <td>{{ $exam->name }}</td>


                <td>
                    <a class="hollow button" href="{{ route('create_exam', ['exam_id' => $exam->id ]) }}">Generate Exam</a>
                </td>
    {{--Commenting out the Update Exam feature until I have the chance to add the feature.--}}
                {{--<td>--}}
                    {{--<a class="hollow button" href="{{ route('update_exam', ['exam_id' => $exam->id ]) }}">Update Exam</a>--}}
                {{--</td>--}}
              </tr>
          @endforeach

              
                      </tbody>
        </table>

        
      </div>
    </div>
@endsection