let registerForm = document.getElementById('registerForm');

async function handleFormSubmit(event) {
    event.preventDefault();
    let form = new FormData(event.currentTarget);
    let url = "register";
    let request = new Request(url, {method: 'POST', body: form});
    let response = await fetch(request);
    let responseData = await response.json();
    if (responseData.success) {
        let errorDiv = document.querySelector('.error');
        errorDiv.innerHTML = "Inscription réussie"
        window.location.replace('login');
    } else {
        let errorDiv = document.querySelector('.error');
        errorDiv.innerHTML = "L'inscription a échoué"
    }
}

registerForm.addEventListener('submit', (event) => handleFormSubmit(event));