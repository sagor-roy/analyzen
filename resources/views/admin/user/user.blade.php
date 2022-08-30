@extends('layouts.admin')

@section('content')
    <!-- content -->
    <div class="content">
        <div class="container-fluid">
            <!-- breadcame start -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header mb-3">
                        <h4>User List</h4>
                    </div>
                </div>
            </div>

            <!-- form start -->
            <div class="card p-3">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge bg-success">Approved</span>
                                    @else
                                        <span class="badge bg-warning">Rejected </span>
                                    @endif
                                </td>
                                <td>
                                    <a data-bs-toggle="modal" class="btn btn-sm btn-primary"
                                        href="#user{{ $item->id }}">Edit</a>
                                    <a class="btn btn-sm btn-info" href="{{ route('admin.user.detail',$item->id) }}">Details</a>
                                    <a onclick="return confirm('Are you sure to Delete?')" class="btn btn-sm btn-danger" href="{{ route('admin.user.delete',$item->id) }}">Delete</a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="user{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">User Edit</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.user.edit',$item->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mt-2">
                                                    <label class="f-12">Name</label>
                                                    <input type="text" class="form-control" value="{{ $item->name }}" name="name" >
                                                </div>
                                                <div class="mt-2">
                                                    <label class="f-12">Email</label>
                                                    <input type="email" class="form-control" value="{{ $item->email }}" name="email">
                                                </div>
                                                <div class="mt-2">
                                                    <label class="f-12">Phone</label>
                                                    <input type="text" class="form-control" value="{{ $item->phone }}" name="phone">
                                                </div>
                                                <div class="mt-2">
                                                    <label class="f-12">CV Link</label>
                                                    <input type="text" class="form-control" value="{{ $item->link }}" name="link">
                                                </div>
                                                <div class="mt-2">
                                                    <label class="f-12">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option {{ $item->status == 1 ? 'selected':'' }} value="1">Approved</option>
                                                        <option {{ $item->status == 0 ? 'selected':'' }} value="0">Rejected</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
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
