export const getLogs = async (logsContainer, paginationContainer, page = 1, search = '') => {

        const response = await fetch(`logs?page=${page}&search=${encodeURIComponent(search)}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
        })

        if (!response.ok) {
            throw new Error(`Error fetching logs: ' + ${response.status}`)
        }

        const data =  await response.json()

        generateLogs(data.logs, logsContainer)

        updatePagination(data.logCount, paginationContainer, page, logsContainer, search)



        
} 

const generateLogs = (logs, logsContainer) => {
    logsContainer.innerHTML = ''

    logs.forEach(logs => {
    const row = `
        <tr>
            <td>${logs.id}</td>
            <td>${logs.user_id}</td>
            <td>${logs.ip_address}</td>            
            <td>${logs.user_agent}</td>
            <td>${logs.action}</td>
            <td>${logs.action_details}</td>
            <td>${logs.created_at}</td>
        </tr>`
    logsContainer.innerHTML += row
    })
}

const getPageCount = (logCount) => {
    return Math.ceil(logCount / 10)
}


export const updatePagination = (pages, paginationContainer, currentPage, logsContainer, search) => {
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
            getLogs(logsContainer, paginationContainer, selectedPage, search)
        })


    }
}
