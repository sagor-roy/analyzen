@extends('layouts.admin')
<style>
    .select2-container {
        width: 100% !important;
    }
</style>
@section('content')
    <!-- content -->
    <div class="content">
        <div class="container-fluid">
            <!-- breadcame start -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header mb-3 d-flex align-items-center justify-content-between">
                        <h4>Exam List</h4>
                        <a data-bs-toggle="modal" class="btn btn-sm btn-primary" href="#exam">Add Exam Group</a>
                    </div>
                </div>
            </div>

            <!-- exam create modal -->
            <div class="modal fade" id="exam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Exam</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.exam.store') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-2">
                                    <label>Select Quiz</label>
                                    <select name="quiz" class="form-control">
                                        <option value="">Select Quiz</option>
                                        @foreach ($quiz as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-2">
                                    <label>Select Candidate</label><br>
                                    <select id="select_two" class="form-control" name="user[]"
                                        multiple="multiple">
                                        @foreach ($user as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
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
                            <th>Candidate</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exam as $item)
                        @php
                            $users = json_decode($item->user_id);
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->quiz->title }}</td>
                            <td>
                                @foreach ($users as $items)
                                    <span style="color: #e9ecef;font-weight:300" class="badge bg-secondary">{{ \App\Models\User::find($items)->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('admin.exam.view',$item->id) }}" class="btn btn-sm btn-info">View Result</a>
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
