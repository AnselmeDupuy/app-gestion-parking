export const getLogs = async (logsContainer, paginationContainer, page = 1, search = '') => {
    try {
        const response = await fetch(`logs?ajax=true&page=${page}&search=${encodeURIComponent(search)}`, {
            method: 'GET',
            headers: {
                'accept': 'application/json',
            },
        })
        const data = await response.json()

        const pages = getPageCount(data.logCount)

        generateLogs(logsContainer, data.logs)
        updatePagination(pages, paginationContainer)
        

    } catch (e) {
        console.log('Error fetching logs:', e)
    }
} 

const generateLogs = (logs, logsContainer) => {

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
    return Math.ceil(logCount / 20)
}


export const updatePagination = (pages, paginationContainer) => {


    paginationContainer.innerHTML = ''

    // paginationContainer.document.createElement('li').classList.add('page-item')
    // paginationContainer.innerHTML = `<a class="page-link" href="#" data-page="">previous</a>`

    for (let i = 1; i <= pages; i++) {
        const pageItem = document.createElement('li')
        pageItem.classList.add('page-item')
        pageItem.innerHTML = `<a class="page-link" href="" data-page="${i}">${i}</a>`
        paginationContainer.appendChild(pageItem)
    
        if (i === 1) {
            pageItem.classList.add('active')
        }
    }
    // const nextPageItem = document.createElement('li')
    // nextPageItem.classList.add('page-item')
    // nextPageItem.innerHTML = `<a class="page-link" href="#" data-page="">next</a>`
}