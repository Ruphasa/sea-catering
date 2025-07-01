@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-3xl mx-auto">
        <h1 class="text-4xl font-bold text-blue-600 mb-6">{{ $mealPlan->name }}</h1>
        <p class="text-gray-700 mb-4 text-lg leading-relaxed">{{ $mealPlan->description }}</p>
        <p class="text-gray-800 font-semibold mb-6">Price per Meal: Rp {{ number_format($mealPlan->price, 0) }}</p>

        <!-- Testimonials Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-blue-600 mb-4">Customer Testimonials</h2>
            @if ($testimonials->isEmpty())
                <p class="text-gray-600">No testimonials yet for this meal plan.</p>
            @else
                <div class="space-y-4">
                    @foreach ($testimonials as $testimonial)
                        <div class="bg-gray-50 p-4 rounded-lg shadow">
                            <p class="text-gray-700">"{{ $testimonial->review }}"</p>
                            <p class="text-blue-500 mt-2">Rating: {{ str_repeat('★', $testimonial->rating) }}{{ str_repeat('☆', 5 - $testimonial->rating) }} ({{ $mealPlan->rating }}/5)</p>
                            <p class="text-gray-600 mt-2">By {{ $testimonial->user->name }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Subscription/Testimony Button -->
        <div class="text-center">
            @if (auth()->check() && auth()->user()->subscriptions()->where('meal_plan_id', $mealPlan->id)->exists())
                <button id="testimony-btn-{{ $mealPlan->id }}" class="bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-600 text-lg font-semibold transition duration-300" onclick="showTestimonyModal('{{ $mealPlan->id }}')">
                    Give Testimony
                </button>
            @else
                <button id="subscribe-btn-{{ $mealPlan->id }}" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 text-lg font-semibold transition duration-300" onclick="showSubscriptionModal('{{ $mealPlan->id }}')">
                    Subscribe Now
                </button>
            @endif
        </div>

        <!-- Subscription Modal -->
        <div id="myModal-{{ $mealPlan->id }}" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-full max-w-md h-[80vh] overflow-y-auto">
                <div class="flex justify-between items-center border-b border-gray-300 pb-4 mb-6 px-6">
                    <h3 class="text-2xl font-bold text-blue-600">Subscription Details</h3>
                    <button onclick="document.getElementById('myModal-{{ $mealPlan->id }}').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="modal-body space-y-6 px-6">
                    <form id="subscription-form-{{ $mealPlan->id }}" class="space-y-4">
                        <div>
                            <label class="block text-gray-700">* Phone Number</label>
                            <input type="text" name="phone" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">* Meal Types (Select at least one)</label>
                            <div class="flex flex-col space-y-2">
                                <label><input type="checkbox" name="meal_types[]" value="Breakfast" onchange="updateTotal('{{ $mealPlan->id }}')"> Breakfast</label>
                                <label><input type="checkbox" name="meal_types[]" value="Lunch" onchange="updateTotal('{{ $mealPlan->id }}')"> Lunch</label>
                                <label><input type="checkbox" name="meal_types[]" value="Dinner" onchange="updateTotal('{{ $mealPlan->id }}')"> Dinner</label>
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700">* Delivery Days (Select any combination)</label>
                            <div class="flex flex-col space-y-2">
                                <label><input type="checkbox" name="delivery_days[]" value="Monday" onchange="updateTotal('{{ $mealPlan->id }}')"> Monday</label>
                                <label><input type="checkbox" name="delivery_days[]" value="Tuesday" onchange="updateTotal('{{ $mealPlan->id }}')"> Tuesday</label>
                                <label><input type="checkbox" name="delivery_days[]" value="Wednesday" onchange="updateTotal('{{ $mealPlan->id }}')"> Wednesday</label>
                                <label><input type="checkbox" name="delivery_days[]" value="Thursday" onchange="updateTotal('{{ $mealPlan->id }}')"> Thursday</label>
                                <label><input type="checkbox" name="delivery_days[]" value="Friday" onchange="updateTotal('{{ $mealPlan->id }}')"> Friday</label>
                                <label><input type="checkbox" name="delivery_days[]" value="Saturday" onchange="updateTotal('{{ $mealPlan->id }}')"> Saturday</label>
                                <label><input type="checkbox" name="delivery_days[]" value="Sunday" onchange="updateTotal('{{ $mealPlan->id }}')"> Sunday</label>
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700">Allergies (Optional)</label>
                            <textarea name="allergies" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                        <div>
                            <label class="block text-gray-700">Total Price: <span id="total-price-{{ $mealPlan->id }}" class="font-semibold text-green-600">Rp 0</span></label>
                        </div>
                    </form>
                </div>
                <div class="flex justify-end space-x-2 mt-6 px-6">
                    <button type="button" onclick="document.getElementById('myModal-{{ $mealPlan->id }}').classList.add('hidden')" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
                    <button type="submit" form="subscription-form-{{ $mealPlan->id }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Confirm Subscription</button>
                </div>
            </div>
        </div>

        <!-- Testimony Modal -->
        <div id="testimonyModal-{{ $mealPlan->id }}" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
            <div class="bg-white border border-gray-300 rounded-lg shadow-lg w-full max-w-md p-6">
                <div class="flex justify-between items-center border-b border-gray-300 pb-4 mb-6">
                    <h3 class="text-2xl font-bold text-blue-600">Add Testimony</h3>
                    <button onclick="document.getElementById('testimonyModal-{{ $mealPlan->id }}').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <form id="testimony-form-{{ $mealPlan->id }}" class="space-y-4">
                    <div>
                        <label class="block text-gray-700">Review</label>
                        <textarea name="review" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>
                    <div>
                        <label class="block text-gray-700">Rating (1-5)</label>
                        <select name="rating" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="document.getElementById('testimonyModal-{{ $mealPlan->id }}').classList.add('hidden')" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
                        <button type="submit" form="testimony-form-{{ $mealPlan->id }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit Testimony</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM fully loaded');

        window.showSubscriptionModal = function(planId) {
            console.log('Showing modal for planId:', planId);
            document.getElementById('myModal-' + planId).classList.remove('hidden');
        };

        window.showTestimonyModal = function(planId) {
            console.log('Showing testimony modal for planId:', planId);
            document.getElementById('testimonyModal-' + planId).classList.remove('hidden');
        };

        window.updateTotal = function(planId) {
            const form = document.getElementById(`subscription-form-${planId}`);
            const mealTypes = form.querySelectorAll('input[name="meal_types[]"]:checked');
            const deliveryDays = form.querySelectorAll('input[name="delivery_days[]"]:checked');
            const pricePerMeal = {{ $mealPlan->price }}; // Dinamis per plan
            const total = pricePerMeal * mealTypes.length * deliveryDays.length * 4.3;
            document.getElementById(`total-price-${planId}`).textContent = `Rp ${total.toLocaleString('id-ID')}`;
        };

        document.querySelectorAll('[id^="subscription-form-"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const planId = this.id.replace('subscription-form-', '');
                const phone = this.querySelector('input[name="phone"]').value.trim();
                const mealTypes = Array.from(this.querySelectorAll('input[name="meal_types[]"]:checked')).map(cb => cb.value);
                const deliveryDays = Array.from(this.querySelectorAll('input[name="delivery_days[]"]:checked')).map(cb => cb.value);
                const allergies = this.querySelector('textarea[name="allergies"]').value;
                const totalPrice = parseFloat(document.getElementById(`total-price-${planId}`).textContent.replace('Rp ', '').replace(/,/g, ''));

                if (mealTypes.length === 0 || deliveryDays.length === 0) {
                    alert('Please fill all required fields (at least one meal type, and one delivery day).');
                    return;
                }

                if (confirm(`Confirm subscription for ${mealTypes.join(', ')} on ${deliveryDays.join(', ')}? Total: Rp ${totalPrice.toLocaleString('id-ID')}`)) {
                    fetch(`{{ url('/subscribe') }}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            phone: phone,
                            meal_plan_id: planId,
                            meal_types: mealTypes,
                            delivery_days: deliveryDays,
                            allergies: allergies
                        })
                    })
                    .then(response => {
                        console.log('Response status:', response.status);
                        console.log('Response headers:', response.headers);
                        if (!response.ok) {
                            return response.text().then(text => {
                                throw new Error(`HTTP error! status: ${response.status}, message: ${text || 'No response body'}`);
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert('Subscription confirmed! Redirecting to dashboard...');
                            document.getElementById('myModal-' + planId).classList.add('hidden');
                            window.location.href = data.redirect || '{{ url('/dashboard') }}';
                        } else {
                            throw new Error(data.message || 'Unknown error');
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                        alert('Error submitting subscription: ' + error.message);
                    });
                }
            });
        });

        document.querySelectorAll('[id^="testimony-form-"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const planId = this.id.replace('testimony-form-', '');
                const review = this.querySelector('textarea[name="review"]').value.trim();
                const rating = this.querySelector('select[name="rating"]').value;

                if (!review || !rating) {
                    alert('Please fill all fields for testimony.');
                    return;
                }

                if (confirm(`Submit testimony for meal plan ${planId}? Rating: ${rating}/5`)) {
                    fetch(`{{ url('/testimony') }}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            meal_plan_id: planId,
                            review: review,
                            rating: rating
                        })
                    })
                    .then(response => {
                        console.log('Response status:', response.status);
                        if (!response.ok) {
                            return response.text().then(text => {
                                throw new Error(`HTTP error! status: ${response.status}, message: ${text || 'No response body'}`);
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert('Testimony submitted successfully!');
                            document.getElementById('testimonyModal-' + planId).classList.add('hidden');
                            location.reload(); // Refresh halaman untuk update testimonials
                        } else {
                            throw new Error(data.message || 'Unknown error');
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                        alert('Error submitting testimony: ' + error.message);
                    });
                }
            });
        });
    });
</script>
@endsection
