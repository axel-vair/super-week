let btnUsers = document.getElementById('users');
let btnBooks = document.getElementById('books');

async function getUsers(){
    let response = await fetch(`users`);
    let responseData = await response.json();


    let divUsers = document.querySelector('#displayUsers');
    divUsers.innerHTML = "";

    for(let i = 0; i < responseData.length; i++){
        let template = `
    <li>
        <strong>Prénom</strong> :  ${responseData[i].first_name}
        <strong>Nom</strong> : ${responseData[i].last_name}
        <strong>Email</strong> : ${responseData[i].email}
    </li>
    `
    divUsers.insertAdjacentHTML('beforeend', template);
    }
}
btnUsers.addEventListener('click', (ev) => {
    ev.preventDefault();
    getUsers();
})

async function getBooks(){
    let response = await fetch(`books`);
    let responseData = await response.json();

    let divBooks = document.querySelector('#displayBooks');
    divBooks.innerHTML = "";

    for(let i = 0; i < responseData.length; i++){
        let template = `
    <li>
        <strong>Titre</strong> : ${responseData[i].title}
        <strong>Content</strong> : ${responseData[i].content}
    </li>
    `
        divBooks.insertAdjacentHTML('beforeend', template);
    }
}
btnBooks.addEventListener('click', (ev) => {
    ev.preventDefault()
    getBooks();
})