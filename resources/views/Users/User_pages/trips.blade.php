@extends('Users.user_layout.userlayout')

@section('style')
    <style>
        /* Trip Cards Container */
        .trip-cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 2rem;
            width: 100%;
            /* max-width: 1400px; */
            /* Adjust this value as needed */
            margin: 0 auto;
            /* justify-items: baseline; */
            /* Centers the grid items horizontally */
        }


        /* Individual Trip Card */
        .trip-card {
            /* max-width: 33%; */
            background: var(--dark-2);
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid var(--primary);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            position: relative;
            transform: translateY(50px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            flex-direction: column;
        }

        .trip-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px var(--primary),
                0 15px 35px rgba(67, 97, 238, 0.3),
                0 20px 45px rgba(67, 97, 238, 0.2);
            border-color: var(--primary-light);
        }

        /* Trip Image */
        .trip-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .trip-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
            filter: brightness(0.8);
        }

        .trip-card:hover .trip-image img {
            transform: scale(1.05);
            filter: brightness(1);
        }

        .trip-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, transparent 60%, var(--dark-2)));
        }

        /* Trip Content */
        .trip-content {
            padding: 1.5rem;
        }

        .trip-title {
            color: var(--primary-light);
            margin-bottom: 1rem;
            font-size: 1.3rem;
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 1px;
        }

        .trip-description {
            color: var(--text-light);
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* Trip Button */
        .trip-button {
            text-decoration: none;
            background: transparent;
            color: var(--primary-light);
            padding: 0.6rem 1.5rem;
            border: 1px solid var(--primary-light);
            border-radius: 30px;
            font-family: 'Orbitron', sans-serif;
            font-weight: 500;
            font-size: 0.9rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
        }

        .trip-button:hover {
            background: rgba(76, 201, 240, 0.1);
            box-shadow: 0 0 15px rgba(76, 201, 240, 0.4);
            transform: translateY(-3px);
            color: var(--light);
        }

        .trip-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(76, 201, 240, 0.3), transparent);
            transition: 0.5s;
        }

        .trip-button:hover::before {
            left: 100%;
        }

        /* Animation for cards */
        .trip-card:nth-child(1) {
            animation: fadeInUp 0.6s ease forwards 0.2s;
        }

        .trip-card:nth-child(2) {
            animation: fadeInUp 0.6s ease forwards 0.4s;
        }

        .trip-card:nth-child(3) {
            animation: fadeInUp 0.6s ease forwards 0.6s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 1;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .trip-cards-container {
                grid-template-columns: 1fr;
                padding: 2rem;
            }

            .trip-card {
                max-width: 100%;
            }
        }

        /* Button design */
        .add-trip-btn {
            background: transparent;
            color: var(--primary-light);
            padding: 0.8rem 1.8rem;
            border: 1px solid var(--primary-light);
            border-radius: 30px;
            font-family: 'Orbitron', sans-serif;
            font-weight: 500;
            font-size: 1rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            /* margin: 1rem auto; */
            box-shadow: 0 0 10px rgba(76, 201, 240, 0.3);
            text-decoration: none;
            /* width: 20%; */
            /* float: right; */
        }

        .add-trip-btn:hover {
            background: rgba(76, 201, 240, 0.1);
            box-shadow: 0 0 20px rgba(76, 201, 240, 0.6);
            transform: translateY(-3px);
            color: var(--light);
        }

        .add-trip-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(76, 201, 240, 0.3), transparent);
            transition: 0.5s;
        }

        .add-trip-btn:hover::before {
            left: 100%;
        }

        .plus-icon {
            transition: transform 0.3s ease;
        }

        .add-trip-btn:hover .plus-icon {
            transform: rotate(90deg);
        }

        /* heading  */
        .neon-heading {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            position: relative;
            text-align: center;
            margin: 2rem 0 3rem;
            color: var(--primary-light);
        }

        .neon-text {
            position: relative;
            z-index: 2;
            text-shadow: 0 0 10px var(--primary),
                0 0 20px var(--primary),
                0 0 30px var(--primary);
            animation: neon-pulse 2s infinite alternate;
        }

        @media (max-width: 768px) {
            .neon-heading {
                font-size: 1.8rem;
                letter-spacing: 2px;
                margin: 1.5rem 0 2rem;
            }

            .neon-glow {
                filter: blur(15px);
            }
        }

        .haadingbutton {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 0 32px;
        }
    </style>
@endsection

@section('content')
    <div class="haadingbutton">
        <h2 class="neon-heading">
            <span class="neon-text">Trips</span>
            <span class="neon-glow"></span>
        </h2>
        <!-- Add this to your HTML where you want the button -->
        <a href="{{ route('viewFormTrip') }}" class="add-trip-btn">
            <svg class="plus-icon" viewBox="0 0 24 24" width="20" height="20">
                <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
            </svg>
            Add Trip
        </a>
    </div>

    <div class="trip-cards-container">
        <!-- Trip Card 1 -->
        @foreach ($trips as $trip)
            <div class="trip-card">
                <div class="trip-image">
                    <img src="{{ asset('assets/img/' . $trip['trip_image']) . '.jpeg' }} " alt="Mountain Adventure">
                    <div class="trip-overlay"></div>
                </div>

                <div class="trip-content">
                    <h3 class="trip-title">{{ $trip['trip_name'] }}</h3>
                    <p class="trip-description">
                        {{ $trip['description'] ? $trip['description'] : 'No Description has been added' }} </p>
                    <a class="trip-button" href="{{ route('myttrip', ['id' => $trip['trip_id']]) }}">View Details</a>

                </div>
            </div>
        @endforeach


        <!-- Trip Card 2 -->
        {{-- <div class="trip-card">
            <div class="trip-image">
                <img src="https://images.unsplash.com/photo-1465447142348-e9952c393450?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Beach Getaway">
                <div class="trip-overlay"></div>
            </div>
            <div class="trip-content">
                <h3 class="trip-title">Tropical Paradise</h3>
                <p class="trip-description">Relax on pristine beaches with crystal clear waters. All-inclusive 7-day luxury
                    package.</p>
                <button class="trip-button">View Details</button>
            </div>
        </div> --}}

        <!-- Trip Card 3 -->
        {{-- <div class="trip-card">
            <div class="trip-image">
                <img src="https://images.unsplash.com/photo-1557296869-e9a76501a0d1?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="City Tour">
                <div class="trip-overlay"></div>
            </div>
            <div class="trip-content">
                <h3 class="trip-title">Urban Explorer</h3>
                <p class="trip-description">Discover hidden gems in bustling metropolises. 3-day guided tour with local
                    experts.</p>
                <button class="trip-button">View Details</button>
            </div>
        </div> --}}
    </div>
@endsection

@section('bottomScriptsCustom')
@endsection
