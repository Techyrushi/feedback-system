document.addEventListener('DOMContentLoaded', function() {
    // Feedback form validation
    const feedbackForm = document.getElementById('feedbackForm');
    if(feedbackForm) {
        feedbackForm.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Full Name validation
            const fullName = document.getElementById('full_name');
            const fullNameError = fullName.nextElementSibling;
            if(fullName.value.trim() === '') {
                fullNameError.textContent = 'Please enter your full name';
                isValid = false;
            } else if(!/^[a-zA-Z ]+$/.test(fullName.value)) {
                fullNameError.textContent = 'Only letters and spaces allowed';
                isValid = false;
            } else if(fullName.value.length < 3) {
                fullNameError.textContent = 'Name must be at least 3 characters';
                isValid = false;
            } else {
                fullNameError.textContent = '';
            }
            
            // Email validation
            const email = document.getElementById('email');
            const emailError = email.nextElementSibling;
            if(email.value.trim() === '') {
                emailError.textContent = 'Please enter your email';
                isValid = false;
            } else if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
                emailError.textContent = 'Please enter a valid email';
                isValid = false;
            } else {
                emailError.textContent = '';
            }
            
            // Rating validation
            const rating = document.getElementById('rating');
            const ratingError = rating.nextElementSibling;
            if(rating.value === '') {
                ratingError.textContent = 'Please select a rating';
                isValid = false;
            } else {
                ratingError.textContent = '';
            }
            
            // Message validation
            const message = document.getElementById('message');
            const messageError = message.nextElementSibling;
            if(message.value.trim() === '') {
                messageError.textContent = 'Please enter your feedback message';
                isValid = false;
            } else if(message.value.length > 250) {
                messageError.textContent = 'Message cannot exceed 250 characters';
                isValid = false;
            } else {
                messageError.textContent = '';
            }
            
            if(!isValid) {
                e.preventDefault();
            }
        });
        
        // Character counter for message
        const message = document.getElementById('message');
        const charCount = document.getElementById('charCount');
        if(message && charCount) {
            message.addEventListener('input', function() {
                const remaining = 250 - this.value.length;
                charCount.textContent = remaining + ' characters remaining';
            });
        }
    }
});