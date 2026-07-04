// Booking Form Submission
document.getElementById('bookingForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('handlers/booking_handler.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Booking submitted successfully! Confirmation sent to your email.');
            this.reset();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});

// Contact Form Submission
document.getElementById('contactForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('handlers/contact_handler.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Message sent successfully! We\'ll get back to you soon.');
            this.reset();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});

// Load gallery images
function loadGallery() {
    fetch('handlers/get_gallery.php')
    .then(response => response.json())
    .then(data => {
        const gallery = document.getElementById('galleryContainer');
        if (gallery && data.success) {
            gallery.innerHTML = data.images.map(img => `
                <div class="gallery-item">
                    <img src="uploads/gallery/${img.filename}" alt="${img.alt_text}">
                </div>
            `).join('');
        }
    })
    .catch(error => console.error('Error loading gallery:', error));
}

// Load testimonials
function loadTestimonials() {
    fetch('handlers/get_testimonials.php')
    .then(response => response.json())
    .then(data => {
        const testimonials = document.getElementById('testimonialsContainer');
        if (testimonials && data.success) {
            testimonials.innerHTML = data.testimonials.map(t => `
                <div class="testimonial-card">
                    <div class="stars">${'★'.repeat(t.rating)}${'☆'.repeat(5-t.rating)}</div>
                    <p>"${t.message}"</p>
                    <div class="testimonial-author">- ${t.author}</div>
                </div>
            `).join('');
        }
    })
    .catch(error => console.error('Error loading testimonials:', error));
}

// Load pricing
function loadPricing() {
    fetch('handlers/get_pricing.php')
    .then(response => response.json())
    .then(data => {
        const pricing = document.querySelector('.pricing-grid');
        if (pricing && data.success) {
            pricing.innerHTML = data.pricing.map(p => `
                <div class="pricing-card">
                    <h3>${p.service_name}</h3>
                    <div class="price">$${p.price}</div>
                    <p>${p.description}</p>
                    <ul>
                        ${p.features.split(',').map(f => `<li>${f.trim()}</li>`).join('')}
                    </ul>
                    <a href="#booking" class="btn btn-primary">Book Now</a>
                </div>
            `).join('');
        }
    })
    .catch(error => console.error('Error loading pricing:', error));
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    loadGallery();
    loadTestimonials();
    loadPricing();
});
