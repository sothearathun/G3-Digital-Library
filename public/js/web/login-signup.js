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