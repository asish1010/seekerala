<?php
/*
Plugin Name: See Kerala
Description: Provides a search bar to fetch Kerala travel details using the Gemini API.
Version: 1.0
Author: See Kerala Team
*/

// NOTE: For now, this is a demo version. In a real site, you must hide your API key securely.

function see_kerala_shortcode_output() {
    // Load Tailwind CSS from CDN
    wp_enqueue_style( 'see-kerala-styles', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css' );

    // Output HTML
    ob_start();
    ?>
    <div class="see-kerala-app max-w-3xl mx-auto my-10">
        <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Where in Kerala do you want to go?</h2>
            <div class="flex flex-col sm:flex-row gap-4">
                <input type="text" id="placeInput" placeholder="E.g., Alappuzha, Munnar, Varkala" class="flex-grow p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-700 transition duration-200" />
                <button id="searchButton" class="w-full sm:w-auto px-6 py-3 bg-teal-700 text-white font-bold rounded-lg hover:bg-teal-800 transition duration-200">
                    <span id="buttonText">Search Kerala</span>
                </button>
            </div>
            <p id="error-message" class="text-red-500 mt-2 hidden">Please enter a place name to search.</p>
        </div>

        <div id="resultsCard" class="bg-white p-6 rounded-xl shadow-lg min-h-[300px]">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4 border-b pb-2">Travel Information</h2>
            <div id="initialMessage" class="text-center text-gray-500 p-10">Start your Kerala journey by searching above 🌴</div>
            <div id="results-content" class="markdown-body"></div>
        </div>
    </div>

    <script>
        document.getElementById('searchButton').addEventListener('click', searchPlace);
        document.getElementById('placeInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                searchPlace();
            }
        });

        <?php echo file_get_contents( __DIR__ . '/gemini-client-logic.js' ); ?>
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode( 'see_kerala', 'see_kerala_shortcode_output' );
?>
