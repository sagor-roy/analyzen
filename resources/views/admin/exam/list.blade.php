@extends('layouts.admin')

@section('content')
    <!-- content -->
    <div class="content">
        <div class="container-fluid">
            <!-- breadcame start -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header mb-3 d-flex align-items-center justify-content-between">
                        <h4>Candidate Result Shit</h4>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Total Marks</th>
                            <th>Result</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ans as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->email }}</td>
                                <td>{{ $item->ques->count() * 5 }}</td>
                                <td>{{ \App\Models\Result::findorfail($item->id)->total }}</td>
                                <td>
                                    <a href="{{ route('admin.exam.result', ['exam_id' => $item->exam_id, 'user_id' => $item->user->id]) }}"
                                        class="btn btn-info">View Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- end -->
        </div>
    </div>
    <!-- content end-->
@endsection
