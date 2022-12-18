import config from "./config";

export default{
    login(data){
        return config().post('auth/login', data)
    },
    
    logout(){
        return config().post('auth/logout', null, {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }
        })
    },

    getSpots(){
        return config().get('spots', {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }
        })
    },

    getDetailSpot(id){
        return config().get('spots/' + id, {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }
        })
    },

    getConsultation(){
        return config().get('consultations', {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }
        })
    },

    requestConsultation(data){
        return config().post('consultations', data, {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }
        })
    },

    getVaccines(){
        return config().get('vaccinations', {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }
        })
    },

    requestVaccines(data){
        return config().post('vaccines', data, {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }
        })
    }
}