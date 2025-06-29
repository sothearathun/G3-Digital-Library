<!-- resources/views/auth/partials/signup_form.blade.php -->
<div class="tab-content active" id="signupContent">
    <form id="signupForm" action="{{ route('processSignup') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="signupName">Full Name</label>
            <div class="input-wrapper">
                <i class="fas fa-user input-icon"></i>
                <input type="text" id="signupName" name="name" placeholder="Enter your full name" required />
            </div>
        </div>

        <div class="form-group">
            <label for="signupEmail">Email Address</label>
            <div class="input-wrapper">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" id="signupEmail" name="email" placeholder="Enter your email" required />
            </div>
        </div>

        <div class="form-group">
            <label for="signupPassword">Password</label>
            <div class="input-wrapper">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="signupPassword" name="password" placeholder="Create a password" required />
            </div>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <div class="input-wrapper">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Confirm your password" required />
            </div>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="agreeTerms" name="terms" required />
            <label for="agreeTerms">I agree to the Terms and Conditions</label>
        </div>

        <button type="submit" class="submit-button">
            <i class="fas fa-user-plus"></i> Create Account
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

