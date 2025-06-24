
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
                <p style="font-weight: bold;">Welcome to our Digitales website!</p>
                <p>Hello! We are a group of 3 students,  from Paragon International University, who are passionate about books and technology.This is a group project for our web development class, and we are excited to share it with you.</p>
            </div>
        </section>

        <!-- Our Mission Section -->
        <section class="section">
            <h2 class="section-title">Our Mission</h2>
            <div class="mission-grid">
                <div class="mission-item">
                    <div class="mission-icon">🎯</div>
                    <h3>Dynamic Digital Library</h3>
                    <p>Understanding the fundamentals of our platform is crucial for success. We believe that to achieve excellence, you need to continue learning and get high score.</p>
                </div>
                <div class="mission-item">
                    <div class="mission-icon">📈</div>
                    <h3>Connect with Community</h3>
                    <p>Understanding the dynamics of growth and development is key to our mission. We focus on continuous improvement and aim to achieve the highest standards.</p>
                </div>
                <div class="mission-item">
                    <div class="mission-icon">⭐</div>
                    <h3>Enhance Reading Experience</h3>
                    <p>Understanding the importance of excellence in everything we do. We strive to maintain the highest quality and deliver exceptional results to our community.</p>
                </div>
            </div>
        </section>

        <div class="divider"></div>

        <!-- Contributors Section -->
        <section class="section team-section">
           

            <div class="team-role">
                <h3>Developer Team</h3>
                <div class="team-grid">
                    <div class="team-member">
                        <img src="img/AboutUs_Profile/image.png" alt="J.K ROWLING" class="member-photo">
                        <div class="member-name">Sotheara Thun</div>
                    </div>
                    <div class="team-member">
                        <img src="img/AboutUs_Profile/image.png" alt="J.K ROWLING" class="member-photo">
                        <div class="member-name">Kimleng Huot</div>
                    </div>
                    <div class="team-member">
                        <img src="img/AboutUs_Profile/image.png" alt="J.K ROWLING" class="member-photo">
                        <div class="member-name">Kakada Huot</div>
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