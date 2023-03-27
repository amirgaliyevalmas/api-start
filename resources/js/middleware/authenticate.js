export default function authenticate(to, from, next) {
    const token = localStorage.getItem('x-xsrf-token')

    if(!token){
        if(to.name === 'login'){
            return next();
        }else {
            return next({
                name: 'login'
            })
        }
    }

    if(to.name === 'login' && token){
        return next({name: 'home'})
    }

    return next()
}