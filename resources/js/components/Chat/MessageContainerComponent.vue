<template>
    
    <div class="col-md-8 remove-space">
        
        <div class="card-header">
            <span class="float-sm-left">
                <b>{{active_user.first_name}} {{active_user.last_name}} </b> 
                <small>{{formattedDate(active_user.created_at)}}</small> 
            </span>
            <span class="float-right align-header">
                <button class="btn-job">View Job</button>
                <button class="btn-propsal">View Proposal</button>
            </span>
        </div>
        
        <div class="card-body msg_card_body" v-chat-scroll>

            <div v-for="message of messages">
                
                <div class="d-flex justify-content-start mb-4 mt-custom" v-if="message.role=='freelancer'">
                    
                    <div class="img_cont_msg">
                        <img v-if="message.user.basic_profile && message.user.basic_profile.profile_picture" :src="message.user.basic_profile.profile_picture" class="rounded-circle user_img_msg">
                        <img v-else src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                        
                        <span class="online_icon"></span>
                    </div>

                    <div class="msg_cotainer">
                        <div>
                            
                            <div class="dropdown icon" v-if="active_user.id!=message.sender_id">
                                <font-awesome-icon class="dropdown-toggle" icon="fa-solid fa-caret-down" data-bs-toggle="dropdown" aria-expanded="false" />
                                
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" @click="editMessage(message)">Edit</a></li>
                                    <li><a class="dropdown-item" href="#" @click="deleteMessage(message.id)">Delete</a></li>
                                </ul>
                            </div>
                            {{message.message}}
                        </div>
                        <b class="user_name">{{message.user.first_name}} {{message.user.last_name}}</b>
                        <span class="msg_time">{{formattedDate(message.created_at)}}</span>
                    </div>
                </div>

                <div class="d-flex justify-content-end mb-4 mt-custom" v-else>

                    <div class="msg_cotainer_send">

                        <div>
                            
                            <div class="dropdown icon_send" v-if="active_user.id!=message.sender_id">
                                
                                <font-awesome-icon class="dropdown-toggle" icon="fa-solid fa-caret-down" data-bs-toggle="dropdown" aria-expanded="false" />
                                
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" @click="editMessage(message)">Edit</a></li>
                                    <li><a class="dropdown-item" href="#" @click="deleteMessage(message.id)">Delete</a></li>
                                    
                                </ul>
                            </div>
                            {{message.message}}
                        </div>

                        <b class="sender_user_name">{{message.user.first_name}} {{message.user.last_name}}</b>
                        <span class="msg_time_send">{{formattedDate(message.created_at)}}</span>
                    </div>
                    <div class="img_cont_msg">
                        <img v-if="message.user.basic_profile && message.user.basic_profile.profile_picture" :src="message.user.basic_profile.profile_picture" class="rounded-circle user_img_msg"><img  src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg" v-else>
                        <span class="offline"></span>
                    </div>
                </div>

            </div>
        </div>
        <!-- buttons -->
        <div>
            
            <div class="row background">
                
                <div class="col-md-11">
                    <input type="text"  class="no-border" 
                    placeholder="Write Your Message" 
                    v-model="message_form.message"
                    @keyup.enter="sendMessage()"
                >
                </div>
                <div class="col-md-1 align-self-center">
                    <i class="fas fa-paperclip" ></i>
                    <i class="fas fa-location-arrow" @click="sendMessage()"></i>
                    
                </div>
            </div>
           
            
        </div>
        
    </div>
  
</template>

<script>
    import moment from 'moment'; 
    export default {
        
        props:{
            messages:Array,
            active_user:Object
        },
        data() {
            return {
                message_form:{
                    id:'',
                    message : '',
                    send_to_id : '',
                    module_type : 'App\\Models\\Job',
                    module_id : 96,
                },
                errors:[]
            }
        },
        mounted() {
            
        },
        methods: {
            formattedDate(date)
            {
               return moment(String(date)).format('hh:mm A')
            },
            sendMessage(){
                
                if(this.message_form.message !=' '){
                    this.message_form.send_to_id=this.active_user.id;
                    axios.post('../chat/save/message',this.message_form)
                    .then(res=>{
                        this.$emit('newMessage');
                        
                    }).catch((error) => {
                        const errors = error.response.data.errors;
                        for (let field of Object.keys(errors)) {
                            this.errors.push(errors[field][0]);
                        }
                    });
                    this.message_form.message='';
                    this.message_form.id='';
                }
            },
            deleteMessage(message_id)
            {
                axios.delete('../chat/delete/message/'+message_id)
                    .then(res=>{
                       
                        this.$emit('newMessage');
                        
                    }).catch((error) => {
                        const errors = error.response.data.errors;
                        for (let field of Object.keys(errors)) {
                            this.errors.push(errors[field][0]);
                        }
                    });
            },
            editMessage(message){

                this.message_form.id=message.id;
                this.message_form.message=message.message;

            }
        },
        components: {
        },
    }
</script>



<style scoped>
.icon_send {
    background-color: transparent;
    color: darkgray;
    padding: 10px;
    width: 20px;
    height: 20px;
    position: absolute;
    left: -7px;
    top: -15px;

  }

  .icon {
    background-color: transparent;
    color: darkgray;
    padding: 10px;
    width: 20px;
    height: 20px;
    position: absolute;
    right: 2px;
    top: -15px;

  }
    .mt-custom{
        margin-top: 40px;
    }

    .btn-propsal{

            width: 117px;
            height: 30px;
            left: 1147px;
            top: 86px;
            background: #007F7F;
            border-radius: 6px;

    }
    .btn-job{
        width: 94px;
        height: 30px;
        left: 1043px;
        top: 86px;
        border: 2px solid #007F7F;
        border-radius: 6px;
    }
    .remove-space{
        padding-left: 0px;
        padding-right: 0px;
    }
    .message-body{
        height: 400px;

    }
    .align-header{
        margin-top: -4px;
    }
    .no-border{
        border: none;
    }
    .background{
        border-top: 1px solid #CBDFDF;
        margin-left: 0px;
        margin-right: 0px;
    }
    
    .msg_card_body{
        overflow-y: auto;
        min-height: 570px;
        max-height: 570px;

    }
    
    .type_msg{
        background-color: rgba(0,0,0,0.3) !important;
        border:0 !important;
        color:white !important;
        height: 60px !important;
        overflow-y: auto;
    }
        .type_msg:focus{
         box-shadow:none !important;
         outline:0px !important;
    }
   
    
    .active{
        background-color: rgba(0,0,0,0.3);
    }
    .user_img{
        height: 70px;
        width: 70px;
        border:1.5px solid #f5f6fa;
    
    }
    .user_img_msg{
        height: 40px;
        width: 40px;
        border:1.5px solid #f5f6fa;
    
    }
.img_cont{
        position: relative;
        height: 70px;
        width: 70px;
}
.img_cont_msg{
        height: 40px;
        width: 40px;
}
.online_icon{
    position: relative;
    height: 10px;
    width: 10px;
    background-color: #4cd137;
    border-radius: 50%;
    border: 1.5px solid white;
    left: 28px;
    top: -20px;
}
.offline{
    position: relative;
    height: 10px;
    width: 10px;
    background-color: #c23616;
    border-radius: 50%;
    border: 1.5px solid white;
    right: 0px;
    top: -20px;
}

.user_info{
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 15px;
}
.user_info span{
    font-size: 20px;
    color: white;
}
.user_info p{
font-size: 10px;
color: rgba(255,255,255,0.6);
}

.msg_cotainer{
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 10px;
    background-color: ghostwhite;
    padding: 10px;
    position: relative;
    top:25px;
    min-width: 85px;
    
}
.msg_cotainer_send{
    margin-top: auto;
    margin-bottom: auto;
    margin-right: 10px;
    background-color: ghostwhite;
    padding: 10px;
    position: relative;
    top:25px;
    right: 0px;
    min-width: 85px;
    
}
.msg_time{
    position: absolute;
    left: 0;
    bottom: -23px;
    font-size: 10px;
}
.user_name{
    position: absolute;
    left: 0;
    bottom: -15px;
    top: -22px;
    font-size: 10px;
}
.sender_user_name{
    position: absolute;
    right:0;
    bottom: -15px;
    font-size: 10px;
    top: -22px;
}
.msg_time_send{
    position: absolute;
    right:0;
    bottom: -15px;
    font-size: 10px;
    top: 41px;
}
.msg_head{
    position: relative;
}



</style>
