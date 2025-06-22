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
            <td>${logs.client_ip}</td>            
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

    // Helper to create a page button
    function createPageItem(label, page, disabled = false, active = false) {
        const li = document.createElement('li')
        li.classList.add('page-item')
        if (disabled) li.classList.add('disabled')
        if (active) li.classList.add('active')
        li.innerHTML = `<a class="page-link" href="#" data-page="${page}">${label}</a>`
        if (!disabled && !active) {
            li.querySelector('.page-link').addEventListener('click', (e) => {
                e.preventDefault()
                getLogs(logsContainer, paginationContainer, page, search)
            })
        }
        return li
    }

    paginationContainer.appendChild(
        createPageItem('&lsaquo;', currentPage - 1, currentPage === 1)
    )

    if (currentPage > 2) {
        paginationContainer.appendChild(
            createPageItem(1, 1)
        )
        if (currentPage > 3) {
            // Ellipsis before current
            const ellipsis = document.createElement('li')
            ellipsis.classList.add('page-item', 'disabled')
            ellipsis.innerHTML = `<span class="page-link">...</span>`
            paginationContainer.appendChild(ellipsis)
        }
    }

    if (currentPage > 1) {
        paginationContainer.appendChild(
            createPageItem(currentPage - 1, currentPage - 1)
        )
    }

    paginationContainer.appendChild(
        createPageItem(currentPage, currentPage, false, true)
    )

    if (currentPage < pageCount) {
        paginationContainer.appendChild(
            createPageItem(currentPage + 1, currentPage + 1)
        )
    }

    if (currentPage < pageCount - 1) {
        if (currentPage < pageCount - 2) {
            const ellipsis = document.createElement('li')
            ellipsis.classList.add('page-item', 'disabled')
            ellipsis.innerHTML = `<span class="page-link">...</span>`
            paginationContainer.appendChild(ellipsis)
        }
        paginationContainer.appendChild(
            createPageItem(pageCount, pageCount)
        )
    }

    paginationContainer.appendChild(
        createPageItem('&rsaquo;', currentPage + 1, currentPage === pageCount)
    )
}
