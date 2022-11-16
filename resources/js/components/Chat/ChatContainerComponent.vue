<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        <div class="row">
                            <ChatUsers 
                                v-bind:users="users"
                                @userChange="setCurrentUser($event)"
                            ></ChatUsers>
                            <Messages 
                                v-bind:messages="messages" 
                                v-bind:active_user="active_user" 
                                @newMessage="getActiveUserChat"
                            ></Messages>
                            
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
        props: {
         pusher_credentials: Object,
        },
        components: {
            ChatUsers,
            Messages,
        },
        data(){  
            return {  
              users: [],  
              messages: [],  
              active_user: {}  ,
              pusher_obj:{},
              channel:{},
            };  
        },  
        methods: {  
             
            getUSers(){

                axios.get('/chat/get_users')
                .then( response => {
                    this.users=response.data.users;
                    this.setCurrentUser(this.users[0]);
                }) ;

            },
            setCurrentUser(user){

                this.active_user=user;
                this.getActiveUserChat();
                this.userPuserChannel();

            },
            getActiveUserChat()
            {
                axios.post('/chat/messages', {  
                    send_to_id: this.active_user.id,  
                    job_id: 96 
                })  

                .then( response => {
                    this.messages=response.data.messages;
                   
                }) ;
            },
            userPuserChannel()
            {
               
                if(!_.isEmpty(this.channel))
                    this.channel.unbind();
                this.channel = this.pusher_obj.subscribe('user-'+this.active_user.id+'-message-channel');
                
                this.channel.bind('new-message', (data)=> {
                        console.log(data.message);
                        this.messages.push(data.message)  ;
                    });
                    this.channel.bind('delete-message', (data)=> {
                        this.messages.splice(this.messages.findIndex(a => a.id === data.message.id) , 1)
                    });
                    this.channel.bind('edited-message', (data)=> {
                        console.log(data.message);
                        this.messages[(this.messages.findIndex(a => a.id === data.message.id))].message=data.message.message;
                    });
            }
        },
        mounted() {
            console.log(this.pusher_credentials.host);
            this.pusher_obj = new Pusher(this.pusher_credentials.host, {
                cluster: this.pusher_credentials.port
            });
          
        },
        created(){
            this.getUSers();
            console.log('Component mounted.')
            
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