<x-site-layout :title="__('Register')" bodyTag="register">
    <div class="container">
        <div class="card-shadow p-3 m-5">
            <div class="login-card w-75">
                <div class="m-auto text-center mb-3">
                    <img src="{{asset('images/icons/profile.svg')}}" alt="login page" class="img-fluid">
                </div>

                <h1 class="text-center fw-bold h3">{{__('Create A New Account')}}</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('Name')}}</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="name" required>
                    </div>
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
                        <label for="password_confirmation" class="form-label">{{__('Password Confirmation')}}</label>
                        <input type="password" class="form-control" name="password_confirmation" required
                               autocomplete="new-password" id="password_confirmation">
                    </div>
                    <div class="mb-3">
                        <p class="fw-bold">{{__('Already Have An Account?')}} <a class="mx-1"
                                                                                 href="{{route('login')}}">{{__('Sign In')}}</a>
                        </p>
                    </div>
                    <button type="submit"
                            class="btn btn-main-color w-100 p-2 fw-bold">{{__('Create A New Account')}}</button>
                </form>
            </div>
        </div>
    </div>
</x-site-layout>
