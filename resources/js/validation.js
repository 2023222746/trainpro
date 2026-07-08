/**
 * Bootstrap 5 validation helper
 * Adds custom validation to forms with class 'needs-validation'
 */
document.addEventListener('DOMContentLoaded', function() {
    // Fetch all forms that need validation
    const forms = document.querySelectorAll('.needs-validation');

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
});

/**
 * Helper: Validate a single field
 * @param {HTMLInputElement} field
 * @returns {boolean}
 */
export function validateField(field) {
    if (field.checkValidity()) {
        field.classList.remove('is-invalid');
        field.classList.add('is-valid');
        return true;
    } else {
        field.classList.remove('is-valid');
        field.classList.add('is-invalid');
        return false;
    }
}

/**
 * Helper: Validate an entire form
 * @param {HTMLFormElement} form
 * @returns {boolean}
 */
export function validateForm(form) {
    const fields = form.querySelectorAll('input, select, textarea');
    let isValid = true;
    fields.forEach(field => {
        if (!validateField(field)) {
            isValid = false;
        }
    });
    return isValid;
}
