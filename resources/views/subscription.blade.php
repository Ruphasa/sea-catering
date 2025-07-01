<div>
    <h3 class="text-2xl font-bold text-blue-600 mb-4">Subscription Details</h3>
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
        <div class="flex justify-end space-x-2">
            <button type="button" onclick="document.getElementById('myModal-{{ $mealPlan->id }}').classList.add('hidden')" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Confirm Subscription</button>
        </div>
    </form>
</div>

<script>
    // Pastikan fungsi updateTotal sudah didefinisikan di konteks yang tepat
    function updateTotal(planId) {
        const form = document.getElementById(`subscription-form-${planId}`);
        const mealTypes = form.querySelectorAll('input[name="meal_types[]"]:checked');
        const deliveryDays = form.querySelectorAll('input[name="delivery_days[]"]:checked');
        const pricePerMeal = {{ $mealPlan->price }}; // Dinamis per plan
        const total = pricePerMeal * mealTypes.length * deliveryDays.length * 4.3;
        document.getElementById(`total-price-${planId}`).textContent = `Rp ${total.toLocaleString('id-ID')}`;
    }
</script>
