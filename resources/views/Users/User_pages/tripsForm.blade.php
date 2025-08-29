@extends('Users.user_layout.userlayout')

@section('style')
    <!-- Select2 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/toastr.css">
    <style>
        :root {
            --dark-bg: #0a0a12;
            --neon-blue: #00f3ff;
            --neon-purple: #b300ff;
            --neon-pink: #ff00c1;
            --text-light: #f0f0f0;
            --text-dim: #a0a0a0;
            --glow-blue: 0 0 10px rgba(0, 243, 255, 0.8);
            --glow-purple: 0 0 10px rgba(179, 0, 255, 0.8);
            --glow-pink: 0 0 10px rgba(255, 0, 193, 0.8);
        }

        body {
            overflow-x: hidden !important;
        }

        /* Form Layout */
        .form-container {
            /* max-width: 1200px; */

            margin: 0 auto;
            padding: 0px 32px;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            flex: 1 1 calc(50% - 1.5rem);
            margin-bottom: 0;
            min-width: 0;
        }

        .form-group.full-width {
            flex: 1 1 100%;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--neon-blue);
            font-family: 'Orbitron', sans-serif;
            font-weight: 500;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        /* Input and Select Styles */
        .form-control,
        .select2-container--default .select2-selection--single {
            width: 100% !important;
            padding: 0.8rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(0, 243, 255, 0.2);
            border-radius: 8px;
            color: var(--text-light);
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .select2-container--default.select2-container--focus .select2-selection--single {
            outline: none;
            border-color: var(--neon-blue);
            box-shadow: 0 0 10px rgba(179, 0, 255, 0.3);
        }

        /* Select2 Specific Styles */
        .select2-container {
            width: 100% !important;
        }

        .select2-container--default .select2-selection--single {
            height: auto;
            padding: 0.6rem 1rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: var(--text-light);
            line-height: 1.5;
            padding-left: 0;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100%;
            right: 8px;
        }

        .select2-dropdown {
            background: rgba(10, 10, 18, 0.95);
            border: 1px solid rgba(0, 243, 255, 0.2);
            border-radius: 8px;
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(0, 243, 255, 0.2);
            color: var(--text-light);
            border-radius: 4px;
            padding: 6px;
        }

        /* Flag Styles */
        .img-flag {
            width: 20px;
            height: 15px;
            margin-right: 8px;
            vertical-align: middle;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 2px;
            object-fit: cover;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered,
        .select2-results__option {
            display: flex !important;
            align-items: center !important;
        }

        /* Textarea */
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 0.8rem;
            background: linear-gradient(90deg, var(--neon-blue), var(--neon-purple));
            color: var(--dark-bg);
            border: none;
            border-radius: 8px;
            font-family: 'Orbitron', sans-serif;
            font-weight: bold;
            font-size: 1rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(179, 0, 255, 0.4);
        }

        .plus-icon {
            transition: transform 0.3s ease;
        }

        .submit-btn:hover .plus-icon {
            transform: rotate(90deg);
        }

        /* Heading Styles */
        .neon-heading {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            position: relative;
            text-align: center;
            margin: 2rem 0 3rem;
            color: var(--neon-blue);
        }

        .neon-text {
            position: relative;
            z-index: 2;
            text-shadow: 0 0 10px var(--neon-blue),
                0 0 20px var(--neon-blue),
                0 0 30px var(--neon-blue);
            animation: neon-pulse 2s infinite alternate;
        }

        @keyframes neon-pulse {
            from {
                text-shadow: 0 0 10px var(--neon-blue),
                    0 0 20px var(--neon-blue),
                    0 0 30px var(--neon-blue);
            }

            to {
                text-shadow: 0 0 5px var(--neon-blue),
                    0 0 10px var(--neon-blue),
                    0 0 15px var(--neon-blue);
            }
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .form-group {
                flex: 1 1 100%;
            }

            .select2-container--open .select2-dropdown {
                width: 100% !important;
            }

            .neon-heading {
                font-size: 1.8rem;
                letter-spacing: 2px;
                margin: 1.5rem 0 2rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="form-container">
        <h2 class="neon-heading">
            <span class="neon-text">Add New Trip</span>
        </h2>

        <form id="tripForm">
            <div class="form-row">
                <div class="form-group">
                    <label for="trip-name">Trip Name</label>
                    <input name="trip_name" type="text" id="trip-name" class="form-control"
                        placeholder="Enter trip name">
                </div>

                <div class="form-group">
                    <label for="countrySelect">Select Destination</label>
                    <select name="destination" class="form-control select2" id="countrySelect">
                        <option value="" disabled selected>Select Country</option>
                        @foreach ($countryList as $code => $name)
                            @php
                                // Check if the country exists in the Currency mapping
                                $currencyCode = $Currency[$name] ?? '';
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

            <div class="form-row">
                <div class="form-group">
                    <label for="start-date">Start Date</label>
                    <input name="start_date" type="date" id="start-date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="end-date">End Date</label>
                    <input name="end_date" type="date" id="end-date" class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="trip-budget">Budget</label>
                    <input name="budget" type="number" id="trip-budget" class="form-control">
                </div>

                <div class="form-group">
                    <label for="trip-currency">Currency</label>
                    <input name="currency" type="text" id="trip-currency" class="form-control" readonly value="">
                </div>
            </div>

            <div class="form-group full-width">
                <label name="description" for="trip-description">Description</label>
                <textarea id="trip-description" class="form-control" placeholder="Tell us about this trip..." rows="5"></textarea>
            </div>

            <button type="submit" class="submit-btn">
                <svg class="plus-icon" viewBox="0 0 24 24" width="20" height="20">
                    <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                </svg>
                Add Trip
            </button>
        </form>
    </div>
@endsection

@section('bottomScriptsCustom')
    <!-- jQuery CDN (required for Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Select2 JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="assets/js/toastr.js"></script>

    <script>
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
                $('#trip-currency').val(currencyCode);
            });
        });

        $(document).ready(function() {
            const today = new Date().toISOString().split('T')[0];
            $('#start-date, #end-date').attr('min', today);
        });


        // ajax of trips
        const toastr = new Toastr();
        $(document).ready(function() {
            $('#tripForm').on('submit', function(e) {
                e.preventDefault();

                let form = $(this);
                let formData = form.serialize();

                $.ajax({
                    url: "{{ route('tripstore') }}",
                    method: "POST",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        form.find('button[type="submit"]').prop('disabled', true).text(
                            'Saving...');
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success('Success', response.message);
                            form[0].reset();
                        }
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = "Something went wrong!";
                        if (errors) {
                            errorMessage = Object.values(errors).map(err => err[0]).join(
                                '<br>');
                        }
                        toastr.error('Error', errorMessage);
                    },
                    complete: function() {
                        form.find('button[type="submit"]').prop('disabled', false).text(
                            'Create Trip');
                    }
                });
            });

            // function showToast(toastId, message) {
            //     let toastEl = $(toastId);
            //     toastEl.find('.toast-body').html(message);
            //     let toast = new bootstrap.Toast(toastEl[0]);
            //     toast.show();
            // }
        });
    </script>
@endsection
