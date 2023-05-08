let booksForm = document.getElementById('booksForm');

async function handleFormSubmit(event) {
    event.preventDefault();
    let form = new FormData(event.currentTarget);
    let url = "books/write";
    let request = new Request(url, {method: 'POST', body: form});
    let response = await fetch(request);
    let responseData = await response.json();
    if (responseData.success) {
        let errorDiv = document.querySelector('.error');
        errorDiv.innerHTML = "Le livre est bien insérée en base de données";
    } else {
        let errorDiv = document.querySelector('.error');
        errorDiv.innerHTML = "Le livre n'a pas été inséré en base de données";
    }
}

booksForm.addEventListener('submit', (event) => handleFormSubmit(event));