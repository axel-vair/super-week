let connectionForm = document.getElementById('connectionForm');

async function handleFormSubmit(event) {
    event.preventDefault();
    let form = new FormData(event.currentTarget);
    let url = "login";
    let request = new Request(url, {method: 'POST', body: form});
    let response = await fetch(request);
    let responseData = await response.json();
    if (responseData.success) {
        let errorDiv = document.querySelector('.error');
        errorDiv.innerHTML = "Connexion réussie";
        window.location.replace('users')
    } else {
        let errorDiv = document.querySelector('.error');
        errorDiv.innerHTML = "La connexion a échoué";
    }
}

connectionForm.addEventListener('submit', (event) => handleFormSubmit(event));