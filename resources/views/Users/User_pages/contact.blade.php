<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - ExpenseVoyage | Smart Travel Expense Tracking</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Montserrat:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <link rel="stylesheet" href="assets/css/contact.css">
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
        <!-- Contact Hero section -->
        <section class="contact-hero">
            <h1>Get In Touch</h1>
            <p>Have questions about ExpenseVoyage? Want to provide feedback or suggest new features? We'd love to hear
                from you!</p>
            <p>Our team is ready to help you make the most of your travel expense tracking experience.</p>
        </section>

        <!-- Contact Content -->
        <section class="contact-content">
            <div class="contact-info">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email Us</h3>
                    <a href="mailto:support@expensevoyage.com">support@expensevoyage.com</a>
                    <p>Typically respond within 24 hours</p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3>Call Us</h3>
                    <a href="tel:+18005551234">+1 (800) 555-1234</a>
                    <p>Monday-Friday, 9AM-5PM EST</p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>Help Center</h3>
                    <a href="#">Visit our knowledge base</a>
                    <p>Find answers to common questions</p>
                </div>
            </div>

            <div class="contact-form">
                <h3 class="form-title">Send Us a Message</h3>
                <form>
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </section>

        <!-- Map Section -->
        <section class="map-section">
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.215256054567!2d-73.9878449241647!3d40.74844097138989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1689876423583!5m2!1sen!2sus"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">How do I reset my password?</div>
                    <div class="faq-answer">
                        <p>You can reset your password by clicking on the "Forgot Password" link on the login page.
                            We'll send you an email with instructions to create a new password. If you don't receive the
                            email within a few minutes, please check your spam folder.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">Is my financial data secure?</div>
                    <div class="faq-answer">
                        <p>Absolutely. We use bank-level 256-bit encryption to protect all your data. We never store
                            your banking credentials and use read-only access when connecting to financial institutions.
                            Your privacy and security are our top priorities.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">Can I use ExpenseVoyage for business travel?</div>
                    <div class="faq-answer">
                        <p>Yes! Many business travelers use ExpenseVoyage to track their work-related expenses. Our
                            Business plan includes features specifically designed for corporate travel, including team
                            management and detailed expense reporting for reimbursement.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">Do you offer refunds?</div>
                    <div class="faq-answer">
                        <p>We offer a 30-day money-back guarantee on all paid plans. If you're not satisfied with
                            ExpenseVoyage within the first 30 days of your subscription, we'll issue a full refund.
                            After 30 days, we handle refunds on a case-by-case basis.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">How does the receipt scanning work?</div>
                    <div class="faq-answer">
                        <p>Our AI-powered receipt scanning uses optical character recognition (OCR) technology to
                            extract key details from your receipts. Just take a photo of your receipt and our system
                            will automatically categorize the expense, record the amount, and store a digital copy for
                            your records.</p>
                    </div>
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

            // Contact hero animation
            gsap.to('.contact-hero h1', {
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out',
                delay: 0.8
            });

            gsap.to('.contact-hero p', {
                y: 0,
                opacity: 1,
                duration: 1,
                stagger: 0.2,
                ease: 'power3.out',
                delay: 1
            });

            // Contact content animation with ScrollTrigger
            gsap.registerPlugin(ScrollTrigger);

            gsap.to('.contact-info', {
                scrollTrigger: {
                    trigger: '.contact-content',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                x: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out'
            });

            gsap.to('.contact-form', {
                scrollTrigger: {
                    trigger: '.contact-content',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                x: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out'
            });

            // Map animation
            gsap.to('.map-container', {
                scrollTrigger: {
                    trigger: '.map-section',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'back.out(1.2)'
            });

            // FAQ animation
            gsap.to('.faq-section h2', {
                scrollTrigger: {
                    trigger: '.faq-section',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out'
            });

            gsap.to('.faq-item', {
                scrollTrigger: {
                    trigger: '.faq-container',
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
            gsap.to('.contact-icon', {
                scrollTrigger: {
                    trigger: '.contact-card',
                    start: 'top 90%',
                    toggleActions: 'play none none none'
                },
                rotation: 360,
                duration: 1.5,
                ease: 'elastic.out(1, 0.5)',
                stagger: 0.1
            });

            // FAQ accordion functionality
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                question.addEventListener('click', () => {
                    item.classList.toggle('active');

                    // Close other open items
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item && otherItem.classList.contains('active')) {
                            otherItem.classList.remove('active');
                        }
                    });
                });
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

            // Form submission
            const form = document.querySelector('.contact-form form');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                alert('Thank you for your message! We will get back to you soon.');
                form.reset();
            });
        });
    </script>
</body>

</html>
