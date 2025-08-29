@extends('Users.user_layout.userlayout')

@section('style')
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
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: var(--dark-2);
            border-radius: 10px;
            padding: 2rem;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.5);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-title {
            color: var(--primary);
            font-size: 1.5rem;
        }

        .close-btn {
            background: transparent;
            border: none;
            color: var(--text-light);
            font-size: 1.5rem;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-light);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border-radius: 5px;
            border: 1px solid var(--dark-3);
            background-color: var(--dark);
            color: var(--text-light);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 1rem;
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

            .expense-table {
                display: block;
                overflow-x: auto;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .expense-summary {
                flex-direction: column;
                gap: 1rem;
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
                    <p>Total budget for this trip</p>
                </div>
            </div>
            <div class="detail-card">
                <h3>💰 Budget in {{ $trip->currency }}</h3>
                <div class="detail-content">
                    <div id="converted" class="budget-display">{{ $trip->budget . ' ' . Auth::user()->user_currency }}</div>
                    <p>Total budget for this trip</p>
                </div>
            </div>
        </div>
        <!-- Expense Section -->
        <div class="expense-section">
            <div class="section-header">
                <h3 class="section-title"><i class="fas fa-receipt"></i> Expense Tracker</h3>
                <button class="add-expense-btn" id="addExpenseBtn">
                    <i class="fas fa-plus"></i> Add Expense
                </button>
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
                    <!-- Expenses will be added here dynamically -->
                </tbody>
            </table>

            <div class="expense-summary">
                <div class="total-expenses">
                    Total Expenses: <span id="totalExpenses">$0.00</span>
                </div>
                <div class="remaining-budget">
                    Remaining Budget: <span id="remainingBudget">$2,500.00</span>
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
                    <input type="date" id="expenseDate" required>
                </div>
                <div class="form-group">
                    <label for="expenseCategory">Category</label>
                    <select id="expenseCategory" required>
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
                    <input type="text" id="expenseDescription" required>
                </div>
                <div class="form-group">
                    <label for="expenseAmount">Amount (USD)</label>
                    <input type="number" id="expenseAmount" min="0" step="0.01" required>
                </div>
                <div class="form-actions">
                    <button type="button" class="action-btn secondary-btn" id="cancelExpense">Cancel</button>
                    <button type="submit" class="action-btn primary-btn">Save Expense</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('bottomScriptsCustom')
    <script>
        // Sample expense data
        let expenses = [{
                id: 1,
                date: '2023-06-15',
                category: 'Transportation',
                description: 'Flight to Zurich',
                amount: 750.00
            },
            {
                id: 2,
                date: '2023-06-16',
                category: 'Accommodation',
                description: 'Hotel in Zurich',
                amount: 120.00
            },
            {
                id: 3,
                date: '2023-06-17',
                category: 'Food',
                description: 'Restaurant dinner',
                amount: 45.50
            }
        ];

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

        // Calculate and update totals
        function updateTotals() {
            const total = expenses.reduce((sum, expense) => sum + expense.amount, 0);
            totalExpensesElement.textContent = formatCurrency(total);
            remainingBudgetElement.textContent = formatCurrency(TOTAL_BUDGET - total);
        }

        // Render expenses table
        function renderExpenses() {
            expenseTableBody.innerHTML = '';

            expenses.forEach(expense => {
                const row = document.createElement('tr');

                row.innerHTML = `
                    <td>${new Date(expense.date).toLocaleDateString()}</td>
                    <td>${expense.category}</td>
                    <td>${expense.description}</td>
                    <td>${formatCurrency(expense.amount)}</td>
                    <td class="action-cell">
                        <button class="edit-btn" data-id="${expense.id}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="delete-btn" data-id="${expense.id}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;

                expenseTableBody.appendChild(row);
            });

            // Add event listeners to edit and delete buttons
            document.querySelectorAll('.edit-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const id = parseInt(e.currentTarget.getAttribute('data-id'));
                    editExpense(id);
                });
            });

            document.querySelectorAll('.delete-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const id = parseInt(e.currentTarget.getAttribute('data-id'));
                    deleteExpense(id);
                });
            });

            updateTotals();
        }

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
                renderExpenses();
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

            renderExpenses();
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
            renderExpenses();

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

                // convertedBudget = convertedBudget.toFixed(2);

                console.log(`Budget in ${tripCurrency}: ${convertedBudget}`);

                document.querySelector('#converted').textContent = convertedBudget + ' ' + tripCurrency

            })
            .catch(error => console.error(error));
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
@endsection
