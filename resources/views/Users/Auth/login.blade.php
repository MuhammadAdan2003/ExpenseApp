<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Expense Tracker | Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- jQuery 3.7.1 (latest stable as of now) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/toastr.css">
    <script src="assets/js/toastr.js"></script>
    {{-- <link rel="stylesheet" href=""> --}}
</head>

<body>
    <!-- Enhanced Neon Grid Background -->
    <div class="neon-grid"></div>

    <!-- Enhanced Mouse Follower Effect -->
    <div class="mouse-follower" id="mouseFollower"></div>

    <!-- Floating Particles -->
    <div id="particles"></div>

    <div class="container" style="max-width: 450px;">
        <div class="logo">
            <h2>Expense Tracker</h2>
            <p>Welcome back</p>
        </div>

        <form id="loginForm">
            <div class="input-group">
                <input name="email" type="email" id="email" required>
                <label for="email">Email Address</label>
            </div>

            <div class="input-group">
                <input name="password" type="password" id="password" required>
                <label for="password">Password</label>
            </div>


            <button type="submit" class="btn" id="loginButton">
                <span class="btn-text">Sign In</span>
            </button>

            <div class="login-link">
                Don't have an account? <a href="{{ route('showSignup') }}">Sign up</a>
            </div>
        </form>
    </div>

    <script>
        // Enhanced mouse follower effect
        const mouseFollower = document.getElementById('mouseFollower');
        let mouseX = 0;
        let mouseY = 0;
        let followerX = 0;
        let followerY = 0;
        let isMouseMoving = false;
        let mouseStopTimeout;

        // Throttled mousemove handler
        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;

            if (!isMouseMoving) {
                mouseFollower.style.opacity = '0.8';
                isMouseMoving = true;
            }

            clearTimeout(mouseStopTimeout);
            mouseStopTimeout = setTimeout(() => {
                mouseFollower.style.opacity = '0';
                isMouseMoving = false;
            }, 500);

            requestAnimationFrame(updateFollowerPosition);
        });

        function updateFollowerPosition() {
            // Smooth follower movement
            followerX += (mouseX - followerX) * 0.1;
            followerY += (mouseY - followerY) * 0.1;

            mouseFollower.style.left = `${followerX}px`;
            mouseFollower.style.top = `${followerY}px`;

            if (isMouseMoving) {
                requestAnimationFrame(updateFollowerPosition);
            }
        }

        // Create floating particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            particlesContainer.innerHTML = '';

            const particleCount = 30;
            const particleColor = 'rgba(76, 201, 240, 0.5)';

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');

                // Random size between 2px and 6px
                const size = Math.random() * 4 + 2;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;

                // Random position
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;

                // Random animation duration between 10s and 20s
                const duration = Math.random() * 10 + 10;
                particle.style.animationDuration = `${duration}s`;

                // Random delay
                particle.style.animationDelay = `${Math.random() * 5}s`;

                // Set color
                particle.style.background = particleColor;

                particlesContainer.appendChild(particle);
            }
        }

        // $('input').on('input change blur', function(e) {
        //     if ($(this).val().trim() !== '') {
        //         $(this).attr('placeholder', '');
        //         if (e.type === 'blur') {
        //             $(this).focus(); // keep focus if not empty
        //         }
        //     }
        // });

        const inputs = document.querySelectorAll('.input-group input');

        inputs.forEach(input => {
            // Set placeholder to empty space if empty
            if (!input.value) {
                input.placeholder = ' ';
            }

            // Update label on input change
            input.addEventListener('input', function() {
                if (this.value) {
                    this.placeholder = ' ';
                } else {
                    this.placeholder = ' ';
                }
            });

            // Handle blur event
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.placeholder = ' ';
                }
            });
        });
        // Create initial particles
        createParticles();

        // Enhanced random grid pulse effect
        function createRandomPulse() {
            const pulse = document.createElement('div');
            pulse.style.position = 'fixed';
            pulse.style.width = `${Math.random() * 200 + 100}px`;
            pulse.style.height = `${Math.random() * 200 + 100}px`;
            pulse.style.borderRadius = '50%';

            pulse.style.background = `radial-gradient(circle,
                rgba(${Math.floor(Math.random() * 50 + 67)},
                     ${Math.floor(Math.random() * 50 + 97)},
                     238, ${Math.random() * 0.3 + 0.2}), transparent 70%)`;

            pulse.style.filter = `blur(${Math.random() * 20 + 15}px)`;
            pulse.style.left = `${Math.random() * 100}%`;
            pulse.style.top = `${Math.random() * 100}%`;
            pulse.style.transform = 'translate(-50%, -50%)';
            pulse.style.opacity = '0';
            pulse.style.transition = 'opacity 2s ease-out';
            pulse.style.zIndex = '0';
            pulse.style.pointerEvents = 'none';
            pulse.style.mixBlendMode = 'screen';

            document.body.appendChild(pulse);

            // Fade in
            setTimeout(() => {
                pulse.style.opacity = Math.random() * 0.3 + 0.2;
            }, 10);

            // Fade out and remove
            setTimeout(() => {
                pulse.style.opacity = '0';
                setTimeout(() => {
                    pulse.remove();
                }, 2000);
            }, 4000);

            // Schedule next pulse
            setTimeout(createRandomPulse, Math.random() * 5000 + 3000);
        }

        // Start initial pulses
        for (let i = 0; i < 3; i++) {
            setTimeout(createRandomPulse, i * 2000);
        }


        // ajax
        // Make sure CSRF token is sent with AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // $('#loginForm').on('submit', function(e) {
        //     e.preventDefault();

        //     let submitBtn = $(this).find('button[type="submit"]');
        //     submitBtn.prop('disabled', true).text('Signing in...');

        //     $.ajax({
        //         url: "{{ route('loginn') }}", // /signin
        //         method: "POST",
        //         data: $(this).serialize(),
        //         success: function(response) {
        //             if (response.success) {
        //                 submitBtn.prop('disabled', false).html('Login');
        //                 toastr.success('Login Successful', 'Welcome back to your account!');

        //                 window.location.href = response.redirect;
        //             } else if (response.success == false && response.status == 401) {
        //                 toastr.error('Login Failed', 'Invalid email or password');
        //             }


        //         },
        //         error: function(xhr) {
        //             if (xhr.status === 401) {
        //                 toastr.error('Login Failed', 'Invalid email or password');
        //             } else {
        //                 $('#loginMessage').html(`<p style="color:red;">Something went wrong</p>`);
        //             }
        //         },
        //         complete: function() {
        //             submitBtn.prop('disabled', false).text('Login');
        //         }
        //     });
        // });
        const toastr = new Toastr();

        // setTimeout(() => {
        //     toastr.success('Test Success', 'Toastr is working correctly!');
        // }, 1000);
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();

            const submitBtn = $('#loginButton');
            const btnText = submitBtn.find('.btn-text');

            // Disable button and show loading state
            submitBtn.prop('disabled', true);
            btnText.text('Signing in...');

            // Add loading class for visual effect
            submitBtn.addClass('btn-loading');

            $.ajax({
                url: "{{ route('loginn') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        toastr.success('Login Successful', 'Welcome back to your account!');
                        window.location.href = response.redirect;
                    } else if (response.success === false && response.status === 401) {
                        toastr.error('Login Failed', 'Invalid email or password');
                    }
                    resetButton();
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        toastr.error('Login Failed', 'Invalid email or password');
                    } else {
                        toastr.error('Error', 'Something went wrong. Please try again.');
                    }
                    resetButton();
                }
            });

            function resetButton() {
                submitBtn.prop('disabled', false);
                btnText.text('Sign In');
                submitBtn.removeClass('btn-loading');
            }
        });
    </script>
    {{-- <script></script> --}}
</body>

</html>
