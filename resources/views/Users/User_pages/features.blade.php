<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features - ExpenseVoyage | Smart Travel Expense Tracking</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Montserrat:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <link rel="stylesheet" href="assets/css/feature.css">

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
        <!-- Features Hero section -->
        <section class="features-hero">
            <h1>Powerful Features</h1>
            <p>ExpenseVoyage is packed with smart tools to simplify your travel finances. From automatic expense
                tracking to real-time budget analysis, we've got you covered.</p>
            <p>Discover how our features can transform the way you manage money on the road.</p>
        </section>

        <!-- Features Grid -->
        <section class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-receipt"></i>
                </div>
                <span class="feature-tag">Expense Tracking</span>
                <h3>Smart Receipt Capture</h3>
                <p>Simply snap a photo of your receipt and our AI will automatically extract the details, categorize the
                    expense, and log it in your travel journal.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-exchange-alt"></i>
                </div>
                <span class="feature-tag">Currency</span>
                <h3>Real-Time Conversion</h3>
                <p>Automatically converts expenses to your home currency using live exchange rates, giving you an
                    accurate picture of your spending across borders.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <span class="feature-tag">Analytics</span>
                <h3>Spending Insights</h3>
                <p>Visual dashboards show where your money is going, with breakdowns by category, location, and time
                    period to help you make smarter spending decisions.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <span class="feature-tag">Collaboration</span>
                <h3>Group Expense Splitting</h3>
                <p>Traveling with friends? Easily split expenses and track who owes what, with automatic calculations
                    and reminders to settle up.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <span class="feature-tag">Location</span>
                <h3>Geotagged Expenses</h3>
                <p>Expenses are automatically tagged with your location, creating a visual map of your spending journey
                    across destinations.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <span class="feature-tag">Alerts</span>
                <h3>Budget Notifications</h3>
                <p>Get real-time alerts when you're approaching budget limits in any category, helping you avoid
                    overspending while still enjoying your trip.</p>
            </div>
        </section>

        <!-- Premium Features Section -->
        <section class="premium-features">
            <h2>Premium Features</h2>
            <div class="premium-grid">
                <div class="premium-card">
                    <div class="premium-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <span class="premium-tag">AI Assistant</span>
                    <h3>Smart Budget Predictor</h3>
                    <p>Our AI analyzes your spending patterns to predict future expenses and suggest daily budgets
                        tailored to your travel style and destinations.</p>
                </div>

                <div class="premium-card">
                    <div class="premium-icon">
                        <i class="fas fa-passport"></i>
                    </div>
                    <span class="premium-tag">Multi-Trip</span>
                    <h3>Unlimited Trips</h3>
                    <p>Manage multiple trips simultaneously with separate budgets and expense tracking for each journey,
                        all in one place.</p>
                </div>

                <div class="premium-card">
                    <div class="premium-icon">
                        <i class="fas fa-file-export"></i>
                    </div>
                    <span class="premium-tag">Reports</span>
                    <h3>Tax-Ready Export</h3>
                    <p>Generate professional expense reports with all necessary details for tax deductions or business
                        reimbursement, exported in multiple formats.</p>
                </div>

                <div class="premium-card">
                    <div class="premium-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <span class="premium-tag">Security</span>
                    <h3>Bank Integration</h3>
                    <p>Securely connect your bank accounts and credit cards for automatic transaction importing and
                        reconciliation with your manual entries.</p>
                </div>

                <div class="premium-card">
                    <div class="premium-icon">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <span class="premium-tag">Storage</span>
                    <h3>Unlimited Receipt Storage</h3>
                    <p>Never lose a receipt again with our secure cloud storage that keeps digital copies of all your
                        travel expenses organized and accessible.</p>
                </div>

                <div class="premium-card">
                    <div class="premium-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <span class="premium-tag">Support</span>
                    <h3>Priority Assistance</h3>
                    <p>Get fast-track access to our support team with 24/7 chat support and guaranteed response times
                        for all your travel finance questions.</p>
                </div>
            </div>
        </section>

        <!-- Feature Comparison Section -->
        <section class="comparison">
            <h2>Plan Comparison</h2>
            <div class="comparison-table">
                <table>
                    <thead>
                        <tr>
                            <th>Feature</th>
                            <th>Free</th>
                            <th>Premium</th>
                            <th>Business</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Expense Tracking</td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                        </tr>
                        <tr>
                            <td>Receipt Capture</td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                        </tr>
                        <tr>
                            <td>Currency Conversion</td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                        </tr>
                        <tr>
                            <td>Basic Reports</td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                        </tr>
                        <tr>
                            <td>Group Expense Splitting</td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                        </tr>
                        <tr>
                            <td>Budget Notifications</td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                        </tr>
                        <tr>
                            <td>AI Budget Predictor</td>
                            <td><i class="fas fa-times x-mark"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                        </tr>
                        <tr>
                            <td>Unlimited Trips</td>
                            <td><i class="fas fa-times x-mark"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                        </tr>
                        <tr>
                            <td>Tax Export</td>
                            <td><i class="fas fa-times x-mark"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                        </tr>
                        <tr>
                            <td>Bank Integration</td>
                            <td><i class="fas fa-times x-mark"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                            <td><i class="fas fa-check check"></i></td>
                        </tr>
                        <tr>
                            <td>Receipt Storage</td>
                            <td>50 receipts</td>
                            <td>Unlimited</td>
                            <td>Unlimited</td>
                        </tr>
                        <tr>
                            <td>Priority Support</td>
                            <td><i class="fas fa-times x-mark"></i></td>
                            <td>Email/Chat</td>
                            <td>24/7 Phone</td>
                        </tr>
                        <tr>
                            <td>Team Members</td>
                            <td>1</td>
                            <td>1</td>
                            <td>Up to 10</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="plan-name">Free Forever</td>
                            <td class="plan-name">$9.99/month</td>
                            <td class="plan-name">$29.99/month</td>
                        </tr>
                    </tbody>
                </table>
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

            // Features hero animation
            gsap.to('.features-hero h1', {
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out',
                delay: 0.8
            });

            gsap.to('.features-hero p', {
                y: 0,
                opacity: 1,
                duration: 1,
                stagger: 0.2,
                ease: 'power3.out',
                delay: 1
            });

            // Features grid animation with ScrollTrigger
            gsap.registerPlugin(ScrollTrigger);

            gsap.to('.feature-card', {
                scrollTrigger: {
                    trigger: '.features-grid',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 0.8,
                stagger: 0.15,
                ease: 'back.out(1.2)'
            });

            // Premium features animation
            gsap.to('.premium-features h2', {
                scrollTrigger: {
                    trigger: '.premium-features',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out'
            });

            gsap.to('.premium-card', {
                scrollTrigger: {
                    trigger: '.premium-grid',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 0.8,
                stagger: 0.15,
                ease: 'back.out(1.2)'
            });

            // Comparison animation
            gsap.to('.comparison h2', {
                scrollTrigger: {
                    trigger: '.comparison',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out'
            });

            gsap.to('.comparison-table', {
                scrollTrigger: {
                    trigger: '.comparison-table',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'back.out(1.2)'
            });

            // CTA section animation
            gsap.to('.cta-section h2', {
                scrollTrigger: {
                    trigger: '.cta-section',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out'
            });

            gsap.to('.cta-section p', {
                scrollTrigger: {
                    trigger: '.cta-section',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 1,
                ease: 'power3.out'
            });

            gsap.to('.cta-button', {
                scrollTrigger: {
                    trigger: '.cta-buttons',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 0.8,
                ease: 'back.out(1.2)'
            });

            gsap.to('.cta-button-secondary', {
                scrollTrigger: {
                    trigger: '.cta-buttons',
                    start: 'top 80%',
                    toggleActions: 'play none none none'
                },
                y: 0,
                opacity: 1,
                duration: 0.8,
                delay: 0.2,
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
            gsap.to('.feature-icon, .premium-icon', {
                scrollTrigger: {
                    trigger: '.feature-card, .premium-card',
                    start: 'top 90%',
                    toggleActions: 'play none none none'
                },
                rotation: 360,
                duration: 1.5,
                ease: 'elastic.out(1, 0.5)',
                stagger: 0.1
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
