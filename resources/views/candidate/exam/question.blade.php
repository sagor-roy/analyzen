@extends('layouts.candidate')

@section('content')
    <!-- content -->
    <div class="content">
        <div class="container-fluid">
            <!-- breadcame start -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header mb-3 d-flex align-items-center justify-content-between">
                        <h4><strong>Quiz Tittle</strong> : {{ $quiz->title }}</h4>
                        <h4><strong>Time : <span id="timer"></span></strong></h4>
                        <h4>Total Marks : {{ count($data) * 5 }}</h4>
                    </div>
                </div>
            </div>

            <!-- form start -->
            <div class="card p-3">
                @include('layouts.message')
                <form action="{{ route('user.exam.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                    <input type="hidden" name="exam_id" value="{{ $exam_id }}">
                    @foreach ($data as $key => $item)
                        <div class="py-3">
                            <h5 class="product-learn-heading">{{ $key + 1 }}.{{ $item->title }}</h5>
                            <div class="row">
                                <div class="col-md-3 my-1">
                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li>
                                                <input type="radio" value="a" name="answer[{{ $item->id }}]"
                                                    id="a-{{ $item->id }}">
                                                <label for="a-{{ $item->id }}">{{ $item->a }}</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 my-1">
                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li>
                                                <input type="radio" value="b" name="answer[{{ $item->id }}]"
                                                    id="b-{{ $item->id }}">
                                                <label for="b-{{ $item->id }}">{{ $item->b }}</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 my-1">
                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li>
                                                <input type="radio" value="c" name="answer[{{ $item->id }}]"
                                                    id="c-{{ $item->id }}">
                                                <label for="c-{{ $item->id }}">{{ $item->c }}</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 my-1">
                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li>
                                                <input type="radio" value="d" name="answer[{{ $item->id }}]"
                                                    id="d-{{ $item->id }}">
                                                <label for="d-{{ $item->id }}">{{ $item->d }}</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <!-- end -->
        </div>
    </div>
    <!-- content end-->

@section('script')
    <script>
        var time = '{{ $timer }}';
        // Set the date we're counting down to
        var countDownDate = new Date(time).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("timer").innerHTML = hours + "h " +
                minutes + "m " + seconds + "s ";

            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "<span style='color:red'>EXPIRED</span>";
            }
        }, 1000);
    </script>
@endsection
@endsection
