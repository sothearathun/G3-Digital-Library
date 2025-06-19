<style>
    
        /* Footer  */
        footer {
            background: linear-gradient(135deg, #333 0%, #555 100%);
            color: #fff;
            padding: 60px 0 20px;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 40px;
        }

        .footer-section {
            flex: 1;
            min-width: 250px;
        }

        .footer-section h4 {
            margin-bottom: 20px;
            font-size: 1.3em;
            font-family: 'Playfair Display', serif;
        }

        .footer-section.logo h4 {
            font-size: 1.8em;
            font-weight: 700;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 12px;
        }

        .footer-section ul li a {
            text-decoration: none;
            color: #ccc;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #fff;
        }

        .newsletter-signup input[type="email"] {
            width: calc(100% - 80px);
            padding: 12px 15px;
            border: none;
            border-radius: 25px 0 0 25px;
            outline: none;
            font-size: 1em;
        }

        .newsletter-signup button {
            width: 80px;
            padding: 12px;
            background-color: #fff;
            color: #333;
            border: none;
            border-radius: 0 25px 25px 0;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .newsletter-signup button:hover {
            background-color: #f0f0f0;
        }

        .footer-bottom {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #666;
            text-align: center;
            color: #ccc;
        }
</style>
        <!-- Footer Component -->
    <footer>
        <div class="container footer-content">
            <div class="footer-section logo">
                <h4>DIGITALES</h4>
            </div>
            <div class="footer-section">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="#">Homepage</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Authors</a></li>
                    <li><a href="#">New Releases</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Help Center</h4>
                <ul>
                    <li><a href="#">View Profile</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="newsletter-signup">
                <h4>Join Our Newsletter</h4>
                <form action="#" method="post">
                    <input type="email" placeholder="Enter your email" required>
                    <button type="submit">Join</button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Digitales. All rights reserved.</p>
        </div>
    </footer>
