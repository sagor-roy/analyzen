@extends('layouts.auth')
<style>
    tr.creadential {
        cursor: pointer;
    }

    tr.creadential:hover {
        background-color: #f1f1f1;
    }
</style>
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height: 100vh">
                <div class="col-md-6">
                    <div class="card card-body shadow-lg">
                        <h2 class="text-center fw-bold">Login</h2>
                        @include('layouts.message')
                        <form action="{{ route('access') }}" class="login-form" method="post">
                            @csrf
                            <div class="mt-2">
                                <label class="f-12">Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" required=""
                                    autocomplete="off">
                            </div>

                            <div class="mt-2 mb-2">
                                <label class="">Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Password"
                                    required="">
                            </div>
                            <a href="" class="mt-1">Forgotten password?</a>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary w-100">Login</button>
                            </div>
                        </form>
                        <table class="table table-bordered mt-4">
                            <tbody>
                                <tr id="admin" class="creadential" title="Coppy clipboard">
                                    <td>Email : admin@gmail.com</td>
                                    <td>Password : 000000</td>
                                    <td><i class="fas fa-copy"></i></td>
                                </tr>
                                <tr id="user" class="creadential" title="Coppy clipboard">
                                    <td>Email : user@gmail.com</td>
                                    <td>Password : 000000</td>
                                    <td><i class="fas fa-copy"></i></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-4">
                            <span>Don't have any account ? <a href="{{ route('register') }}"
                                    class="mt-1">SignUp</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @section('script')
        <script>
            $(document).ready(function(){
                $('#admin').on('click',function(){
                    $('input[name="email"]').val('admin@gmail.com');
                    $('input[name="password"]').val('000000');
                })
                $('#user').on('click',function(){
                    $('input[name="email"]').val('user@gmail.com');
                    $('input[name="password"]').val('000000');
                })
            })
        </script>
    @endsection
@endsection
