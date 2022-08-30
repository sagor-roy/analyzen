@extends('layouts.admin')

@section('content')
    <!-- content -->
    <div class="content">
        <div class="container-fluid">
            <!-- breadcame start -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header mb-3 d-flex align-items-center justify-content-between">
                        <h4>Quiz List</h4>
                        <a data-bs-toggle="modal" class="btn btn-sm btn-primary" href="#quiz">Add Quiz</a>
                    </div>
                </div>
            </div>

            <!-- add quiz modal -->
            <div class="modal fade" id="quiz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Quiz</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.quiz.store') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="mt-2">
                                    <label class="f-12">Quiz Title</label>
                                    <input type="text" class="form-control" placeholder="Enter quiz title"
                                        name="title">
                                </div>
                                <div class="mt-2">
                                    <label class="f-12">Quiz Desciption</label>
                                    <textarea name="description" class="form-control" rows="4"></textarea>
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
                            <th>Quiz Name</th>
                            <th>Total Question</th>
                            <th width="40%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quiz as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->ques->count() }}</td>
                                <td>
                                    <a data-bs-toggle="modal" href="#quiz{{ $item->id }}"
                                        class="btn btn-sm btn-info">Edit</a>
                                    <a data-bs-toggle="modal" href="#question{{ $item->id }}"
                                        class="btn btn-sm btn-primary">Create Question</a>
                                    <a href="{{ route('admin.question.view',$item->id) }}" class="btn btn-sm btn-secondary">View Question</a>
                                    <a onclick="return confirm('Are you sure to Delete?')" href="{{ route('admin.quiz.delete',$item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>

                            <!-- quiiz update modal -->
                            <div class="modal fade" id="quiz{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Quiz</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.quiz.update', $item->id) }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mt-2">
                                                    <label class="f-12">Quiz Title</label>
                                                    <input type="text" class="form-control" value="{{ $item->title }}"
                                                        name="title">
                                                </div>
                                                <div class="mt-2">
                                                    <label class="f-12">Quiz Desciption</label>
                                                    <textarea name="description" class="form-control" rows="4">{{ $item->description }}</textarea>
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

                            <!-- question create modal -->
                            <div class="modal fade" id="question{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Create Question</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.question.store',$item->id) }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-2">
                                                            <label>Question Title</label>
                                                            <input name="title" type="text" class="form-control" placeholder="Enter title">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <label>A.</label>
                                                            <input name="a" type="text" class="form-control" placeholder="Enter answer">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <label>B.</label>
                                                            <input name="b" type="text" class="form-control" placeholder="Enter answer">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <label>C.</label>
                                                            <input name="c" type="text" class="form-control" placeholder="Enter answer">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <label>D.</label>
                                                            <input name="d" type="text" class="form-control" placeholder="Enter answer">
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
