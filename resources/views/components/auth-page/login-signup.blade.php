
<!-- 
i saw in git that u split every parts like: loginm signup, forget ps 
but i already conbined everything..... but feel free to split it apart
-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Modal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/web/login-signup.css') }}">
</head>
<body>
    <!-- Login Modal HTML -->
    <div class="modal-overlay" id="loginModal">
        <div class="modal-container">

            <!-- cancel "X" button -->
<a href="http://127.0.0.1:8000/homepage" class="modal-close">
    <i class="fas fa-times"></i>
</a>
            <!-- cancel "X" button -->
             
            
            <div class="modal-header">
                <div class="modal-tabs">
                    <button class="tab-button active" onclick="switchTab('login')">
                        <i class="fas fa-sign-in-alt"></i> Login to DIGITALES
                    </button>
                    <button class="tab-button" onclick="switchTab('signup')">
                        <i class="fas fa-user-plus"></i> Sign up to DIGITALES

                        <!-- redicrecting to homepage after signed up -->
                        <a href="http://127.0.0.1:8000/homepage" style="color: #fff; text-decoration: none;">
                            Sign up to DIGITALES
                        </a>
                        <!-- redicrecting to homepage after signed up -->

                    </button>
                </div>
            </div>
            
            <div class="modal-body">
                <!-- Login Form -->
                <div class="tab-content active" id="loginContent">
                    <form id="loginForm">
                        <div class="form-group">
                            <label for="loginEmail">Email Address</label>
                            <div class="input-wrapper">
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" id="loginEmail" name="email" placeholder="Enter your email" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <div class="input-wrapper">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" id="loginPassword" name="password" placeholder="Enter your password" required>
                            </div>
                        </div>
                        
                        <div class="checkbox-group">
                            <input type="checkbox" id="rememberMe" name="remember">
                            <label for="rememberMe">Remember me</label>
                        </div>
                        
                        <button type="submit" class="submit-button">
                            <i class="fas fa-sign-in-alt"></i>

                            <!-- redirecting to homepage -->
                            <a href="http://127.0.0.1:8000/homepage" style="color: #fff; text-decoration: none;">
                                Sign in
                            </a>
                            <!-- redirecting to homepage -->
                            
                        </button>
                        
                        <button type="button" class="guest-button" onclick="loginAsGuest()">
                            <i class="fas fa-user-secret"></i>

                            <!-- redictiing to homepage -->
                            <a href="http://127.0.0.1:8000/homepage" style="color: #fff; text-decoration: none;">
                                Continue as Guest
                            </a>
                            <!-- redirecting to homepage -->
                            
                        </button>
                        
                        <div class="forgot-password">
                            <a href="#" onclick="showForgotPassword()">Forgot your password?</a>
                        </div>
                        
                        <!-- <div class="divider">
                            <span>or sign in with</span>
                        </div>
                        
                        <div class="social-login">
                            <div class="social-buttons">
                                <button type="button" class="social-button google-btn" onclick="socialLogin('google')">
                                    <i class="fab fa-google"></i>
                                    Google
                                </button>
                                <button type="button" class="social-button facebook-btn" onclick="socialLogin('facebook')">
                                    <i class="fab fa-facebook-f"></i>
                                    Facebook
                                </button>
                            </div>
                        </div> -->
                    </form>
                </div>
                
                <!-- Signup Form -->
                <div class="tab-content" id="signupContent">
                    <form id="signupForm">
                        <div class="form-group">
                            <label for="signupName">Full Name</label>
                            <div class="input-wrapper">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" id="signupName" name="name" placeholder="Enter your full name" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="signupEmail">Email Address</label>
                            <div class="input-wrapper">
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" id="signupEmail" name="email" placeholder="Enter your email" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="signupPassword">Password</label>
                            <div class="input-wrapper">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" id="signupPassword" name="password" placeholder="Create a password" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <div class="input-wrapper">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm your password" required>
                            </div>
                        </div>
                        
                        <div class="checkbox-group">
                            <input type="checkbox" id="agreeTerms" name="terms" required>
                            <label for="agreeTerms">I agree to the Terms and Conditions</label>
                        </div>
                        
                        <button type="submit" class="submit-button">
                            <i class="fas fa-user-plus"></i>
                            Create Account
                        </button>
                        
                        <button type="button" class="guest-button" onclick="loginAsGuest()">
                            <i class="fas fa-user-secret"></i>
                            Continue as Guest
                        </button>
                        
                        <!-- <div class="divider">
                            <span>or sign up with</span>
                        </div>
                        
                        <div class="social-login">
                            <div class="social-buttons">
                                <button type="button" class="social-button google-btn" onclick="socialLogin('google')">
                                    <i class="fab fa-google"></i>
                                    Google
                                </button>
                                <button type="button" class="social-button facebook-btn" onclick="socialLogin('facebook')">
                                    <i class="fab fa-facebook-f"></i>
                                    Facebook
                                </button>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/web/login-signup.js') }}"></script>
</html>