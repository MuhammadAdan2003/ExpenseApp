<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Expense Tracker | Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/toastr.css">
</head>

<body>
    <!-- Enhanced Neon Grid Background -->
    <div class="neon-grid"></div>

    <!-- Enhanced Mouse Follower Effect -->
    <div class="mouse-follower" id="mouseFollower"></div>

    <!-- Floating Particles -->
    <div id="particles"></div>

    <div class="container col-8">
        <div class="logo">
            <h2>Expense Tracker</h2>
            <p>Create your account</p>
        </div>

        <form id="signupForm">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" id="fName" required name="fname" placeholder=" ">
                        <label for="fName">First Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" id="lName" required name="lname" placeholder=" ">
                        <label for="lName">Last Name</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group">
                        <input type="email" id="email" required name="email" placeholder=" ">
                        <label for="email">Email Address</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group">
                        <input type="password" id="password" required name="password" placeholder=" ">
                        <label for="password">Password</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group">
                        <input type="password" id="confirmPassword" required name="password_confirmation"
                            placeholder=" ">
                        <label for="confirmPassword">Confirm Password</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group">
                        <select class="form-control select2" id="countrySelect" name="country">
                            <option value="" disabled selected>Select Country</option>
                            @foreach ($countryList as $code => $name)
                                @php
                                    // Find the matching currency for this country
                                    $currencyCode = '';
                                    foreach ($Currency as $country => $curr) {
                                        if (str_contains($country, explode(' ', $name)[0])) {
                                            $currencyCode = $curr;
                                            break;
                                        }
                                    }
                                @endphp
                                <option value="{{ $name }}"
                                    data-flag="https://flagcdn.com/16x12/{{ strtolower($code) }}.png"
                                    data-currency="{{ $currencyCode }}">
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group">
                        <input name="user_currency" type="text" id="user_currency" readonly value="">
                        <label for="user_currency">Currency</label>
                    </div>
                </div>


                <div class="col-6">
                    <div class="image-upload">
                        <label>Profile Picture</label>
                        <div class="image-upload-container">
                            <div class="image-preview" id="imagePreview">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="upload-btn">
                                <input type="file" id="profileImage" accept="image/*" name="image">
                                <label for="profileImage">Choose Image</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn" id="submitButton">
                        <span class="btn-text">Create Account</span>
                    </button>
                </div>

                <div class="col-12">
                    <div class="login-link">
                        Already have an account? <a href="{{ route('showLogin') }}">Sign in</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="assets/js/toastr.js"></script>
    <script>
        // Initialize Toastr
        const toastr = new Toastr();

        $(document).ready(function() {
            // Initialize Select2 with flag support
            $('#countrySelect').select2({
                theme: 'default',
                width: '100%',
                templateResult: formatCountry,
                templateSelection: formatCountry,
                escapeMarkup: function(m) {
                    return m;
                }
            });

            function formatCountry(option) {
                if (!option.id) return option.text;

                var $option = $(
                    '<span>' +
                    (option.element && $(option.element).data('flag') ?
                        '<img src="' + $(option.element).data('flag') + '" class="img-flag" /> ' :
                        '') +
                    option.text +
                    '</span>'
                );
                return $option;
            }

            // Update currency when country changes
            $('#countrySelect').on('change', function() {
                const selectedOption = $(this).find('option:selected');
                const currencyCode = selectedOption.data('currency') || '';
                $('#user_currency').val(currencyCode);
            });
        });

        $(document).ready(function() {
            const today = new Date().toISOString().split('T')[0];
            $('#start-date, #end-date').attr('min', today);
        });

        // Floating labels functionality
        document.querySelectorAll('.input-group input').forEach(input => {
            input.addEventListener('input', function() {
                this.setAttribute('placeholder', ' ');
            });

            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.setAttribute('placeholder', ' ');
                }
            });
        });

        // Image upload preview
        document.getElementById('profileImage').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').innerHTML =
                        `<img src="${e.target.result}" alt="Profile Preview">`;
                }
                reader.readAsDataURL(file);
            }
        });

        // Form submission
        $('#signupForm').on('submit', function(e) {
            e.preventDefault();

            const submitBtn = $('#submitButton');
            const btnText = submitBtn.find('.btn-text');

            // Disable button and show loading state
            submitBtn.prop('disabled', true);
            btnText.html(
                'Creating Account <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
            );

            // Create FormData object
            const formData = new FormData(this);

            $.ajax({
                url: "{{ route('signup') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success('Success', response.message);
                        // Redirect after 2 seconds
                        setTimeout(() => {
                            window.location.href = response.redirect;
                        }, 2000);
                    } else {
                        toastr.success('Success', response.message);
                        setTimeout(() => {
                            window.location.href = response.redirect;
                        }, 2000);
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        // Validation errors
                        const errors = xhr.responseJSON.errors;
                        for (const field in errors) {
                            toastr.error('Error', errors[field][0]);
                        }
                    } else {
                        toastr.error('Error', 'Something went wrong. Please try again.');
                    }
                },
                complete: function() {
                    submitBtn.prop('disabled', false);
                    btnText.text('Create Account');
                }
            });
        });

        // Mouse follower effect
        const mouseFollower = document.getElementById('mouseFollower');
        let mouseX = 0,
            mouseY = 0,
            followerX = 0,
            followerY = 0;
        let isMouseMoving = false,
            mouseStopTimeout;

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
            followerX += (mouseX - followerX) * 0.1;
            followerY += (mouseY - followerY) * 0.1;
            mouseFollower.style.left = `${followerX}px`;
            mouseFollower.style.top = `${followerY}px`;
            if (isMouseMoving) requestAnimationFrame(updateFollowerPosition);
        }

        // Create floating particles
        function createParticles() {
            const container = document.getElementById('particles');
            container.innerHTML = '';

            for (let i = 0; i < 30; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.cssText = `
                    width: ${Math.random() * 4 + 2}px;
                    height: ${Math.random() * 4 + 2}px;
                    left: ${Math.random() * 100}%;
                    top: ${Math.random() * 100}%;
                    animation-duration: ${Math.random() * 10 + 10}s;
                    animation-delay: ${Math.random() * 5}s;
                    background: rgba(76, 201, 240, 0.5);
                `;
                container.appendChild(particle);
            }
        }

        // Initial setup
        createParticles();
    </script>
</body>

</html>
