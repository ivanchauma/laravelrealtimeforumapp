class AppStorage {
    storeToken(token){
        localStorage.setItem('token', token);
        //console.log("Stored the token : " + token);
    }

    storeUser(user){
        localStorage.setItem('user', user);
        //console.log("Stored the token : " + token);
    }


    store(user, token) {
        this.storeToken(token);
        this.storeUser(user);
    }

    clear(){
        localStorage.removeItem('token');
        localStorage.removeItem('user');
        console.log("All Cleared");
    }

    getToken(){
      return localStorage.getItem('token');
    }

    getUser(){
      return localStorage.getItem('user');
    }
}

export default AppStorage = new AppStorage();
