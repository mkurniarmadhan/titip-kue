<x-guestLayout>

    @section('title', 'Login')


    @push('style')
        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
    @endpush



    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>



        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">

                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" value="admin@gmail.com" type="email" class="form-control" name="email" tabindex="1" required
                        autofocus>
                    <div class="invalid-feedback">
                        Please fill in your email
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label" >Password</label>
                        <div class="float-right">
                            <a href="#" class="text-small">
                                Lupa Password?
                            </a>
                        </div>
                    </div>
                    <input id="password" type="password" value="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                        please fill in your password
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                            id="remember-me">
                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>
            {{-- <div class="mt-4 mb-3 text-center">
                <div class="text-job text-muted">Login With Social</div>
            </div>
            <div class="row sm-gutters">
                <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                        <span class="fab fa-facebook"></span> Facebook
                    </a>
                </div>
                <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                        <span class="fab fa-twitter"></span> Twitter
                    </a>
                </div>
            </div> --}}

        </div>
    </div>
    <div class="text-muted mt-5 text-center">
        Belum punya akun? <a href="#">Create One</a>
    </div>


</x-guestLayout>
