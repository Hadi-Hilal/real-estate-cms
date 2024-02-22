<x-site-layout :title="__('Forgot Password')" bodyTag="forgot">
    <div class="container">
        <div class="card-shadow p-3 m-5">
            <div class="login-card w-75">
                <div class="m-auto text-center mb-3">
                    <img src="{{asset('images/icons/profile.svg')}}" alt="login page" class="img-fluid">
                </div>

                <h1 class="text-center fw-bold h3">{{__('Forgot Password')}}</h1>
                <p class="text-center">
                    {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}

                </p>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('Email')}}</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                               autocomplete="email" required>
                    </div>
                    <button type="submit"
                            class="btn btn-main-color w-100 p-2 fw-bold">{{__('Send Email Verification')}}</button>
                </form>
            </div>
        </div>
    </div>
</x-site-layout>
