@extends('layouts.admin')

@section('content')
    <!-- content -->
    <div class="content">
        <div class="container-fluid">
            <!-- breadcame start -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header mb-3 d-flex align-items-center justify-content-between">
                        <h4>Question List</h4>
                        <a data-bs-toggle="modal" class="btn btn-sm btn-primary" href="#question">Add Question</a>
                    </div>
                </div>
            </div>

            <!-- question create modal -->
            <div class="modal fade" id="question" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Question</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.question.store', $quiz->id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                            <label>Question Title</label>
                                            <input name="title" type="text" class="form-control"
                                                placeholder="Enter title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label>A.</label>
                                            <input name="a" type="text" class="form-control"
                                                placeholder="Enter answer">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label>B.</label>
                                            <input name="b" type="text" class="form-control"
                                                placeholder="Enter answer">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label>C.</label>
                                            <input name="c" type="text" class="form-control"
                                                placeholder="Enter answer">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label>D.</label>
                                            <input name="d" type="text" class="form-control"
                                                placeholder="Enter answer">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                            <label>Correct Answer.</label>
                                            <select name="answer" class="form-control">
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                                <option value="c">C</option>
                                                <option value="d">D</option>
                                            </select>
                                        </div>
                                    </div>
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
                <h5 class="mb-3"><strong>Quiz Name :</strong>{{ $quiz->title }}</h5>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Question Title</th>
                            <th>Answer</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ques as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ strtoupper($item->answer) }}</td>
                                <td>
                                    <a data-bs-toggle="modal" href="#question{{ $item->id }}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to Delete?')" href="{{ route('admin.question.delete',$item->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <!-- question edit modal -->
                            <div class="modal fade" id="question{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Question</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.question.update', $item->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-2">
                                                            <label>Question Title</label>
                                                            <input name="title" type="text" class="form-control"
                                                                value="{{ $item->title }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <label>A.</label>
                                                            <input name="a" type="text" class="form-control"
                                                            value="{{ $item->a }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <label>B.</label>
                                                            <input name="b" type="text" class="form-control"
                                                            value="{{ $item->b }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <label>C.</label>
                                                            <input name="c" type="text" class="form-control"
                                                            value="{{ $item->c }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <label>D.</label>
                                                            <input name="d" type="text" class="form-control"
                                                            value="{{ $item->d }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-2">
                                                            <label>Correct Answer.</label>
                                                            <select name="answer" class="form-control">
                                                                <option {{ $item->answer == 'a' ? 'selected':'' }} value="a">A</option>
                                                                <option {{ $item->answer == 'b' ? 'selected':'' }} value="b">B</option>
                                                                <option {{ $item->answer == 'c' ? 'selected':'' }} value="c">C</option>
                                                                <option {{ $item->answer == 'd' ? 'selected':'' }} value="d">D</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- end -->
        </div>
    </div>
    <!-- content end-->
@endsection
