
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
    
    <style>
        /* Login Modal CSS */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('img/login_signup_bg/login_signup_bg.jpg');
    /* background-size: cover; */
    background-position: center;
    backdrop-filter: blur(10px);
    display: flex;
    justify-content: center;
    align-items: center;
    /* z-index: 1000; */
    opacity: 1;
    visibility: visible;
    transition: all 0.3s ease;
}

.modal-overlay::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Black overlay with 50% opacity */
    /* z-index: -1; */
}

        .modal-overlay.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .modal-container {
            background: #2D3748;
            border-radius: 20px;
            padding: 0;
            width: 420px;
            max-width: 90%;
            position: relative;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-header {
            background: linear-gradient(135deg, #4A5568, #2D3748);
            padding: 30px 40px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

.modal-close {
    position: absolute;
    top: 20px;
    right: 25px;
    background: none;
    border: none;
    color: #A0AEC0;
    font-size: 24px;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}

.modal-close:hover {
    color: #fff;
    background: rgba(255, 255, 255, 0.1);
}

        .modal-tabs {
            display: flex;
            background: #1A202C;
            border-radius: 15px;
            padding: 4px;
            margin-bottom: 20px;
        }

        .tab-button {
            flex: 1;
            background: none;
            border: none;
            padding: 12px 20px;
            color: #A0AEC0;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        .tab-button.active {
            background: #4299E1;
            color: #fff;
            box-shadow: 0 2px 8px rgba(66, 153, 225, 0.3);
        }

        .modal-body {
            padding: 0 40px 40px;
        }

        .tab-content {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .tab-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #E2E8F0;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
        }

        .input-wrapper {
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 14px 16px;
            padding-left: 45px;
            border: 1px solid #4A5568;
            border-radius: 12px;
            background: #1A202C;
            color: #fff;
            font-size: 14px;
            transition: all 0.3s ease;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4299E1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
            background: #2D3748;
        }

        .form-group input::placeholder {
            color: #718096;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #718096;
            font-size: 16px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            accent-color: #4299E1;
        }

        .checkbox-group label {
            color: #CBD5E0;
            font-size: 14px;
            margin-bottom: 0;
            cursor: pointer;
        }

        .submit-button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #4299E1, #3182CE);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .submit-button:hover {
            background: linear-gradient(135deg, #3182CE, #2B6CB0);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(66, 153, 225, 0.4);
        }

        .submit-button:active {
            transform: translateY(0);
        }

        .guest-button {
            width: 100%;
            padding: 16px;
            background: transparent;
            color: #4299E1;
            border: 2px solid #4299E1;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .guest-button:hover {
            background: rgba(66, 153, 225, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(66, 153, 225, 0.2);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #4A5568;
        }

        .divider span {
            padding: 0 20px;
            color: #718096;
            font-size: 14px;
            font-weight: 500;
        }

        .forgot-password {
            text-align: center;
            margin-bottom: 25px;
        }

        .forgot-password a {
            color: #4299E1;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #63B3ED;
            text-decoration: underline;
        }

        .social-login {
            margin-top: 25px;
        }

        .social-buttons {
            display: flex;
            gap: 12px;
        }

        .social-button {
            flex: 1;
            padding: 14px;
            border: 1px solid #4A5568;
            border-radius: 12px;
            background: #1A202C;
            color: #E2E8F0;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-family: 'Inter', sans-serif;
        }

        .social-button:hover {
            background: #2D3748;
            border-color: #718096;
            transform: translateY(-2px);
        }

        .social-button i {
            font-size: 16px;
        }

        .google-btn {
            color: #4285F4;
        }

        .facebook-btn {
            color: #1877F2;
        }

        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .spinner {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top: 2px solid #fff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .modal-container {
                width: 95%;
                margin: 20px;
            }
            
            .modal-header {
                padding: 25px 20px 15px;
            }
            
            .modal-body {
                padding: 0 20px 30px;
            }
            
            .tab-button {
                padding: 10px 16px;
                font-size: 13px;
            }
        }

        /* bring form to front */
        .modal-overlay {
            position: fixed;        
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;     
        }
    </style>
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

    <script>
        // Login Modal JavaScript
        function closeModal() {
            const modal = document.getElementById('loginModal');
            modal.classList.add('hidden');
        }

        function switchTab(tabName) {
            // Remove active class from all tabs and content
            document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
            
            // Add active class to clicked tab and corresponding content
            if (tabName === 'login') {
                document.querySelector('.tab-button:first-child').classList.add('active');
                document.getElementById('loginContent').classList.add('active');
            } else {
                document.querySelector('.tab-button:last-child').classList.add('active');
                document.getElementById('signupContent').classList.add('active');
            }
        }

        function showForgotPassword() {
            alert('Forgot password functionality would be implemented here.\nRedirect to forgot password page or show forgot password form.');
        }

        function loginAsGuest() {
            console.log('Login as guest clicked');
            // Add loading state
            const button = event.target;
            const originalText = button.innerHTML;
            button.innerHTML = '<div class="spinner"></div> Logging in...';
            button.classList.add('loading');
            
            // Simulate guest login process
            setTimeout(() => {
                alert('Logged in as Guest successfully!');
                closeModal();
                // You would typically redirect to the homepage or dashboard
                // window.location.href = '/dashboard';
            }, 1500);
        }

        function socialLogin(provider) {
            console.log(`${provider} login clicked`);
            // Add loading state
            const button = event.target;
            const originalText = button.innerHTML;
            button.innerHTML = '<div class="spinner"></div> Connecting...';
            button.classList.add('loading');
            
            // Simulate social login process
            setTimeout(() => {
                alert(`${provider.charAt(0).toUpperCase() + provider.slice(1)} login would be implemented here.\nRedirect to ${provider} OAuth.`);
                button.innerHTML = originalText;
                button.classList.remove('loading');
            }, 2000);
        }

        // Form submissions
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            const remember = document.getElementById('rememberMe').checked;
            
            // Add loading state
            const submitButton = this.querySelector('.submit-button');
            const originalText = submitButton.innerHTML;
            submitButton.innerHTML = '<div class="spinner"></div> Signing in...';
            submitButton.classList.add('loading');
            
            // Simulate login process
            setTimeout(() => {
                console.log('Login attempt:', { email, password, remember });
                alert('Login successful!');
                closeModal();
                // You would typically send this data to your server
                // window.location.href = '/dashboard';
            }, 2000);
        });

        document.getElementById('signupForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('signupName').value;
            const email = document.getElementById('signupEmail').value;
            const password = document.getElementById('signupPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const terms = document.getElementById('agreeTerms').checked;
            
            // Validation
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }
            
            if (!terms) {
                alert('Please agree to the Terms and Conditions');
                return;
            }
            
            // Add loading state
            const submitButton = this.querySelector('.submit-button');
            const originalText = submitButton.innerHTML;
            submitButton.innerHTML = '<div class="spinner"></div> Creating Account...';
            submitButton.classList.add('loading');
            
            // Simulate signup process
            setTimeout(() => {
                console.log('Signup attempt:', { name, email, password, terms });
                alert('Account created successfully!');
                closeModal();
                // You would typically send this data to your server
                // window.location.href = '/dashboard';
            }, 2000);
        });

        // Close modal when clicking outside of it
        document.getElementById('loginModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });

        // Prevent modal from closing when clicking inside the modal container
        document.querySelector('.modal-container').addEventListener('click', function(e) {
            e.stopPropagation();
        });
    </script>
</body>
</html>
