@extends('layouts.auth')

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height: 100vh">
                <div class="col-md-6">
                    <div class="card card-body shadow-lg">
                        <h2 class="text-center fw-bold">Register</h2>
                        @include('layouts.message')
                        <form action="{{ route('store') }}" class="login-form" method="post">
                            @csrf
                            <div class="mt-2">
                                <label class="f-12">Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name"  required>
                            </div>
                            <div class="mt-2">
                                <label class="f-12">Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="mt-2">
                                <label class="f-12">Phone</label>
                                <input type="number" class="form-control" placeholder="Phone" name="phone" required>
                            </div>
                            <div class="mt-2">
                                <label class="f-12">CV Link</label>
                                <input type="text" class="form-control" placeholder="CV Link" name="link" required>
                            </div>
                            <div class="mt-2 mb-2">
                                <label class="">Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Password"
                                     required>
                            </div>
                            <div class="mt-2 mb-2">
                                <label class="">Confirm Password</label>
                                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password"
                                     required>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary w-100">Register</button>
                            </div>
                        </form>
                        <div class="mt-4">
                            <span>Already have an account ? <a href="{{ route('login') }}" class="mt-1">Login</a></span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
