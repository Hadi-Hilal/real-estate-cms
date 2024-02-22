<x-site-layout :title="__('Sign In')" bodyTag="sign">
    <div class="container">
        <div class="card-shadow p-3 m-5">
            <div class="login-card w-75">
                <div class="m-auto text-center mb-3">
                    <img src="{{asset('images/icons/profile.svg')}}" alt="login page" class="img-fluid">
                </div>

                <h1 class="text-center fw-bold h3">{{__('Sign In')}}</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('Email')}}</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                               autocomplete="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{__('Password')}}</label>
                        <input type="password" name="password" class="form-control" autocomplete="password"
                               id="password" required>
                    </div>
                    <div class="mb-3">
                        <p class="fw-bold"><a class="mx-1"
                                              href="{{route('password.request')}}">{{__('Forgot Password')}}</a>
                        </p>
                    </div>
                    <div class="mb-3">
                        <p class="fw-bold">{{__("I Don't Have Account!")}} <a class="mx-1"
                                                                              href="{{route('register')}}">{{__('Create A New Account')}}</a>
                        </p>
                    </div>
                    <button type="submit"
                            class="btn btn-main-color w-100 p-2 fw-bold">{{__('Sign In')}}</button>
                </form>
            </div>
        </div>
    </div>
</x-site-layout>
