<!-- resources/views/auth/partials/login_form.blade.php -->


<div class="tab-content active" id="loginContent">
    <form id="loginForm" action="{{ route('processLogin') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="loginEmail">Email Address</label>
            <div class="input-wrapper">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" id="loginEmail" name="email" placeholder="Enter your email" required />
            </div>
        </div>

        <div class="form-group">
            <label for="loginPassword">Password</label>
            <div class="input-wrapper">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="loginPassword" name="password" placeholder="Enter your password" required />
            </div>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="rememberMe" name="remember" />
            <label for="rememberMe">Remember me</label>
        </div>

        <button type="submit" class="submit-button">
            <i class="fas fa-sign-in-alt"></i> Log in
        </button>

        <button type="button" class="guest-button" >
            <i class="fas fa-user-secret"></i> Continue as Guest
        </button>

     @if ($errors -> any())
      <ul class="px-4 py-2 bg-red-100">
        @foreach ($errors -> all() as $error)
          <li class="text-red-600">{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    </form>
</div>
