@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="medium-12 large-12 columns">



                @foreach( $names as $name )

                <div class="medium-12  columns">
                    <h4>{{ $name->name }}</h4>

                </div>
                @endforeach
	                <?php $qnumber = 0; ?>
                @foreach( $questions as $question )
                    <?php $qnumber++; ?>
                    <?php $choice = ['a', 'b', 'c', 'd']; $i = 0;?>
                    <div class="question">
                    <div class="medium-8  columns">
                        <p><?php echo $qnumber; ?>.) {{ $question->question }}</p>


                    </div>
                    @foreach( $answers as $answer )


                    @if($answer->question_id == $question->id)

                        <div class="medium-12  columns form-group">
                            <label class="radio-inline"><input type="radio" name="{{ $question->id }}" value="{{ $answer->answer }}"><?php echo $choice[$i];?>.) {{ $answer->answer }}</label>
                        </div>
			                    <?php $i++; ?>
                    @endif

                    @endforeach
                    </div><!-- .question -->

                @endforeach
                    <div class="medium-12  columns print-exam">
                        <input value="Print Exam" onClick='window.print()' class="button success hollow" type="submit">
                    </div>

        </div>
    </div>
@endsection

