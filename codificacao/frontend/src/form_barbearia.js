document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('barbershopForm');
    const successAlert = document.querySelector('.success-alert');
    const registrationSection = document.getElementById('registrationSection');
    const dashboardSection = document.getElementById('dashboardSection');
    
    // Function to validate email format
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // Function to validate phone format (Brazilian format)
    function isValidPhone(phone) {
        const phoneRegex = /^\(?\d{2}\)?[\s-]?\d{4,5}-?\d{4}$/;
        return phoneRegex.test(phone);
    }
    
    // Function to show error message
    function showError(fieldId, messageId) {
        document.getElementById(messageId).style.display = 'block';
        document.getElementById(fieldId).classList.add('is-invalid');
    }
    
    // Function to hide error message
    function hideError(fieldId, messageId) {
        document.getElementById(messageId).style.display = 'none';
        document.getElementById(fieldId).classList.remove('is-invalid');
    }
    
    // Form submission handler
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const address = document.getElementById('address').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const openingTime = document.getElementById('openingTime').value;
        const closingTime = document.getElementById('closingTime').value;
        const description = document.getElementById('description').value.trim();
        const termsAccepted = document.getElementById('termsCheck').checked;
        
        // Reset previous errors
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(msg => msg.style.display = 'none');
        
        const formFields = document.querySelectorAll('.form-control, .form-check-input');
        formFields.forEach(field => field.classList.remove('is-invalid'));
        
        let isValid = true;
        
        // Validate required fields
        if (!name) {
            showError('name', 'nameError');
            isValid = false;
        }
        
        if (!email) {
            showError('email', 'emailError');
            isValid = false;
        } else if (!isValidEmail(email)) {
            showError('email', 'emailError');
            isValid = false;
        }
        
        if (!address) {
            showError('address', 'addressError');
            isValid = false;
        }
        
        if (!phone) {
            showError('phone', 'phoneError');
            isValid = false;
        } else if (!isValidPhone(phone)) {
            showError('phone', 'phoneError');
            isValid = false;
        }
        
        if (!openingTime) {
            showError('openingTime', 'openingTimeError');
            isValid = false;
        }
        
        if (!closingTime) {
            showError('closingTime', 'closingTimeError');
            isValid = false;
        }
        
        if (!description) {
            showError('description', 'descriptionError');
            isValid = false;
        }
        
        if (!termsAccepted) {
            document.getElementById('termsError').style.display = 'block';
            document.getElementById('termsCheck').classList.add('is-invalid');
            isValid = false;
        }
        
        // If form is valid, simulate successful registration
        if (isValid) {
            // Simulate API call delay
            setTimeout(function() {
                // Show success message
                successAlert.style.display = 'block';
                
                // Update dashboard with form data
                document.getElementById('dashboardName').textContent = name;
                document.getElementById('dashboardDescription').textContent = description;
                document.getElementById('dashboardAddress').textContent = address;
                document.getElementById('dashboardPhone').textContent = phone;
                document.getElementById('dashboardEmail').textContent = email;
                document.getElementById('dashboardHours').textContent = `${openingTime} - ${closingTime}`;
                
                // Redirect to dashboard after 3 seconds
                setTimeout(function() {
                    registrationSection.classList.add('d-none');
                    dashboardSection.classList.remove('d-none');
                    dashboardSection.classList.add('d-block');
                }, 3000);
            }, 1000);
        }
    });
    
    // Real-time validation for email field
    document.getElementById('email').addEventListener('blur', function() {
        const email = this.value.trim();
        if (email && !isValidEmail(email)) {
            showError('email', 'emailError');
        } else {
            hideError('email', 'emailError');
        }
    });
    
    // Real-time validation for phone field
    document.getElementById('phone').addEventListener('blur', function() {
        const phone = this.value.trim();
        if (phone && !isValidPhone(phone)) {
            showError('phone', 'phoneError');
        } else {
            hideError('phone', 'phoneError');
        }
    });
    
    // Navigation between login and registration
    document.getElementById('loginLink').addEventListener('click', function(e) {
        e.preventDefault();
        alert('Funcionalidade de login será implementada posteriormente.');
    });
    
    document.getElementById('registerLink').addEventListener('click', function(e) {
        e.preventDefault();
        dashboardSection.classList.add('d-none');
        registrationSection.classList.remove('d-none');
    });
});