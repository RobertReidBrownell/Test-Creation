@extends('layouts.app')

@section('content')
    <div class="row">
      <div class="medium-6 columns">
        <h4>Exam Builder App {{ $version }}</h4>
        <img class="thumbnail" src="images/attractions.jpg">
      </div>
      <div class="medium-6 large-5 columns front-page" style="padding-top: 150px">
        <p>This site started out as a simple request to have a program that would randomize questions to help study for a test.</p>
        <p>However as of right now you can upload your exam questions and answers and have it generate exams for you with the questions randomized.</p>
        <p>Currently no matter how many questions you upload per Exam file each test will only consist of up to 20 questions. In a future update there will be the ability to indicate how many
            questions you would like to have on each test.</p>
      </div>
    </div>
@endsection
