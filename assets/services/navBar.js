export function getUser() {
  const user = localStorage.getItem("user")
    return new Promise((resolve) => {
        const user = {
            group: sessionStorage.getItem('group') || null,
        };
        resolve(user)
    });
}

export function isAdmin(user) {
    return user === 'admin'
}

export function isUser(user) {
    return user === 'user'
}

export function isGuest(user) {
    return user === 'guest'
}