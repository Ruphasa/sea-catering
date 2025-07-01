@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-r from-blue-100 to-white min-h-screen">
    <!-- Hero Section -->
    <div class="container mx-auto p-6 text-center py-20">
        <h1 class="text-5xl font-bold text-blue-700 mb-4">SEA Catering</h1>
        <p class="text-2xl text-gray-600 mb-8">Healthy Meals, Anytime, Anywhere</p>
    </div>

    <!-- Welcome Section -->
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg my-10">
        <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Welcome to SEA Catering!</h2>
        <p class="text-gray-700 text-lg leading-relaxed text-center">
            SEA Catering is a customizable healthy meal service delivered all across Indonesia. What started as a small business has grown into a nationwide sensation, and we're thrilled to meet the rising demand with fresh, tailored meal plans for everyone.
        </p>
    </div>

    <!-- Features Section -->
    <div class="container mx-auto p-6 text-center">
        <h2 class="text-3xl font-bold text-blue-600 mb-6">Our Key Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition">
                <h3 class="text-xl font-semibold text-blue-500">Meal Customization</h3>
                <p class="text-gray-600 mt-2">Tailor your meals to fit your dietary needs and preferences.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition">
                <h3 class="text-xl font-semibold text-blue-500">Delivery to Major Cities</h3>
                <p class="text-gray-600 mt-2">Enjoy our services across Indonesia's key regions.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition">
                <h3 class="text-xl font-semibold text-blue-500">Nutritional Information</h3>
                <p class="text-gray-600 mt-2">Detailed insights into the nutritional value of every meal.</p>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg my-10 text-center">
        <h2 class="text-2xl font-semibold text-blue-700 mb-4">Contact Us</h2>
        <p class="text-gray-600 mb-6">Have questions? We're here to help! Reach out to us via:</p>
        <div class="flex flex-col items-center space-y-4">
            <a href="https://wa.me/6281234567890" target="_blank"
                class="flex items-center justify-center text-green-600 hover:text-green-700 transition duration-300">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.074-.297-.149-1.258-.423-2.39-1.346-1.133-.923-1.855-2.057-2.068-2.41-.21-.352-.274-.482-.1-.64.173-.157.822-.811 1.046-1.087.225-.277.269-.362.416-.562.146-.2.289-.387.41-.558.121-.171.171-.269.297-.446.123-.174.147-.208.208-.348.062-.14.062-.252 0-.334-.062-.082-.156-.17-.262-.26-.105-.09-.21-.149-.326-.226-.116-.077-.246-.15-.37-.224-.125-.074-.248-.145-.37-.207-.123-.063-.248-.12-.37-.167-.122-.047-.243-.094-.36-.14-.118-.046-.24-.092-.35-.137-.11-.045-.22-.089-.33-.133-.11-.044-.22-.087-.33-.131-.11-.044-.22-.087-.33-.13-.11-.043-.22-.085-.33-.127-.11-.042-.22-.083-.33-.124-.11-.041-.22-.08-.33-.12-.11-.04-.22-.078-.33-.116-.11-.038-.22-.074-.33-.11-.11-.036-.22-.07-.33-.104-.11-.034-.22-.066-.33-.098-.11-.032-.22-.06-.33-.088-.11-.028-.22-.054-.33-.078-.11-.024-.22-.045-.33-.066-.11-.021-.22-.04-.33-.057-.11-.017-.22-.03-.33-.04-.11-.01-.22-.018-.33-.022-.11-.004-.22-.006-.33-.006-.11 0-.22.002-.33.006-.11.004-.22.012-.33.022-.11.01-.22.023-.33.04-.11.017-.22.036-.33.057-.11.021-.22.042-.33.066-.11.024-.22.05-.33.078-.11.028-.22.06-.33.088-.11.032-.22.068-.33.104-.11.036-.22.072-.33.11-.11.038-.22.076-.33.116-.11.04-.22.08-.33.12-.11.044-.22.086-.33.13-.11.044-.22.087-.33.131-.11.044-.22.088-.33.133-.11.045-.24.092-.35.137-.12.046-.24.093-.36.14-.12.047-.24.104-.37.167-.12.059-.24.13-.37.204-.12.074-.25.147-.37.224-.12.077-.22.136-.33.226-.1.09-.2.178-.26.26-.06.082-.06.194 0 .334.06.14.09.174.21.348.12.177.17.275.29.446.12.171.26.358.41.558.12.175.19.26.42.562.22.276.87.93 1.05 1.087.17.276.38.482.1.64-.21.353-.93 1.487-2.07 2.41-1.13.923-2.09 1.197-2.39 1.346-.3.149-.35.225-.64.074-.29-.15-.76-.867-.94-1.164-.19-.298-.39-.251-.67-.15-.27.1-1.73.818-2.03.967-.27.15-.52.3-.74.52-.22.22-.41.47-.59.75-.18.28-.33.63-.45.95-.12.32-.2.68-.26 1.08-.07.41-.09.84-.06 1.27.01.43.06.85.18 1.26.12.41.32.82.58 1.21.26.38.62.74 1.06 1.07.44.33.97.63 1.56.87.59.24 1.22.39 1.88.51.66.12 1.35.17 2.06.14 1.71-.03 3.32-.74 4.52-2.08 1.2-1.34 1.96-3.1 2.14-4.72.18-1.63-.05-3.28-.77-4.75-.72-1.47-1.78-2.67-3.07-3.52z" />
                </svg>
                WhatsApp: +62 812-3456-7890
            </a>
            <p class="text-gray-600">or email us at: <a href="mailto:support@seacatering.com"
                    class="text-blue-600 hover:text-blue-800">support@seacatering.com</a></p>
        </div>
    </div>
</div>
@endsection
