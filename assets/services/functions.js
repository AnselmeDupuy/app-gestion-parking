export const calculatePrice = (start, end, pricePerHour) => {

    const duration = end - start
    const minutes = duration / (1000 * 60)
    const hours = minutes /60

    return Math.round(hours * pricePerHour * 100) / 100

}
