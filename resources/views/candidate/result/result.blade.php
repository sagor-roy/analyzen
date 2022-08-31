@extends('layouts.candidate')
<style>
    li.done {
        background-color: #3ac95bbd;
        color: white;
        padding: 3px 10px;
        border-radius: 10px;
    }

    li.error {
        background-color: #ff1818a1;
        color: white;
        padding: 3px 10px;
        border-radius: 10px;
    }
</style>
@section('content')
    <div class="content">
        <div class="container-fluid">
            <!-- breadcame start -->
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-5 text-center">
                            <h4>Your Score is</h4>
                            <h1><strong>{{ $result }} out {{ count($data) * 5 }}</strong></h1>
                            <a href="{{ route('user.dashboard') }}" class="btn btn-primary mt-3">Go to Dashboard</a>
                        </div>
                        <div class="col-7">
                            <img src="{{ asset('assets/success.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="mb-2"><strong>Quiz Title : </strong> {{ $title }}</h5>
            <div class="card card-body">
                @foreach ($data as $key => $item)
                    <div class="py-3">
                        <h5 class="product-learn-heading">{{ $key + 1 }}.{{ $item->title }}</h5>
                        <div class="row">
                            <div class="col-md-3 my-1">
                                <div class="product-learn-dtl">
                                    <ul>
                                        @foreach ($items as $value)
                                            @if ($item->id == $value->ques_id)
                                                <li
                                                    class="{{ $item->answer == 'a' ? 'done' : '' }} {{ $value->answer == 'a' ? ($item->answer == $value->answer ? 'done' : 'error') : '' }}">
                                                    A.
                                                    <label class="m-0 p-0"
                                                        for="a-{{ $item->id }}">{{ $item->a }}</label>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 my-1">
                                <div class="product-learn-dtl">
                                    <ul>
                                        @foreach ($items as $value)
                                            @if ($item->id == $value->ques_id)
                                                <li
                                                    class="{{ $item->answer == 'b' ? 'done' : '' }} {{ $value->answer == 'b' ? ($item->answer == $value->answer ? 'done' : 'error') : '' }}">
                                                    B.
                                                    <label class="m-0 p-0"
                                                        for="b-{{ $item->id }}">{{ $item->b }}</label>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 my-1">
                                <div class="product-learn-dtl">
                                    <ul>
                                        @foreach ($items as $value)
                                            @if ($item->id == $value->ques_id)
                                                <li
                                                    class="{{ $item->answer == 'c' ? 'done' : '' }} {{ $value->answer == 'c' ? ($item->answer == $value->answer ? 'done' : 'error') : '' }}">
                                                    C.
                                                    <label class="m-0 p-0"
                                                        for="c-{{ $item->id }}">{{ $item->c }}</label>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 my-1">
                                <div class="product-learn-dtl">
                                    <ul>
                                        @foreach ($items as $value)
                                            @if ($item->id == $value->ques_id)
                                                <li
                                                    class="{{ $item->answer == 'd' ? 'done' : '' }} {{ $value->answer == 'd' ? ($item->answer == $value->answer ? 'done' : 'error') : '' }}">
                                                    D.
                                                    <label class="m-0 p-0"
                                                        for="d-{{ $item->id }}">{{ $item->d }}</label>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
