<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExpenseVoyage - Smart Travel Expense Tracking</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Montserrat:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <link rel="stylesheet" href="assets/css/home.css">


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
        <!-- Hero section -->
        <section class="hero">
            <div class="hero-content">
                <h1>Track Your Travel Expenses Smarter</h1>
                <p>ExpenseVoyage helps you manage your travel budget effortlessly with real-time expense tracking,
                    itinerary management, and intelligent budget alerts.</p>
                <div class="button-group">
                    <a href="{{ route('showSignup') }}" style="text-decoration: none" class="cta-button">Start Your
                        Journey</a>
                    <a href="{{ route('showLogin') }}" class="secondary-button text-decoration-none">Already have an
                        account?</a>
                </div>
            </div>
        </section>

        <!-- Features section -->
        <section class="features">
            <h2>Key Features</h2>
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="icon">💸</div>
                    <h3>Real-Time Expense Tracking</h3>
                    <p>Log your expenses on the go and see exactly where your money is going during your trips with our
                        intuitive interface.</p>
                </div>
                <div class="feature-card">
                    <div class="icon">📊</div>
                    <h3>Smart Budget Management</h3>
                    <p>Set budgets for your trips and get alerts before you overspend. Our AI analyzes your spending
                        patterns to give personalized recommendations.</p>
                </div>
                <div class="feature-card">
                    <div class="icon">🌐</div>
                    <h3>Multi-Currency Support</h3>
                    <p>Automatically convert expenses between multiple currencies with up-to-date exchange rates. Never
                        worry about currency conversion again.</p>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2023 ExpenseVoyage. All rights reserved.</p>
    </footer>

    <script>
        // Initialize GSAP animations
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

            // Hero content animation
            gsap.to('.hero h1', {
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out',
                delay: 0.8
            });

            gsap.to('.hero p', {
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out',
                delay: 1
            });

            gsap.to('.hero .cta-button', {
                scale: 1,
                opacity: 1,
                duration: 0.8,
                ease: 'back.out(1.7)',
                delay: 1.2
            });

            gsap.to('.secondary-button', {
                scale: 1,
                opacity: 1,
                duration: 0.8,
                ease: 'back.out(1.7)',
                delay: 1.4
            });

            // Features section animation with ScrollTrigger
            gsap.registerPlugin(ScrollTrigger);

            gsap.to('.features h2', {
                scrollTrigger: {
                    trigger: '.features',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out'
            });

            gsap.to('.feature-card', {
                scrollTrigger: {
                    trigger: '.feature-grid',
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
