<!-- resources/views/auth/login_modal.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup Modal</title>

    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/web/login_signup.css') }}" />
</head>
<body>

    <div class="modal-overlay" id="signupModal">
        <div class="modal-container">

            <!-- Modal Tabs -->
            <div class="modal-header">
                <div class="modal-tabs">
                    <button class="tab-button moveToLogin" >
                        <i class="fas fa-sign-in-alt"></i> Login to DIGITALES
                    </button>
                    <button class="tab-button active moveToSignup" >
                        <i class="fas fa-user-plus"></i> Sign up to DIGITALES
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
               

                {{-- Include Signup Form --}}
                <x-auth_partials.signup_form />

                
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('js/web/login_signup.js') }}"></script>
</body>
</html>
