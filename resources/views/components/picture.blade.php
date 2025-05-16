<x-template>
    <div id="carouselExample" class="relative w-full max-w-4xl mx-auto">
        <!-- Carousel items -->
        <div class="relative overflow-hidden">
            <div class="flex transition-transform duration-300 ease-in-out" id="carouselSlides">
                <div class="flex-shrink-0 w-full">
                    <img src="https://images.unsplash.com/photo-1497436072909-60f360e1d4b1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2560&q=80" class="w-full h-auto" alt="Slide 1">
                </div>
                <div class="flex-shrink-0 w-full">
                    <img src="https://images.unsplash.com/photo-1497436072909-60f360e1d4b1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2560&q=80" class="w-full h-auto" alt="Slide 2">
                </div>
                <div class="flex-shrink-0 w-full">
                    <img src="https://images.unsplash.com/photo-1497436072909-60f360e1d4b1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2560&q=80" class="w-full h-auto" alt="Slide 3">
                </div>
            </div>
        </div>

        <!-- Carousel controls -->
        <button id="prev" class="absolute top-1/2 left-4 transform -translate-y-1/2 text-white bg-black p-2 rounded-full hover:bg-gray-700">
            &#8249;
        </button>
        <button id="next" class="absolute top-1/2 right-4 transform -translate-y-1/2 text-white bg-black p-2 rounded-full hover:bg-gray-700">
            &#8250;
        </button>
    </div>

    <script>
        let currentIndex = 0;
        const slides = document.getElementById("carouselSlides");
        const totalSlides = slides.children.length;
        const nextBtn = document.getElementById("next");
        const prevBtn = document.getElementById("prev");

        function showSlide(index) {
            if (index >= totalSlides) {
                currentIndex = 0;
            } else if (index < 0) {
                currentIndex = totalSlides - 1;
            }
            slides.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        nextBtn.addEventListener("click", () => {
            currentIndex++;
            showSlide(currentIndex);
        });

        prevBtn.addEventListener("click", () => {
            currentIndex--;
            showSlide(currentIndex);
        });

        // Optional: Auto slide every 3 seconds
        setInterval(() => {
            currentIndex++;
            showSlide(currentIndex);
        }, 3000);
    </script>
</x-template>