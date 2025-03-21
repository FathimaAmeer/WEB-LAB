document.getElementById('registrationForm').addEventListener('submit', function(event) {
    let isValid = true;

    // Name validation
    let name = document.getElementById('name').value;
    let namePattern = /^[A-Za-z ]{3,}$/;
    if (!namePattern.test(name)) {
        document.getElementById('nameError').textContent = "Name must be at least 3 letters and contain only alphabets.";
        isValid = false;
    } else {
        document.getElementById('nameError').textContent = "";
    }

    // Email validation
    let email = document.getElementById('email').value;
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        document.getElementById('emailError').textContent = "Invalid email format.";
        isValid = false;
    } else {
        document.getElementById('emailError').textContent = "";
    }

    // Phone validation
    let phone = document.getElementById('phone').value;
    let phonePattern = /^[0-9]{10}$/;
    if (!phonePattern.test(phone)) {
        document.getElementById('phoneError').textContent = "Phone number must be 10 digits.";
        isValid = false;
    } else {
        document.getElementById('phoneError').textContent = "";
    }

    // Password validation
    let password = document.getElementById('password').value;
    let passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
    if (!passwordPattern.test(password)) {
        document.getElementById('passwordError').textContent = "Password must be at least 6 characters, with at least one letter and one number.";
        isValid = false;
    } else {
        document.getElementById('passwordError').textContent = "";
    }

    // Confirm Password validation
    let confirmPassword = document.getElementById('confirmPassword').value;
    if (confirmPassword !== password) {
        document.getElementById('confirmPasswordError').textContent = "Passwords do not match.";
        isValid = false;
    } else {
        document.getElementById('confirmPasswordError').textContent = "";
    }

    if (!isValid) {
        event.preventDefault(); // Prevent form submission if validation fails
    } else {
        alert("Submitted"); // Show success message
    }
});
