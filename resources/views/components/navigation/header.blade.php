
<style>
        header {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.8em;
            font-weight: 700;
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .logo:hover {
            color: #666;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 30px;
        }

        nav ul li a {
            text-decoration: none;
            color: #555;
            font-weight: 500;
            font-size: 1.1em;
            transition: all 0.3s ease;
            position: relative;
        }

        nav ul li a:hover {
            color: #000;
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background-color: #333;
            transition: all 0.3s ease;
        }

        nav ul li a:hover::after {
            width: 100%;
            left: 0;
        }

        .profile-icon {
            font-size: 1.8em;
            color: #555;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .profile-icon:hover {
            color: #333;
        }

        
/* --------------------------- */


        .section-header {
            text-align: center;
            margin: 80px 0 50px;
            position: relative;
            font-size: 2.2em;
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: #333;
        }

        .section-header::before,
        .section-header::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 30%;
            height: 2px;
            background: linear-gradient(to right, transparent, #ccc, transparent);
        }

        .section-header::before {
            left: 0;
        }

        .section-header::after {
            right: 0;
        }

</style>

    <header>
        <div class="header-content">
            <a href="#" class="logo">DIGITALES</a>
            <nav>
                <ul>
                    <li><a href="">about</a></li>
                    <li><a href="">browse</a></li>
                    <li><a href="">mode</a></li>
                </ul>
            </nav>
            <div class="profile-icon">👤</div>
        </div>
    </header>
