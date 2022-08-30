@extends('layouts.admin')

@section('content')
    <!-- content -->
    <div class="content">
        <div class="container-fluid">
            <!-- breadcame start -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header mb-3">
                        <h4>User Details</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <!-- form start -->
                    <div class="card p-3">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <td>CV Link</td>
                                    <td>:</td>
                                    <td>{{ $user->link }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>
                                        @if ($user->status == 1)
                                            <span class="badge bg-success">Approved</span>
                                        @else
                                            <span class="badge bg-warning">Rejected </span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            <form action="{{ route('admin.user.status',$user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-control">
                                    <option {{ $user->status == 1 ? 'selected' : '' }} value="1">Approved</option>
                                    <option {{ $user->status == 0 ? 'selected' : '' }} value="0">Rejected</option>
                                </select>
                                <a href="{{ route('admin.user') }}" class="mt-3 btn btn-warning">Back</a>
                                <button class="btn btn-primary mt-3" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                    <!-- end -->
                </div>
            </div>

        </div>
    </div>
    <!-- content end-->
@endsection
