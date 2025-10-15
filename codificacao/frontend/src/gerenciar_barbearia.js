// Load components
document.addEventListener('DOMContentLoaded', function() {
    // Load navbar
    fetch('components/navbar.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('navbar-container').innerHTML = data;
            // Set active link for dashboard
            const dashboardLink = document.querySelector('a[href="dashboard.html"]');
            if (dashboardLink) {
                dashboardLink.classList.add('active');
            }
        });

    // Load footer
    fetch('components/footer.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('footer-container').innerHTML = data;
        });

    // Load barbershop data from localStorage or set default
    loadBarbershopData();
    
    // Set up event listeners
    setupEventListeners();
});

// Load barbershop data
function loadBarbershopData() {
    const savedData = localStorage.getItem('barbershopData');
    
    if (savedData) {
        const data = JSON.parse(savedData);
        updateDashboard(data);
        populateEditForm(data);
    } else {
        // Set default data for demonstration
        const defaultData = {
            name: "Barbearia Premium",
            email: "contato@barbeariapremium.com",
            address: "Av. Principal, 123 - Centro",
            phone: "(11) 99999-9999",
            openingTime: "09:00",
            closingTime: "19:00",
            description: "Uma barbearia moderna com serviços de qualidade e profissionais experientes."
        };
        updateDashboard(defaultData);
        populateEditForm(defaultData);
    }
}

// Update dashboard with data
function updateDashboard(data) {
    document.getElementById('dashboardName').textContent = data.name;
    document.getElementById('dashboardDescription').textContent = data.description;
    document.getElementById('dashboardAddress').textContent = data.address;
    document.getElementById('dashboardPhone').textContent = data.phone;
    document.getElementById('dashboardEmail').textContent = data.email;
    document.getElementById('dashboardHours').textContent = `${data.openingTime} - ${data.closingTime}`;
}

// Populate edit form with current data
function populateEditForm(data) {
    document.getElementById('editName').value = data.name;
    document.getElementById('editEmail').value = data.email;
    document.getElementById('editAddress').value = data.address;
    document.getElementById('editPhone').value = data.phone;
    document.getElementById('editOpeningTime').value = data.openingTime;
    document.getElementById('editClosingTime').value = data.closingTime;
    document.getElementById('editDescription').value = data.description;
}

// Set up event listeners
function setupEventListeners() {
    // Save changes button
    document.getElementById('saveChangesBtn').addEventListener('click', function() {
        saveBarbershopChanges();
    });
    
    // Edit info button
    document.getElementById('editInfoBtn').addEventListener('click', function() {
        // Populate modal with current data
        const currentData = {
            name: document.getElementById('dashboardName').textContent,
            email: document.getElementById('dashboardEmail').textContent,
            address: document.getElementById('dashboardAddress').textContent,
            phone: document.getElementById('dashboardPhone').textContent,
            openingTime: document.getElementById('editOpeningTime').value,
            closingTime: document.getElementById('editClosingTime').value,
            description: document.getElementById('dashboardDescription').textContent
        };
        populateEditForm(currentData);
    });
}

// Save barbershop changes
function saveBarbershopChanges() {
    const formData = {
        name: document.getElementById('editName').value,
        email: document.getElementById('editEmail').value,
        address: document.getElementById('editAddress').value,
        phone: document.getElementById('editPhone').value,
        openingTime: document.getElementById('editOpeningTime').value,
        closingTime: document.getElementById('editClosingTime').value,
        description: document.getElementById('editDescription').value
    };
    
    // Validate required fields
    if (!formData.name || !formData.email || !formData.address || !formData.phone) {
        alert('Por favor, preencha todos os campos obrigatórios.');
        return;
    }
    
    // Simulate API call
    const saveBtn = document.getElementById('saveChangesBtn');
    const originalText = saveBtn.innerHTML;
    saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Salvando...';
    saveBtn.disabled = true;
    
    setTimeout(function() {
        // Save to localStorage
        localStorage.setItem('barbershopData', JSON.stringify(formData));
        
        // Update dashboard
        updateDashboard(formData);
        
        // Close modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('editInfoModal'));
        modal.hide();
        
        // Reset button
        saveBtn.innerHTML = originalText;
        saveBtn.disabled = false;
        
        // Show success message
        showSuccessMessage('Informações atualizadas com sucesso!');
    }, 1500);
}

// Show success message
function showSuccessMessage(message) {
    // Create or get success message element
    let successMessage = document.getElementById('successMessage');
    if (!successMessage) {
        successMessage = document.createElement('div');
        successMessage.id = 'successMessage';
        successMessage.className = 'alert alert-success success-message mt-3';
        document.querySelector('.container').insertBefore(successMessage, document.querySelector('.row.mb-4'));
    }
    
    successMessage.innerHTML = `
        <i class="fas fa-check-circle me-2"></i>
        ${message}
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert"></button>
    `;
    successMessage.style.display = 'block';
    
    // Auto hide after 5 seconds
    setTimeout(() => {
        successMessage.style.display = 'none';
    }, 5000);
}

// Update index.html script.js to redirect to dashboard
// Adicione esta função ao script.js existente:
function redirectToDashboard(data) {
    // Save data to localStorage
    localStorage.setItem('barbershopData', JSON.stringify(data));
    // Redirect to dashboard
    window.location.href = 'dashboard.html';
}