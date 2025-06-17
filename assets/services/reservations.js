import { calculatePrice } from "assets\services\functions.js"

export const getReservations = async (reservationsContainer, status, paginationContainer, page = 1, search = '') => {

    const response = await fetch(`reservations?status=${status}&page=${page}&search=${encodeURIComponent(search)}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
    })

    if (!response.ok) {
        throw new Error(`Error fetching reservations: ' + ${response.status}`)
    }

    const data = await response.json()

    await generateReservations(data.reservations.reservations, reservationsContainer)

    updatePagination(data.reservations.reservationCount, status, paginationContainer, page , reservationsContainer, search)

}



const generateReservations = async (reservations, reservationsContainer) => {
    reservationsContainer.innerHTML = ''
    reservations.forEach(reservation => {
        const price = calculatePrice(new Date(reservation.start_time), new Date(reservation.end_time), 0.70)
        const reservationRow = `
        <tr>
        <td>${reservation.id}</td>
        <td>${reservation.user_id}</td>
        <td>${reservation.firstName}</td>
        <td>${reservation.parking_id}</td>
        <td>${reservation.car_id}</td>
        <td>${reservation.status}</td>
        <td>${reservation.start_time}</td>
        <td>${reservation.end_time}</td>
        <td>${reservation.created_at}</td>
        <td>${reservation.parking_status}</td>
        <td><a class="delete-reservation-buttons" data-id="${reservation.id}" href="#"><i class="fa-solid fa-circle-xmark text-danger reservation-cross"></i></a></td>

        </tr>`
        reservationsContainer.innerHTML += reservationRow

    })
} 

const getPageCount = (logCount) => {
    return Math.ceil(logCount / 10)
}


const updatePagination = (pages, status, paginationContainer, currentPage, reservationsContainer, search) => {
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
        
        pageItem.querySelector('.page-link').addEventListener('click', async (e) => {
            e.preventDefault()
            const page = parseInt(e.target.getAttribute('data-page'))
            await getReservations(reservationsContainer, status, paginationContainer, page, search)
        })


    }
}