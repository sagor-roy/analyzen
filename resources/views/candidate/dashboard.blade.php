@extends('layouts.candidate')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <!-- breadcame start -->
            <div class="row pb-5">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header mb-3">
                        <h4>Dashboard</h4>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-6 offset-md-3">
                    <div class="card card-body">
                        <div class="text-center">
                            <img src="https://www.kindpng.com/picc/m/22-223910_circle-user-png-icon-transparent-png.png" class="rounded-circle" width="150" alt="">
                            <table class="table mt-4">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>:</td>
                                        <td>{{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>:</td>
                                        <td>{{ Auth::user()->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>CV Link</td>
                                        <td>:</td>
                                        <td>{{ Auth::user()->link }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
