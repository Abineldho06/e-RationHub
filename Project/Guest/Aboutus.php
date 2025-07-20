<?php
    include "Head.php";
?>
    
</head>
<body>
    <div class="hero">
        <img src="../Assets/Templates/User/images/index.png" alt="Digital ration distribution system" class="hero-image">
        <div class="container">
            <h1>About Us</h1>
            <p>E-Smart Ration is a project built on the principle of improving lives through technology. Our mission is to transform the traditional ration distribution system into a modern, user-centric platform that simplifies access to essential goods for beneficiaries.</p>
        </div>
    </div>

    <div class="container">
        <div class="section vision">
            <img src="../Assets/Templates/Login/images/vision.jpg" alt="Future of ration distribution" class="section-image">
            <h2>Our Vision</h2>
            <p>We envision a future where ration distribution is transparent, efficient, and accessible to everyone, ensuring that resources reach the people who need them most.</p>
        </div>

        <div class="section mission">
            <img src="../Assets/Templates/Login/images/mission.jpg" alt="Digital platform interface" class="section-image">
            <h2>Our Mission</h2>
            <p>Our mission is to empower users with a seamless, digital platform for pre-booking rations, managing entitlements, and accessing real-time updates. Through innovation, we aim to reduce resource wastage, enhance transparency, and improve user experience.</p>
        </div>

        <div class="section">
            <h2>Core Values</h2>
            <div class="values-grid">
                <div class="value-card">
                    <img src="../Assets/Templates/Login/images/transparency.jpg" alt="Transparency icon" class="value-icon">
                    <h3>Transparency</h3>
                    <p>We believe in fostering trust through clear and open processes.</p>
                </div>
                <div class="value-card">
                    <img src="../Assets/Templates/Login/images/efficiency.jpg" alt="Efficiency icon" class="value-icon">
                    <h3>Efficiency</h3>
                    <p>We strive to optimize the distribution process to save time and reduce waste.</p>
                </div>
                <div class="value-card">
                    <img src="../Assets/Templates/Login/images/user.jpg" alt="User-Centric Design icon" class="value-icon">
                    <h3>User-Centric Design</h3>
                    <p>Our platform is designed with the needs of customers, shop owners, and administrators in mind.</p>
                </div>
                <div class="value-card">
                    <img src="../Assets/Templates/Login/images/innovation.jpg" alt="Innovation icon" class="value-icon">
                    <h3>Innovation</h3>
                    <p>We embrace technology to create smarter solutions for everyday challenges.</p>
                </div>
            </div>
        </div>

        <div class="team-section">
            <h2>Meet the Team</h2>
            <img src="../Assets/Templates/User/images/LogoR.png" alt="Our team" class="team-image">
            <p>Our dedicated team comprises developers, designers, and project managers passionate about making a difference in the community. Together, we work tirelessly to deliver a reliable and impactful solution for ration distribution.</p>
        </div>

        <p class="footer-note">E-Smart Ration is more than a project; it is our commitment to building a better tomorrow.</p>
    </div>
    <style>
        :root {
            --pastel-yellow: #fff7d6;
            --pastel-green: #dcedc2;
            --pastel-blue: #d4e6f1;
            --dark: #2c3e50;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            line-height: 1.6;
            color: var(--dark);
            background-color: #000 !important;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .hero {
            background-color: var(--pastel-yellow);
            padding: 4rem 0;
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }

        .hero-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            aspect-ratio: 1;
            margin-bottom: 2rem;
        }

        .hero h1 {
            font-size: 2.5rem;
            color: var(--dark);
            margin-bottom: 1.5rem;
        }

        .hero p {
            font-size: 1.2rem;
            color: var(--dark);
            max-width: 800px;
            margin: 0 auto;
        }

        .section {
            margin-bottom: 4rem;
            padding: 2rem;
            border-radius: 15px;
        }

        .section.vision {
            background-color: var(--pastel-blue);
        }

        .section.mission {
            background-color: var(--pastel-green);
        }

        .section h2 {
            color: var(--dark);
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }

        .section p {
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .section-image {
            width: 100%;
            max-height: 250px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .value-card {
            background-color: var(--white);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .value-card:hover {
            transform: translateY(-5px);
        }

        .value-card h3 {
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .value-icon {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
        }

        .team-section {
            background-color: var(--pastel-yellow);
            padding: 4rem 0;
            text-align: center;
            border-radius: 15px;
        }

        .team-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin: 2rem 0;
        }

        .footer-note {
            text-align: center;
            font-style: italic;
            color: var(--dark);
            margin-top: 3rem;
            padding: 2rem;
            background-color: var(--pastel-blue);
            border-radius: 10px;
        }
    </style>


<?php
    include "Foot.php";
?>