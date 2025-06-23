
<!-- 
this page will be static since we wont really be editing much or often 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Digitales</title>



    <!-- style sheet -->
    <link rel="stylesheet" href="{{ asset('css/web/aboutus.css') }}">
</head>
<body>

    <!-- header -->
     <x-navigation.header/>


    <div class="container">
        <!-- About Us Section -->
        <section class="section">
            <h2 class="section-title">About Us</h2>
            <div class="about-content">
                <p>If you forget your password, I won't tell you who you are.</p>
                <ul>
                    <li>Click on "Forgot password?" or "Need account?" - this is usually under the password field.</li>
                    <li>Enter your email or username associated with the account.</li>
                    <li>Check your email for the reset link - it might be in your spam folder too.</li>
                    <li>Click the link in the email to reset your password - the link expires so don't wait too long.</li>
                    <li>If you don't get an email or it didn't recover your account, look for a "Contact Support" option on the website.</li>
                </ul>
            </div>
        </section>

        <!-- Our Mission Section -->
        <section class="section">
            <h2 class="section-title">Our Mission</h2>
            <div class="mission-grid">
                <div class="mission-item">
                    <div class="mission-icon">🎯</div>
                    <h3>Get High-score</h3>
                    <p>Understanding the fundamentals of our platform is crucial for success. We believe that to achieve excellence, you need to continue learning and get high score.</p>
                </div>
                <div class="mission-item">
                    <div class="mission-icon">📈</div>
                    <h3>Get High-score</h3>
                    <p>Understanding the dynamics of growth and development is key to our mission. We focus on continuous improvement and aim to achieve the highest standards.</p>
                </div>
                <div class="mission-item">
                    <div class="mission-icon">⭐</div>
                    <h3>Get High-score</h3>
                    <p>Understanding the importance of excellence in everything we do. We strive to maintain the highest quality and deliver exceptional results to our community.</p>
                </div>
            </div>
        </section>

        <div class="divider"></div>

        <!-- Contributors Section -->
        <section class="section team-section">
            <h2 class="section-title">Contributor</h2>
            
            <div class="team-role">
                <h3>Project Manager</h3>
                <div class="team-grid">
                    <div class="team-member">
                        <img src="img/AboutUs_Profile/image.png" alt="J.K ROWLING" class="member-photo">
                        <div class="member-name">J.K ROWLING</div>
                    </div>
                    <div class="team-member">
                        <img src="img/AboutUs_Profile/image.png" alt="J.K ROWLING" class="member-photo">
                        <div class="member-name">J.K ROWLING</div>
                    </div>
                </div>
            </div>

            <div class="team-role">
                <h3>Developer Team</h3>
                <div class="team-grid">
                    <div class="team-member">
                        <img src="img/AboutUs_Profile/image.png" alt="J.K ROWLING" class="member-photo">
                        <div class="member-name">J.K ROWLING</div>
                    </div>
                    <div class="team-member">
                        <img src="img/AboutUs_Profile/image.png" alt="J.K ROWLING" class="member-photo">
                        <div class="member-name">J.K ROWLING</div>
                    </div>
                    <div class="team-member">
                        <img src="img/AboutUs_Profile/image.png" alt="J.K ROWLING" class="member-photo">
                        <div class="member-name">J.K ROWLING</div>
                    </div>
                </div>
            </div>
        </section>

        <div class="divider"></div>
    </div>



    <!-- footer -->
     <x-navigation.footer/>

    
</body>
</html>