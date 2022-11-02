<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        <div class="row">
                            <ChatUsers></ChatUsers>
                            <Messages></Messages>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
   import ChatUsers from "./ChatUsersComponent.vue";
   import Messages from "./MessageContainerComponent.vue";
    
    export default {
        components: {
            ChatUsers,
            Messages,
        },
        data() {  
            return {  
              users: [],  
              messages: [],  
              active_user: {}  
            };  
        },  
        methods: {  
             
            sendMessage(){
                // axios.post('/formSubmit', {  
                //     name: this.name,  
                //     description: this.description  
                // })  
                // .then(function (response) {  
                //     currentObj.output = response.data;  
                // })  
                // .catch(function (error) {  
                //     currentObj.output = error;  
                // }); 
            },

            getUSers(){
                axios.get('/chat/get_users')
                .then( response => {
                    this.users=response.data.users;
                    this.setCurrentUser(this.users[0]);
                }) ;
            },

            setCurrentUser(user){
                this.active_user=user;
            }

            
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            this.getUSers();
        }
    }
</script>
<style scoped>
.container{
    margin-bottom: -19px;
}
.card-body {
    flex: 1 1 auto;
    padding: 0rem 1rem; 
}

</style>