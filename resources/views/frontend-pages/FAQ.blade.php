<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Center - Digitales</title>



    <!-- style sheet -->
    <link rel="stylesheet" href="{{ asset('css/web/FAQ.css') }}">
</head>
<body>


    <!-- header -->
    <x-navigation.header/>




    <div class="container">
        <!-- Help Center Header -->
        <div class="help-header">
            <h1 class="help-title">Help Center</h1>
            

            <!-- search problem  -->
            <div class="search-container">
                <div class="search-icon">🔍</div>
                <input type="text" class="search-input" placeholder="Ask us a question" id="searchInput">
                <!-- <div class="search-results" id="searchResults">
                    <div class="search-result-item">How to reset my password?</div>
                    <div class="search-result-item">How to update my profile?</div>
                    <div class="search-result-item">How to contact support?</div>
                    <div class="search-result-item">How to delete my account?</div>
                </div> -->
            </div>
            <!-- search problem  -->


        </div>

        <div class="divider"></div>



        <!-- FAQ looping -->
        <div class="faq-section">
            @foreach($faqs as $faq)
                <div class="faq-item">
                    <h3 class="faq-question">{{ $faq->question }}</h3>
                    <div class="faq-answer">
                        @if(Str::contains($faq->answer, '<ol>') || Str::contains($faq->answer, '<p>'))
                            {!! $faq->answer !!}
                        @else
                            <p>{{ $faq->answer }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <!-- FAQ looping -->



        <div class="divider"></div>
    </div>



    <!-- footer -->
    <x-navigation.footer/>


    <!-- <script>
        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const searchResults = document.getElementById('searchResults');
        const faqItems = document.querySelectorAll('.faq-item');

        searchInput.addEventListener('focus', function() {
            searchResults.style.display = 'block';
        });

        searchInput.addEventListener('blur', function() {
            setTimeout(() => {
                searchResults.style.display = 'none';
            }, 200);
        });

        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase();
            
            // Filter FAQ items based on search
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
                
                if (question.includes(query) || answer.includes(query) || query === '') {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Show/hide search results dropdown
            if (query.length > 0) {
                searchResults.style.display = 'block';
            } else {
                searchResults.style.display = 'none';
            }
        });

        // Handle search result clicks
        document.querySelectorAll('.search-result-item').forEach(item => {
            item.addEventListener('click', function() {
                searchInput.value = this.textContent;
                searchResults.style.display = 'none';
                
                // Filter FAQ items based on selected result
                const query = this.textContent.toLowerCase();
                faqItems.forEach(faqItem => {
                    const question = faqItem.querySelector('.faq-question').textContent.toLowerCase();
                    if (question.includes(query)) {
                        faqItem.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                });
            });
        });
    </script> -->
</body>
</html>
