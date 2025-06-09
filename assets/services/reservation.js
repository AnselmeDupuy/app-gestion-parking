export const addReservation = async (form) => {

    const formData = new FormData(form)
    formData.append('add_reservation', '1')

    try {
        
    const response = await fetch(`reservation`, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
        body: formData,
    })

    const result =  await response.json()
    if (result.success) {
        form.reset();
        alert('Reservation added successfully!')
    } else {
        alert(`Error adding reservation: ${result.message}`)
    }
    } catch (error) {
        console.error('Error:', error);
        alert(`Error adding reservation: ${error.message}`)
    }
}
