<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        <div class="row">
                            <ChatUsers 
                                v-if="is_child_data_loaded"
                                v-bind:users="users"
                                @userChange="setCurrentUser($event)"
                            ></ChatUsers>
                            <Messages 
                                v-if="is_child_data_loaded"
                                v-bind:messages="messages" 
                                v-bind:active_user="active_user" 
                                @newMessage="getActiveUserChat(true)"
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
              is_child_data_loaded:false
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
            shiftUsers(user){
                this.users.sort(function(x,y){ return x.id == user.id ? -1 : y.id == user.id ? 1 : 0; });
            },
            getActiveUserChat(is_shift_users=false)
            {

                if(is_shift_users)
                    this.shiftUsers(this.active_user);
                axios.post('/chat/messages', {  
                    send_to_id: this.active_user.send_to_user.id,  
                    module_id: this.active_user.module_id,
                    module_type: this.active_user.module_type,

                })

                .then( response => {
                    this.messages=response.data.messages;
                    this.is_child_data_loaded=true;

                   
                }) ;
            },
            userPuserChannel()
            {
               
                if(!_.isEmpty(this.channel))
                    this.channel.unbind();
                this.channel = this.pusher_obj.subscribe('user-'+this.active_user.send_to_user.id+this.active_user.module_id+'-message-channel');
                
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