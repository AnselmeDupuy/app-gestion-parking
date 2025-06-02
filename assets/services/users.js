export const getUsers = async (userContainer, paginationContainer, page = 1, search = '') => {

    const response = await fetch(`users?&page=${page}&search=${encodeURIComponent(search)}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
    })

    if (!response.ok) {
        throw new Error(`Error fetching users: ' + ${response.status}`)
    }

    const data =  await response.json()

    generateUsers(data.users, userContainer)

    updatePagination(data.usersCount, paginationContainer, page, userContainer, search)

} 

export const deleteUser = async (userId) => {
    const response = await fetch(`users?action=delete&id=${userId}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
    })

    if (!response.ok) {
        throw new Error(`Error deleting user: ' + ${response.status}`)
    }

    const usersContainer = document.getElementById('table-body-users');
    const paginationContainer = document.querySelector('.pagination-users');
    const searchInput = document.querySelector('.users-search-input');
    const currentSearch = searchInput.value.trim();
    await getUsers(usersContainer, paginationContainer, 1, currentSearch);

}

export const toggleUserActivation = async (userId, userContainer) => {
    const response = await fetch(`users?action=toggle&id=${userId}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
    })

    const usersContainer = document.getElementById('table-body-users');
    const paginationContainer = document.querySelector('.pagination-users');
    const searchInput = document.querySelector('.users-search-input');
    const currentSearch = searchInput.value.trim();
    await getUsers(usersContainer, paginationContainer, 1, currentSearch);

}



const generateUsers = async (users, userContainer) => {
userContainer.innerHTML = ''

users.forEach(users => {
const userRow = `
    <tr>
        <td>${users.id}</td>
        <td>${users.email}</td>
        <td>${users.firstName}</td>            
        <td>${users.surName}</td>
        <td>${users.phone}</td>
        <td>${users.group_id === 1 ? 'user' : 'admin'}</td>
        <td>${users.created_at}</td>
        <td>${users.is_active}</td>
        <td>
            <button class="toggle-status-btn btn btn-sm ${users.is_active ? 'btn-danger' : 'btn-success'}" data-id="${users.id}">
                ${users.is_active ? 'Deactivate' : 'Activate'}
            </button>
        </td>
        <td>
            <button class="delete-btn btn btn-sm btn-danger" data-id="${users.id}">DELETE USER
            </button>
        </td>
    </tr>`
    userContainer.innerHTML += userRow
})

document.querySelectorAll('.toggle-status-btn').forEach(button => {
    button.addEventListener('click', async (e) => {
        e.preventDefault()
        const userId = e.target.getAttribute('data-id')
        await toggleUserActivation(userId, userContainer)
    })
})

document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', async (e) => {
        e.preventDefault()
        const userId = e.target.getAttribute('data-id')
        await deleteUser(userId)
    })
})
}

const getPageCount = (usersCount) => {
return Math.ceil(usersCount / 10)
}


export const updatePagination = (pages, paginationContainer, currentPage, userContainer, search) => {
const pageCount = getPageCount(pages)

paginationContainer.innerHTML = ''

for (let i = 1; i <= pageCount; i++) {
    const pageItem = document.createElement('li')
    pageItem.classList.add('page-item')
    if (i === currentPage) {
        pageItem.classList.add('active')
    }

    pageItem.innerHTML = `<a class="page-link" href="#" data-page="${i}">${i}</a>`
    paginationContainer.appendChild(pageItem)
    
    pageItem.querySelector('.page-link').addEventListener('click', (e) => {
        e.preventDefault()
        const selectedPage = parseInt(e.target.getAttribute('data-page'))
        getusers(userContainer, paginationContainer, selectedPage, search)
    })


}
}
