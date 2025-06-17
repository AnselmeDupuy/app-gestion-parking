import { calculatePrice } from "assets\services\functions.js"

export const getOrders = async (orderContainer) => {
    const response = await fetch('order', {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
    })

    if (!response.ok) {
        throw new Error(`Error fetching reservations: ' + ${response.status}`)
    }

    const data =  await response.json()
    
    generateOrders(data.orders, orderContainer)
}

export const confirmOrder = async (id, orderContainer) => {
    const response = await fetch(`order?action=confirm&reservationId=${id}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
    })

    if(!response.ok) {
        throw new Error(`Error confirming reservation: ' + ${response.status}`)
    }

    await response.json()
    await getOrders(orderContainer)
}

export const cancelOrder = async (id, orderContainer) => {
    const response = await fetch(`order?action=cancel&reservationId=${id}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
    })

    if (!response.ok) {
        throw new Error(`Error canceling reservation: ' + ${response.status}`)
    }

    const data = await response.json()

    if (data.success) {
        alert('Reservation Canceled')
        getOrders(orderContainer)
    } else {
        alert('Failed to delete the order')
        getOrders(orderContainer)
    }

    return data
}

const generateOrders = async (orders, orderContainer) => {
    orderContainer.innerHTML = ''
    orders.forEach(order => {
        const price = calculatePrice(new Date(order.start_time), new Date(order.end_time), 0.70)
        const orderRow = `
        <tr>
        <td>${order.id}</td>
        <td>${order.car_name}</td>
        <td>${order.start_time}</td>
        <td>${order.end_time}</td>
        <td>${order.type}</td>
        <td>${price}€</td>
        <td>${order.status}</td>

        <td>
            <div class="paypal-button-bg" id="paypal-button-container-${order.id}"></div>
        </td>
        <td><a class="delete-order-buttons" data-id="${order.id}" href="#"><i class="fa-solid fa-circle-xmark text-danger order-cross"></i></a></td>

        </tr>`
        orderContainer.innerHTML += orderRow

    })

    generatePaypalBtn(orders, orderContainer)
} 


const generatePaypalBtn = async (orders, orderContainer) => {
    orders.forEach(order => {
  
    const price = calculatePrice(new Date(order.start_time), new Date(order.end_time), 0.70)

  
    paypal.Buttons({
      style: {
              layout: 'horizontal',
              color: 'silver',
              shape: 'pill',
              label: 'pay',
              tagline: false
      },
      createOrder: function(data,actions) {
          return actions.order.create({
              purchase_units: [{
                  amount: {
                      value: price
                  }
              }]
          })
      },
      onApprove: function(data, actions) {
        const formData = new FormData()
        formData.append('action', 'confirm')
        formData.append('reservationId', order.id)

          return actions.order.capture().then(function(details) {
              fetch('order', {
                  method: 'POST',
                  headers: {
                      'X-Requested-With': 'XMLHttpRequest'
                  },
                  body: formData
                  })
                    .then(res => res.json())
                    .then(async res => {
                  if (res.success) {
                      await getOrders(orderContainer)
                      alert("Order Complete")
                  } else {
                      alert("Pament captured but failed backend")
                  }
              })
          })
      }
    }).render(`#paypal-button-container-${order.id}`)
  })
}
