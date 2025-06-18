export const getUserById = async (id, userContainer) => {

    const response = await fetch(`profile?user_id=${id}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
    })

    if (!response.ok) {
        throw new Error(`Error fetching logs: ' + ${response.status}`)
    }

    const data =  await response.json()

    generateProfile(userContainer, data.user)
        
} 


const generateProfile = async (userContainer, user) => {
    userContainer.innerHTML = ''
    const userRow = `
        <p>First Name : ${user.firstName}</p>
        <p>Last Name : ${user.surName}</p>
        <p>Email : ${user.email}</p>
        <p>Phone Number : ${user.phone}</p>
        <p>Subrscription Type : ${user.subbed === 1 ? "premium" : "free"}</p>
        <p>Account created at : ${user.created_at}</p>`
    userContainer.innerHTML += userRow
} 

export const editProfile = async (form) => {

    const formData = new FormData(form)
    formData.append('edit_profile', '1')

    try {
        
        const response = await fetch(`profile`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: formData,
        })


        const result =  await response.json()
        if (result.success) {
            form.reset();
            alert('profile mofidied successfully !')
        } else {
            alert(`Error editing profile: ${result.message}`)
        }
    } catch (error) {
        console.error('Error:', error);
        alert(`Error editing profile: ${error.message}`)
    }
}


