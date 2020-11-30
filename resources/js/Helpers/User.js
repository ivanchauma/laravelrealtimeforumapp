import Token from "./Token";
import AppStorage from './AppStorage';
class User {
    login(data){
                axios.post('/api/auth/login', data)
                //.then(res => console.log(res.data))
                .then(res => {
                    //Token.payload(res.data.access_token)
                    this.responseAfterLogin(res);
                    this.$router.push({name:'forum'});
                    //console.log(res.data);
                })
                .catch(err => console.log(err.reponse.data))
                }

    responseAfterLogin(res){
        const access_token = res.data.access_token;
        const username = res.data.user;
        if (Token.isValid(access_token)){
            //console.log(Token.isValid(access_token));
            AppStorage.store(username, access_token);
            window.location =  '/forum';
        }
    }

    hasToken(){
        const storedToken = AppStorage.getToken();
        if (storedToken){
            return Token.isValid(storedToken) ? true : false
        }
        //console.log(storedToken);
        return false;
    }

    loggedIn(){
        return this.hasToken();
       // window.location =  '/forum';
    }

    logout(){
        AppStorage.clear();
        window.location =  '/login';
    }

    name(){
        if (this.loggedIn()){
            return AppStorage.getUser();
        }
    }

    id(){
        if (this.loggedIn()){
            const payload = Token.payload(AppStorage.getToken())
            return payload.sub
        }
    }
}

export default User = new User();
