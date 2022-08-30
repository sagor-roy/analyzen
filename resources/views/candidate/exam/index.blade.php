@extends('layouts.candidate')

@section('content')
    <!-- content -->
    <div class="content">
        <div class="container-fluid">
            <!-- breadcame start -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header mb-3 d-flex align-items-center justify-content-between">
                        <h4>Exam List</h4>
                    </div>
                </div>
            </div>

            <!-- form start -->
            <div class="card p-3">
                @include('layouts.message')
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Quiz Title</th>
                            <th>Total Question</th>
                            <th>Total Marks</th>
                            <th>Pass Marks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exam as $item)
                            @php
                                $user = json_decode($item->user_id);
                                $marks = $item->quiz->ques->count() * 5;
                                $total = ($marks * 70) / 100;
                            @endphp
                            @foreach ($user as $users)
                                @if (Auth::user()->id == $users)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->quiz->title }}</td>
                                        <td>{{ $item->quiz->ques->count() }}</td>
                                        <td>{{ $item->quiz->ques->count() * 5 }}</td>
                                        <td>{{ $total }}</td>
                                        <td>
                                            <a href="" class="btn btn-primary">Exam Start</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- end -->
        </div>
    </div>
    <!-- content end-->
@endsection
