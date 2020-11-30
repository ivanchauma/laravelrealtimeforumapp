class Token {

    isValid(token){
        const payload = this.payload(token);
        if (payload){
            //console.log("Entrei aqui");
            //console.log(payload.iss);
           return payload.iss == "http://localhost:8000/api/auth/login" ||
           "http://localhost:8000/api/auth/signup" ? true :
           false
        }
        return false;
    }

    payload(token){
        //console.log(token);
       const p = token.split(".")[1];
        //console.log(this.decode(p));
        //console.log(JSON.parse(atob(p))); //Decode base64
        return this.decode(p);
       //console.log(JSON.parse(atob(p))); //Decode
    }

    decode(token){
        return JSON.parse(atob(token));
        //Decode base64
    }

}

export default Token = new Token();
