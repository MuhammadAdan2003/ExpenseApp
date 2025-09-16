@extends('Users.user_layout.userlayout')

@section('style')
    {{-- <link rel="stylesheet" href="assets/css/toastr.css"> --}}

    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4cc9f0;
            --primary-dark: #3f37c9;
            --secondary: #7209b7;
            --accent: #f72585;
            --light: #f8f9fa;
            --dark: #121212;
            --dark-2: #1e1e1e;
            --dark-3: #2d2d2d;
            --text-light: #e1e1e1;
            --text-dark: #333;
            --success: #4bb543;
            --error: #ff4757;

            /* Enhanced Neon Glow Variables */
            --neon-glow: 0 0 15px rgba(67, 97, 238, 0.8),
                0 0 30px rgba(67, 97, 238, 0.6),
                0 0 45px rgba(67, 97, 238, 0.4),
                0 0 60px rgba(67, 97, 238, 0.2);

            --neon-glow-accent: 0 0 10px rgba(247, 37, 133, 0.8),
                0 0 20px rgba(247, 37, 133, 0.6),
                0 0 30px rgba(247, 37, 133, 0.4);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
        }

        body {
            background-color: var(--dark);
            color: var(--text-light);
            line-height: 1.6;
            padding: 0;
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        header {
            /* background: linear-gradient(to right, var(--dark-2), var(--dark-3)); */
            padding: 1.5rem 2rem;
            /* box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); */
            /* position: sticky; */
            /* top: 0; */
            z-index: 100;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .trip-hero {
            position: relative;
            height: 400px;
            overflow: hidden;
            border-radius: 10px;
            margin: 2rem 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        .trip-hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .trip-hero:hover img {
            transform: scale(1.05);
        }

        .trip-title {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            padding: 2rem;
            color: white;
        }

        .trip-title h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            color: var(--primary-light);
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.8);
        }

        .trip-title p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .trip-details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }

        .detail-card {
            background: linear-gradient(145deg, var(--dark-2), var(--dark-3));
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .detail-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--neon-glow);
        }

        .detail-card h3 {
            color: var(--primary);
            margin-bottom: 1rem;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .detail-content {
            font-size: 1.1rem;
        }

        .budget-display {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--primary-light);
            margin: 1rem 0;
            text-shadow: 0 0 10px rgba(76, 201, 240, 0.5);
        }

        .description-card {
            grid-column: 1 / -1;
            background: linear-gradient(145deg, var(--dark-2), var(--dark-3));
            border-radius: 10px;
            padding: 2rem;
            margin: 2rem 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .description-card h3 {
            color: var(--primary);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .description-text {
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin: 2rem 0;
            flex-wrap: wrap;
        }

        .action-btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .primary-btn {
            background: var(--primary);
            color: white;
        }

        .primary-btn:hover {
            background: var(--primary-dark);
            box-shadow: var(--neon-glow);
        }

        .secondary-btn {
            background: transparent;
            color: var(--text-light);
            border: 1px solid var(--primary);
        }

        .secondary-btn:hover {
            background: var(--primary);
            color: white;
        }

        .accent-btn {
            background: var(--accent);
            color: white;
        }

        .accent-btn:hover {
            box-shadow: var(--neon-glow-accent);
        }

        @media (max-width: 768px) {
            .trip-details-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-btn {
                width: 100%;
                justify-content: center;
            }

            .trip-title h1 {
                font-size: 2rem;
            }
        }

        /* Expense Section Styles */
        .expense-section {
            background: linear-gradient(145deg, var(--dark-2), var(--dark-3));
            border-radius: 10px;
            padding: 2rem;
            margin: 2rem 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .section-title {
            color: var(--primary);
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .add-expense-btn {
            background: var(--success);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .add-expense-btn:hover {
            opacity: 0.9;
            box-shadow: 0 0 15px rgba(75, 181, 67, 0.6);
        }

        .expense-table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
        }

        .expense-table th,
        .expense-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--dark-3);
        }

        .expense-table th {
            background-color: var(--primary-dark);
            color: white;
            font-weight: 600;
        }

        .expense-table tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .expense-table tr:hover {
            background-color: rgba(67, 97, 238, 0.1);
        }

        .action-cell {
            display: flex;
            gap: 0.5rem;
        }

        .edit-btn,
        .delete-btn {
            background: transparent;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .edit-btn {
            color: var(--primary);
        }

        .edit-btn:hover {
            color: var(--primary-light);
        }

        .delete-btn {
            color: var(--error);
        }

        .delete-btn:hover {
            color: #ff2e4d;
        }

        .expense-summary {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 2px solid var(--dark-3);
            font-size: 1.2rem;
        }

        .total-expenses {
            color: var(--primary-light);
            font-weight: bold;
        }

        .remaining-budget {
            color: var(--success);
            font-weight: bold;
        }

        /* Modal Styles */
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.85);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background: var(--dark-2);
            border-radius: 12px;
            padding: 2rem;
            width: 90%;
            max-width: 500px;
            box-shadow: var(--neon-glow), 0 0 50px rgba(0, 0, 0, 0.8);
            border: 1px solid var(--neon-glow);
            animation: pulse 2s infinite alternate;
        }

        @keyframes pulse {
            0% {
                box-shadow: var(--neon-glow), 0 0 50px rgba(0, 0, 0, 0.8);
            }

            100% {
                box-shadow: 0 0 20px rgba(67, 97, 238, 0.8),
                    0 0 30px rgba(67, 97, 238, 0.6),
                    0 0 45px rgba(67, 97, 238, 0.4),
                    0 0 60px rgba(67, 97, 238, 0.2);
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--primary);
        }

        .modal-title {
            color: var(--primary-light);
            font-size: 1.8rem;
            font-weight: 700;
            text-shadow: 0 0 10px var(--primary-light),
                0 0 20px var(--primary-light),
                0 0 30px var(--primary);
        }

        .close-btn {
            background: transparent;
            border: none;
            color: var(--text-light);
            font-size: 2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-shadow: 0 0 5px var(--accent);
        }

        .close-btn:hover {
            color: var(--accent);
            text-shadow: 0 0 10px var(--accent),
                0 0 20px var(--accent);
            transform: scale(1.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.8rem;
            color: var(--primary-light);
            font-weight: 600;
            text-shadow: 0 0 5px var(--primary);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 1rem;
            border-radius: 8px;
            border: 2px solid var(--primary);
            background-color: var(--dark-3);
            color: var(--text-light);
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(67, 97, 238, 0.3);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 0 15px var(--primary-light);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
        }

        .action-btn {
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .primary-btn {
            background: var(--primary);
            color: white;
            box-shadow: 0 0 10px var(--primary),
                0 0 20px rgba(67, 97, 238, 0.5);
        }

        .primary-btn:hover {
            background: var(--primary-light);
            box-shadow: 0 0 15px var(--primary-light),
                0 0 25px rgba(76, 201, 240, 0.7);
            transform: translateY(-2px);
        }

        .secondary-btn {
            background: transparent;
            color: var(--text-light);
            border: 2px solid var(--secondary);
            box-shadow: 0 0 10px var(--secondary);
        }

        .secondary-btn:hover {
            background: var(--secondary);
            box-shadow: 0 0 15px var(--secondary),
                0 0 25px rgba(114, 9, 183, 0.7);
            transform: translateY(-2px);
        }

        /* Expense Section Styles */
        .expense-section {
            margin-top: 3rem;
            padding: 2rem;
            background: var(--dark-2);
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(67, 97, 238, 0.3);
            border: 1px solid var(--primary);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--primary);
        }

        .section-title {
            color: var(--primary-light);
            font-size: 1.8rem;
            font-weight: 700;
            text-shadow: 0 0 10px var(--primary);
        }

        .section-title i {
            margin-right: 10px;
            color: var(--accent);
            text-shadow: 0 0 10px var(--accent);
        }

        .add-expense-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .add-expense-btn:hover {
            background: var(--primary-light);
            box-shadow: 0 0 15px var(--primary-light),
                0 0 25px rgba(76, 201, 240, 0.7);
            transform: translateY(-2px);
        }

        /* Expense Table Styles */
        .expense-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(67, 97, 238, 0.3);
        }

        .expense-table th {
            background: var(--primary-dark);
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            text-shadow: 0 0 5px var(--primary-light);
            border-bottom: 2px solid var(--primary);
        }

        .expense-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--dark-3);
            background: var(--dark-2);
        }

        .expense-table tr:hover td {
            background: var(--dark-3);
        }

        .expense-table tr:last-child td {
            border-bottom: none;
        }

        .action-cell {
            display: flex;
            gap: 0.5rem;
        }

        .edit-btn,
        .delete-btn {
            padding: 0.5rem;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            background: transparent;
        }

        .edit-btn {
            color: var(--primary-light);
        }

        .edit-btn:hover {
            color: var(--primary);
            text-shadow: 0 0 10px var(--primary);
            transform: scale(1.1);
        }

        .delete-btn {
            color: var(--accent);
        }

        .delete-btn:hover {
            color: var(--error);
            text-shadow: 0 0 10px var(--error);
            transform: scale(1.1);
        }

        /* Expense Summary Styles */
        .expense-summary {
            display: flex;
            justify-content: space-between;
            padding: 1.5rem;
            background: var(--dark-3);
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(67, 97, 238, 0.2);
            border: 1px solid var(--primary);
        }

        .total-expenses,
        .remaining-budget {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .total-expenses {
            color: var(--accent);
            text-shadow: 0 0 5px var(--accent);
        }

        .remaining-budget {
            color: var(--primary-light);
            text-shadow: 0 0 5px var(--primary-light);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .expense-summary {
                flex-direction: column;
                gap: 1rem;
            }

            .expense-table {
                display: block;
                overflow-x: auto;
            }

            .form-actions {
                flex-direction: column;
            }

            .action-btn {
                width: 100%;
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

        /* ============= NEW MODAL CSS ===========  */
    </style>
@endsection

@section('content')
    {{-- <header>
        <div class="header-content">
        <h2 class="logo">Trip Details</h2>
        <button class="back-btn">← Back to Trips</button>
        </div>
    </header> --}}
    <div class="haadingbutton">
        <h2 class="neon-heading">
            <span class="neon-text">Trip Details</span>
            <span class="neon-glow"></span>
        </h2>
        <!-- Add this to your HTML where you want the button -->
        <button id="addExpenseBtn" class="add-trip-btn">
            <svg class="plus-icon" viewBox="0 0 24 24" width="20" height="20">
                <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
            </svg>
            Add Expense
        </button>
    </div>


    <div class="container">
        <div class="trip-hero">
            <img src="{{ asset('assets/img/' . $trip->trip_image) . '.jpeg' }}" alt="Mountain Landscape">
            <div class="trip-title">
                <h1>{{ $trip->trip_name }}</h1>
                <p>An adventure of a lifetime in the Swiss Alps</p>
            </div>
        </div>

        <div class="trip-details-grid">
            <div class="detail-card">
                <h3>📍 Country</h3>
                <div class="detail-content">
                    <p>{{ $trip->destination }}</p>
                </div>
            </div>

            <div class="detail-card">
                <h3>📅 Start Date</h3>
                <div class="detail-content">
                    <p>{{ $trip->start_date }}</p>
                </div>
            </div>

            <div class="detail-card">
                <h3>📅 End Date</h3>
                <div class="detail-content">
                    <p>{{ $trip->end_date }}</p>
                </div>
            </div>

            <div class="detail-card">
                <h3>💰 Budget in {{ Auth::user()->user_currency }}</h3>
                <div class="detail-content">
                    <div class="budget-display">{{ $trip->budget . ' ' . Auth::user()->user_currency }}</div>
                    {{-- <p>Total budget for this local</p> --}}
                </div>
            </div>
            <div class="detail-card">
                <h3>💰 Budget in {{ $trip->currency }}</h3>
                <div class="detail-content">
                    <div id="converted" class="budget-display converted">
                        {{ $trip->budget . ' ' . Auth::user()->user_currency }}</div>
                    {{-- <p>Total budget for this trip</p> --}}
                </div>
            </div>
            <div class="detail-card">
                <h3>💰 Remaining budget</h3>
                <div class="detail-content">
                    <div id="changeRemain" class="budget-display">{{ $trip->budget . ' ' . Auth::user()->user_currency }}
                    </div>
                </div>
                <div class="detail-content">
                    <div id="newRemain" class="budget-display"></div>
                </div>
            </div>
        </div>
        <!-- Expense Section -->
        <div class="expense-section">
            <div class="section-header">
                <h3 class="section-title" style="text-align: center;"><i class="fas fa-receipt"></i> Expenses </h3>
                {{-- <button class="add-expense-btn" id="addExpenseBtn">
                    <i class="fas fa-plus"></i> Add Expense
                </button> --}}
            </div>

            <table class="expense-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="expenseTableBody">
                    <tr id="loaderRow">
                        <td colspan="5" class="text-center">
                            Loading...
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="expense-summary">
                <div class="total-expenses">
                    {{-- Total Expenses: <span id="totalExpenses">$0.00</span> --}}

                </div>
                <div class="remaining-budget">
                    {{-- Remaining Budget: <span id="remainingBudget">$2,500.00</span> --}}
                </div>
            </div>
        </div>

        <div class="description-card">
            <h3>📝 Description</h3>
            <div class="description-text">
                <p>This exciting mountain expedition will take us through the breathtaking landscapes of the Swiss Alps.
                    We'll be hiking through picturesque trails, exploring charming alpine villages, and experiencing the
                    unique culture of Switzerland.</p>
                <br>
                <p>Our journey begins in Zurich, where we'll meet our guide and fellow adventurers. From there, we'll travel
                    to Interlaken, the adventure capital of Switzerland, where we'll prepare for our trek. The main
                    highlight will be the 4-day hike through the Jungfrau region, with overnight stays in mountain huts and
                    hotels.</p>
                <br>
                <p>We'll have opportunities for optional activities like paragliding, mountain biking, and traditional Swiss
                    cheese tasting. The trip is suitable for individuals with good physical fitness as we'll be hiking 5-7
                    hours daily at high altitudes.</p>
            </div>
        </div>

        <div class="action-buttons">
            <button class="action-btn primary-btn">Edit Trip Details</button>
            <button class="action-btn secondary-btn">Share This Trip</button>
            <button class="action-btn accent-btn">Export as PDF</button>
        </div>
    </div>

    {{-- expense --}}

    <!-- Add/Edit Expense Modal -->
    <div class="modal" id="expenseModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Add Expense</h3>
                <button class="close-btn" id="closeModal">&times;</button>
            </div>
            <form id="expenseForm">
                <input type="hidden" id="expenseId">
                <div class="form-group">
                    <label for="expenseDate">Date</label>
                    <input name="expense_date" type="date" id="expenseDate" required>
                </div>
                <div class="form-group">
                    <label for="expenseCategory">Category</label>
                    <select name="category" id="expenseCategory" required>
                        <option value="">Select Category</option>
                        <option value="Accommodation">Accommodation</option>
                        <option value="Transportation">Transportation</option>
                        <option value="Food">Food</option>
                        <option value="Activities">Activities</option>
                        <option value="Shopping">Shopping</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="expenseDescription">Description</label>
                    <input name="notes" type="text" id="expenseDescription" required>
                </div>
                <div class="form-group">
                    <label for="expenseAmount">Amount in {{ $trip->currency }}</label>
                    <input name="amount" type="number" id="expenseAmount" min="0" step="0.01" required>
                </div>
                <input type="hidden" value="{{ $trip->trip_id }}" name="trip_id">
                <div class="form-actions">
                    <button type="button" class="action-btn secondary-btn" id="cancelExpense">Cancel</button>
                    <button type="submit" id="saveExp" class="action-btn primary-btn">Add Expense</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Delete modal  --}}
    <!-- Delete Confirmation Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Confirm Deletion</h3>
                <button class="close-btn" id="closeDeleteModal">&times;</button>
            </div>
            <div class="delete-modal-content">
                <div class="delete-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <p class="delete-message">Are you sure you want to delete this expense? This action cannot be undone.</p>
                <div class="form-actions">
                    <button type="button" class="action-btn secondary-btn" id="cancelDelete">Cancel</button>
                    <button type="button" class="action-btn danger-btn" id="confirmDelete">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('bottomScriptsCustom')
    {{-- <script src="assets/js/toastr.js"></script> --}}
    <script>
        const toastr = new Toastr();

        // DOM elements
        const expenseTableBody = document.getElementById('expenseTableBody');
        const totalExpensesElement = document.getElementById('totalExpenses');
        const remainingBudgetElement = document.getElementById('remainingBudget');
        const addExpenseBtn = document.getElementById('addExpenseBtn');
        const expenseModal = document.getElementById('expenseModal');
        const closeModal = document.getElementById('closeModal');
        const cancelExpense = document.getElementById('cancelExpense');
        const expenseForm = document.getElementById('expenseForm');
        const modalTitle = document.getElementById('modalTitle');
        const expenseId = document.getElementById('expenseId');
        const expenseDate = document.getElementById('expenseDate');
        const expenseCategory = document.getElementById('expenseCategory');
        const expenseDescription = document.getElementById('expenseDescription');
        const expenseAmount = document.getElementById('expenseAmount');

        // Constants
        const TOTAL_BUDGET = 2500;

        // Format currency
        function formatCurrency(amount) {
            return new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD'
            }).format(amount);
        }
        
        // load expense with api 
        function loadExpenses() {
            const expenseTableBody = $("#expenseTableBody");
            let tripID = "{{ $trip->trip_id }}"; // Blade variable

            // Show loader row inside tbody
            expenseTableBody.html(`
        <tr>
            <td colspan="5" class="text-center">Loading...</td>
        </tr>
    `);

            $.ajax({
                url: "/getExp/" + tripID, // ✅ trip_id pass in URL
                type: "GET",
                success: function(data) {
                    expenseTableBody.empty(); // clear loader
                    let total = data.expenses.reduce((sum, exp) => Number(sum) + Number(exp.amount), 0);
                    //    console.log( "total" + " " + total);
                    $('.total-expenses').text(`Total Expenses Amount: ${total} {{ $trip->currency }} `);
                    $('.remaining-budget').text("Remaining Budget: " + " " + data.remaining_budget + " " +
                        "{{ $trip->currency }}")

                    $('#newRemain').text(data.remaining_budget + " " + "{{ $trip->currency }}");



        const tripCurrency = "{{ $trip->currency }}"; // e.g., "INR"
        const userCurrency = "{{ Auth::user()->user_currency }}"; // e.g., "USD"
        const budget = "{{ $trip->budget }}"
        // Fetch exchange rates based on USD as base
         fetch('https://open.er-api.com/v6/latest/' + tripCurrency)
                .then(response => response.json())
                .then(rateData => {
                    const rates = rateData.rates;
                    if (tripCurrency === userCurrency) {
                        $('#changeRemain').text(
                            `Remaining Budget (Your Currency): ${data.remaining_budget} ${userCurrency}`
                        );
                    } else {
                        const rate = rates[userCurrency];
                        if (rate) {
                            const convertedRemaining = (data.remaining_budget * rate).toFixed(0);
                            $('#changeRemain').text(
                                `${convertedRemaining} ${userCurrency}`
                            );
                        } else {
                            $('.remaining-budget-converted').text("Conversion rate not available");
                        }
                    }
                });








                    if (data.success && data.expenses.length > 0) {
                        data.expenses.reverse().forEach(function(expense) {
                            let row = `
                        <tr>
                            <td>${new Date(expense.expense_date).toLocaleDateString()}</td>
                            <td>${expense.category}</td>
                            <td>${expense.notes ?? '-'}</td>
                            <td>${Number(expense.amount).toFixed(2)}</td>
                            <td class="action-cell">
                                <button class="edit-btn" data-id="${expense.expense_id}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="delete-btn" id="demoButton" data-id="${expense.expense_id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `;
                            expenseTableBody.append(row);
                        });
                    } else {
                        expenseTableBody.html(
                            '<tr><td colspan="5" class="text-center">No expenses found</td></tr>');
                    }
                },
                error: function() {
                    expenseTableBody.html(
                        '<tr><td colspan="5" class="text-center text-danger">Error loading expenses</td></tr>'
                        );
                }
            });
        }

        // ✅ Call on page load
        $(document).ready(function() {
            loadExpenses();
        });

        // Open modal for adding new expense
        function openAddModal() {
            modalTitle.textContent = 'Add Expense';
            expenseForm.reset();
            expenseId.value = '';
            expenseModal.style.display = 'flex';
        }

        // Open modal for editing existing expense
        function editExpense(id) {
            const expense = expenses.find(exp => exp.id === id);

            if (expense) {
                modalTitle.textContent = 'Edit Expense';
                expenseId.value = expense.id;
                expenseDate.value = expense.date;
                expenseCategory.value = expense.category;
                expenseDescription.value = expense.description;
                expenseAmount.value = expense.amount;

                expenseModal.style.display = 'flex';
            }
        }

        // Delete an expense
        function deleteExpense(id) {
            if (confirm('Are you sure you want to delete this expense?')) {
                expenses = expenses.filter(exp => exp.id !== id);
                // renderExpenses();
            }
        }

        // Save expense (add or update)
        function saveExpense(e) {
            e.preventDefault();

            const expenseData = {
                date: expenseDate.value,
                category: expenseCategory.value,
                description: expenseDescription.value,
                amount: parseFloat(expenseAmount.value)
            };

            if (expenseId.value) {
                // Update existing expense
                const id = parseInt(expenseId.value);
                const index = expenses.findIndex(exp => exp.id === id);

                if (index !== -1) {
                    expenses[index] = {
                        id,
                        ...expenseData
                    };
                }
            } else {
                // Add new expense
                const newId = expenses.length > 0 ? Math.max(...expenses.map(exp => exp.id)) + 1 : 1;
                expenses.push({
                    id: newId,
                    ...expenseData
                });
            }

            // renderExpenses();
            expenseModal.style.display = 'none';
        }

        // Event listeners
        addExpenseBtn.addEventListener('click', openAddModal);
        closeModal.addEventListener('click', () => expenseModal.style.display = 'none');
        cancelExpense.addEventListener('click', () => expenseModal.style.display = 'none');
        expenseForm.addEventListener('submit', saveExpense);

        // Close modal when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === expenseModal) {
                expenseModal.style.display = 'none';
            }
        });

        // Initialize the page
        document.addEventListener('DOMContentLoaded', () => {
            // renderExpenses();

            // Set today's date as default for new expenses
            const today = new Date().toISOString().split('T')[0];
            expenseDate.value = today;
        });

        // Back button functionality
        document.querySelector('.back-btn').addEventListener('click', function() {
            alert('Navigating back to your trips list');
        });

        // Action buttons functionality
        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const action = this.textContent.trim();
                alert(`Action: ${action}`);
            });
        });
        
    </script>
    <script>
        // function ChangingINCurr(){
        // Trip and user currencies from PHP
        const tripCurrency = "{{ $trip->currency }}"; // e.g., "INR"
        const userCurrency = "{{ Auth::user()->user_currency }}"; // e.g., "USD"
        const budget = "{{ $trip->budget }}"
        // Fetch exchange rates based on USD as base
        fetch('https://open.er-api.com/v6/latest/' + userCurrency)
            .then(response => response.json())
            .then(data => {

                const rates = data.rates;

                let convertedBudget;

                if (tripCurrency === userCurrency) {
                    convertedBudget = budget; // same currency
                } else {
                    const rate = rates[tripCurrency]; // user -> trip currency
                    if (!rate) {
                        console.error('Exchange rate not found for ' + tripCurrency);
                        convertedBudget = budget; // fallback
                    } else {
                        convertedBudget = budget * rate;
                    }
                }


                convertedBudget = convertedBudget.toFixed(2);

                console.log(`Budget in ${tripCurrency}: ${convertedBudget}`);

                let elem = document.querySelectorAll('.converted');

                elem.forEach(el => {
                    el.textContent = convertedBudget + ' ' + tripCurrency;
                });
            })
            .catch(error => console.error(error));
        // }
        // ChangingINCurr();        
    </script>

    <script>
        // Simple interactions for demonstration
        document.querySelector('.back-btn').addEventListener('click', function() {
            alert('Navigating back to your trips list');
        });

        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const action = this.textContent.trim();
                alert(`Action: ${action}`);
            });
        });
    </script>
    {{-- =========== SAVE EXPENSES =============  --}}
    <script>
        $(document).ready(function() {

            $('#expenseForm').on('submit', function(e) {
                e.preventDefault(); // prevent default form submit
                $('#saveExp').text('Adding...')
                $.ajax({
                    url: "{{ route('addingExp') }}", // your API endpoint
                    type: "POST",
                    data: $(this).serialize(), // serialize form data
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}" // only needed if hitting web.php, not api.php
                    },

                    success: function(response) {
                        if (response.success) {
                        toastr.success("Success", "Expense Has Been Added")
                        $('#expenseForm')[0].reset(); // clear form
                        expenseModal.style.display = 'none'
                        loadExpenses();    
                        }
                        else{
                            toastr.error("Error", response.message);
                        }                                                
                        // $('#newRemain').text(response.remaining_budget);    
                    },
                    error: function(xhr) {
                        let res = xhr.responseJSON;
                        if (res && res.errors) {
                            let errorHtml = "<ul style='color:red;'>";
                            $.each(res.errors, function(key, value) {
                                errorHtml += `<li>${value[0]}</li>`;
                            });
                            errorHtml += "</ul>";
                            $('#responseMessage').html(errorHtml);
                        } else {
                            $('#responseMessage').html(
                                `<p style="color:red;">${res.message || 'Something went wrong'}</p>`
                            );
                        }
                    },
                    complete: function(xhr, status) {
                        $('#saveExp').text('Add Expense');
                        // This runs whether success OR error
                    }
                });
            });
        });
    </script>

    {{-- ============ Delete Modal js ============  --}}
    <script>
        $(document).ready(function() {
            const deleteModal = $('#deleteModal');

            // Use event delegation for dynamic demo buttons
            $(document).on('click', '#demoButton, .demo-button', function() {
                deleteModal.css('display', 'flex');
            });

            // Close modal functions
            const closeModal = function() {
                deleteModal.hide();
            };

            $('#closeDeleteModal, #cancelDelete').on('click', closeModal);

            // Close modal when clicking outside
            $(window).on('click', function(event) {
                if (event.target === deleteModal[0]) {
                    closeModal();
                }
            });
        });
    </script>

    {{-- =============== DELETE EXPENSE ============  --}}
    <script>
        let expID = null;
        $(document).on('click', '#demoButton', function() {
            let itemId = $(this).data('id');
            console.log(itemId);
            expID = itemId
        });

        $(document).on('click', '#confirmDelete', function() {
            // alert('clicked on delete');
            $.ajax({
                url: "/delTrip/" + expID,
                type: 'DELETE', // or 'POST' if you are using POST
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content') // only for Laravel
                },
                success: function(response) {
                    // alert('Expense deleted');
                    // closeModal();
                    toastr.success('Successful', 'Expense Deleted!');
                    // ChangingINCurr();
                    $("#deleteModal").hide();
                    loadExpenses();
                    $('#confirmDelete').html('Deleting...')
                    $('#confirmDelete').prop('disabled', true);
                    // $('#newRemain').text(response.remaining_budget);           
                },
                error: function(xhr) {
                    alert('Error deleting expense!');
                    console.log(xhr.responseText);
                },
                complete: function() {
                    $('#confirmDelete').html('<i class="fas fa-trash"></i> Delete')
                    $('#confirmDelete').prop('disabled', false);
                }
            });
        });
    </script>
@endsection
