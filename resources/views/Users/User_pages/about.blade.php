<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About ExpenseVoyage - Smart Travel Expense Tracking</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Montserrat:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <link rel="stylesheet" href="assets/css/about.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">ExpenseVoyage</div>
        <button class="hamburger">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('feature') }}">Features</a>
            <a href="{{ route('contact') }}">Contact</a>
            <button class="cta-button">Get Started</button>
        </div>
    </nav>

    <!-- Main content -->
    <div class="main-content">
        <!-- About Hero section -->
        <section class="about-hero">
            <h1>About ExpenseVoyage</h1>
            <p>We're revolutionizing the way travelers manage their expenses, making budget tracking as seamless as the
                journey itself.</p>
            <p>Our platform was born from a simple realization: while technology has transformed nearly every aspect of
                travel, expense management remains stuck in the past.</p>
        </section>

        <!-- Mission section -->
        <section class="mission">
            <h2>Our Mission</h2>
            <div class="mission-content">
                <div class="mission-text">
                    <h3>Simplifying Travel Finance</h3>
                    <p>At ExpenseVoyage, we believe travel should be about experiences, not expense tracking headaches.
                        Our mission is to provide travelers with intuitive tools to manage their budgets effortlessly.
                    </p>
                    <p>Founded in 2023, we've created a platform that combines powerful budgeting tools with an
                        interface anyone can use. Whether you're a solo backpacker or managing a group vacation,
                        ExpenseVoyage adapts to your needs with smart features that learn from your spending habits.</p>
                    <p>We're committed to making financial management feel effortless. Automatic receipt scanning,
                        collaborative budgeting features, and predictive spending alerts work quietly in the background,
                        giving you more time to enjoy your adventures.</p>
                </div>
                {{-- <div class="mission-image">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                        alt="ExpenseVoyage Mission">
                </div> --}}
            </div>
        </section>

        <!-- Team section -->
        <section class="team">
            <h2>Meet The Developer</h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="assets/img/vectorImage.png" alt="Developer Name">
                    <h3>Muhammad Adan Khan</h3>
                    <p>Full-Stack Developer</p>
                    <div class="team-bio">
                        <p>The creative mind and technical force behind ExpenseVoyage. With expertise in frontend and
                            backend development, I've built this platform from the ground up to revolutionize travel
                            expense tracking.</p>
                        <div class="tech-stack">
                            <span>HTML/CSS</span>
                            <span>BootStrap</span>
                            <span>JavaScript</span>
                            <span>Laravel</span>
                            <span>GSAP</span>
                            <span>MySQL</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technology Stack Section -->
        <section class="tech-stack-section">
            <h2>Our Technology</h2>
            <div class="tech-grid">
                <div class="tech-card">
                    <div class="tech-icon" style="color: #00f3ff;">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Real-Time Processing</h3>
                    <p>Instant expense tracking with live currency conversion and AI-powered categorization for accurate
                        financial insights.</p>
                </div>
                <div class="tech-card">
                    <div class="tech-icon" style="color: #b300ff;">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3>Bank-Level Security</h3>
                    <p>256-bit encryption and biometric authentication ensure your financial data remains completely
                        protected.</p>
                </div>
                <div class="tech-card">
                    <div class="tech-icon" style="color: #ff00c1;">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h3>Smart Automation</h3>
                    <p>Machine learning algorithms that predict budgets and suggest savings based on your travel
                        patterns.</p>
                </div>
            </div>
        </section>

        <!-- Values Section -->
        <section class="values-section">
            <h2>Our Core Values</h2>
            <div class="values-container">
                <div class="value-card">
                    <h3>Transparency</h3>
                    <p>No hidden fees or complicated pricing. We believe in clear, honest communication with our users
                        about how their data is used.</p>
                </div>
                <div class="value-card">
                    <h3>Innovation</h3>
                    <p>We're constantly evolving to incorporate the latest technologies that benefit travelers and
                        simplify expense management.</p>
                </div>
                <div class="value-card">
                    <h3>Privacy</h3>
                    <p>Your data belongs to you. We never sell or share personal financial information with third
                        parties.</p>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2023 ExpenseVoyage. All rights reserved.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Navbar animation
            gsap.to('.navbar', {
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out',
                delay: 0.5
            });

            // Nav links animation
            gsap.to('.nav-links a', {
                y: 0,
                opacity: 1,
                duration: 0.8,
                stagger: 0.1,
                ease: 'back.out',
                delay: 1
            });

            // CTA button animation
            gsap.to('.cta-button', {
                y: 0,
                opacity: 1,
                duration: 0.8,
                ease: 'elastic.out(1, 0.5)',
                delay: 1.2
            });

            // Hamburger animation
            gsap.to('.hamburger', {
                y: 0,
                opacity: 1,
                duration: 0.8,
                delay: 1.2
            });

            // About hero animation
            gsap.to('.about-hero h1', {
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out',
                delay: 0.8
            });

            gsap.to('.about-hero p', {
                y: 0,
                opacity: 1,
                duration: 1,
                stagger: 0.2,
                ease: 'power3.out',
                delay: 1
            });

            // Mission section animation with ScrollTrigger
            gsap.registerPlugin(ScrollTrigger);

            gsap.to('.mission h2', {
                scrollTrigger: {
                    trigger: '.mission',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out'
            });

            gsap.to('.mission-text', {
                scrollTrigger: {
                    trigger: '.mission-content',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                x: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out'
            });

            gsap.to('.mission-image', {
                scrollTrigger: {
                    trigger: '.mission-content',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                x: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out'
            });

            // Team section animation
            gsap.to('.team h2', {
                scrollTrigger: {
                    trigger: '.team',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out'
            });

            gsap.to('.team-member', {
                scrollTrigger: {
                    trigger: '.team-grid',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 0.8,
                ease: 'back.out(1.2)'
            });

            // Technology Stack Section Animation
            gsap.to('.tech-stack-section h2', {
                scrollTrigger: {
                    trigger: '.tech-stack-section',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out'
            });

            gsap.to('.tech-card', {
                scrollTrigger: {
                    trigger: '.tech-grid',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 0.8,
                stagger: 0.2,
                ease: 'back.out(1.2)'
            });

            // Values Section Animation
            gsap.to('.values-section h2', {
                scrollTrigger: {
                    trigger: '.values-section',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out'
            });

            gsap.to('.value-card', {
                scrollTrigger: {
                    trigger: '.values-container',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 0.8,
                stagger: 0.2,
                ease: 'back.out(1.2)'
            });

            // Footer animation
            gsap.to('footer p', {
                scrollTrigger: {
                    trigger: 'footer',
                    start: 'top 90%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out'
            });

            // Additional animations for visual interest
            gsap.to('.tech-icon', {
                scrollTrigger: {
                    trigger: '.tech-card',
                    start: 'top 90%',
                    toggleActions: 'play none none none'
                },
                rotation: 360,
                duration: 1.5,
                ease: 'elastic.out(1, 0.5)',
                stagger: 0.2
            });

            // Hamburger menu toggle
            const hamburger = document.querySelector('.hamburger');
            const navLinks = document.querySelector('.nav-links');

            hamburger.addEventListener('click', () => {
                hamburger.classList.toggle('open');
                navLinks.classList.toggle('active');

                // Disable scroll when menu is open
                if (navLinks.classList.contains('active')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            });

            // Close menu when clicking on a link
            document.querySelectorAll('.nav-links a').forEach(link => {
                link.addEventListener('click', () => {
                    if (navLinks.classList.contains('active')) {
                        hamburger.classList.remove('open');
                        navLinks.classList.remove('active');
                        document.body.style.overflow = '';
                    }
                });
            });
        });
    </script>
</body>

</html>
