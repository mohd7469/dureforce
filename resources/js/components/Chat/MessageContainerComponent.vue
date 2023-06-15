<template>
    
    <div class="col-md-8 remove-space">
        
        <div class="card-header ">
            <div class="row d-flex justify-content-between">
                
                <div class="mw-100">
                    <span class="float-sm-left header-title">
                        <b>{{active_user.send_to_user.first_name}} {{active_user.send_to_user.last_name}} </b> 
                        <small v-if="active_user.send_to_user.last_activity_at">{{formattedDate(active_user.send_to_user.last_activity_at)}}
                        </small> 

                        
                    </span>
                    <small class="dropdown icon icon_position" >
                        <i class=" las la-chevron-circle-down fa-lg" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" v-if="active_user.model=='Job'" @click="viewProposal()">View Proposal</a></li>
                            <li><a class="dropdown-item" href="#"  @click="viewModuleDetail()">View {{ active_user.model }}</a></li>
                        </ul>
                    </small>
                </div>
               
                
              
            </div>
            
            
            
        </div>
        
        <div class="card-body msg_card_body " v-chat-scroll v-if="messages.length>0">
            
            <div v-for="message of messages" >
                
                <div class="d-flex justify-content-start mb-4 mt-custom" v-if="message.role=='freelancer'">
                    
                    <div class="img_cont_msg">
                        <img v-if="message.user.basic_profile && message.user.basic_profile.profile_picture" :src="message.user.basic_profile.profile_picture" class="rounded-circle user_img_msg">
                        <img v-else src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                        
                        <span :class="message.user.is_session_active ? 'online_icon': 'offline'"></span>
                    </div>

                    <div class="msg_cotainer">
                        <div>
                            
                            <div class="dropdown actions-icon" v-if="active_user.send_to_user.id!=message.sender_id">
                                <i class="dropdown-toggle" icon="fa-solid fa-caret-down" data-bs-toggle="dropdown" aria-expanded="false" ></i>
                                
                                <ul class="dropdown-menu seller"  >
                                    <li v-if="!message.attachment"><a class="dropdown-item" href="#" @click="editMessage(message)">Edit</a></li>
                                    <li><a class="dropdown-item" href="#" @click="deleteMessage(message.id)">Delete</a></li>
                                </ul>
                            </div>
                            <span v-if="message.is_attachment">

                                <a :href="message.attachment ? message.attachment.url: '#'" download>
                                    {{message.message}}
                                    <span class="badge badge-primary badge-pill delete-btn dc-b"  >
                                        <i class="fa fa-download"  ></i>
                                    </span>
                                </a>

                            </span>
                            <span v-else >
                                <span v-html="message.message">
                                    
                                </span>
                                <span  v-if="message.is_view_offer_message" class="text-success c-pointer" @click="$event=>viewOfferDetails(message.offer.uuid)">View offer details</span>

                            </span>
                        </div>
                        <b class="user_name">{{message.user.first_name}} {{message.user.last_name}}</b>
                        <span class="msg_time">{{formattedDate(message.created_at)}}</span>
                    </div>
                </div>

                <div class="d-flex justify-content-end mb-4 mt-custom" v-else>

                    <div class="msg_cotainer_send">

                        <div>
                            
                            <div class="dropdown icon_send" v-if="active_user.send_to_user.id!=message.sender_id">
                                
                                <i class="dropdown-toggle" icon="fa-solid fa-caret-down" data-bs-toggle="dropdown" aria-expanded="false" ></i>
                                
                                <ul class="dropdown-menu">
                                    <li v-if="!message.is_attachment"><a class="dropdown-item" href="#" @click="editMessage(message)">Edit</a></li>
                                    <li><a class="dropdown-item" href="#" @click="deleteMessage(message.id)">Delete</a></li>
                                    
                                </ul>
                            </div>
                            <span v-if="message.is_attachment">

                                <a :href="message.attachment ? message.attachment.url: '#'" download>
                                    {{message.message}}
                                    <span class="badge badge-primary badge-pill delete-btn dc-b"  >
                                        <i class="fa fa-download"  ></i>
                                    </span>
                                </a>

                            </span>
                            <span v-else >
                                <span v-html="message.message">
                                    
                                </span>
                                <span  v-if="message.is_view_offer_message" class="text-success c-pointer" @click="$event=>viewOfferDetails(message.offer.uuid)">View offer details</span>
                               
                            </span>
                        </div>

                        <b class="sender_user_name">{{message.user.first_name}} {{message.user.last_name}}</b>
                        <span class="msg_time_send">{{formattedDate(message.created_at)}}</span>
                    </div>
                    <div class="img_cont_msg">
                        <img v-if="message.user.basic_profile && message.user.basic_profile.profile_picture" :src="message.user.basic_profile.profile_picture" class="rounded-circle user_img_msg"><img  src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg" v-else>
                        <span :class="message.user.is_session_active ? 'online_icon': 'offline'"></span>
                    </div>
                </div>


            </div>
           
                
            <div class="mb-2 mt-5" v-for="n in number_of_attachments" :key="n">
                <div class="progress" :id="'progress_bar'+n" v-show="progress_bar_show">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                </div>
            </div>

        </div>
        <div class="card-body msg_card_body d-flex" v-else>
            <div v-if="!messages.length" class="row justify-content-center align-self-center text-center">
                
                <div class="card text-center message-empty">
                    <div class="card-body">
                      <h5 class="card-title">Messages Not Found</h5>
                      <p class="card-text">There is no chat with this user click refresh button if you want to reload</p>
                      <button  class="btn btn-primary" @click="reloadMessages()">Refresh</button>
                    </div>
                  </div>
            </div>
        </div>

        
        <!-- buttons -->
        <div class="empty-space-margin">
            
            <div class="row background">
                
                <div class="col-md-10">
                    <input type="text"  class="no-border" 
                    placeholder="Write Your Message" 
                    v-model="message_form.message"
                    @keyup.enter="sendMessage()"
                >
                </div>
                <div class="col-md-2  ">
                    
                    <input type="file" name="attachment" ref="attachment" multiple class="d-none" id="message_attachments" @change="uploadFiles">

                    <div class=" row ">
                        
                        <div class="col-md-6 action_send" >
                            <i class="fas fa-paperclip action_item" @click="selectAttachments()"></i>
                        </div>

                        <div class="col-md-6 action_send">
                            <i class="fas fa-location-arrow action_item " @click="sendMessage()"></i>
                        </div>

                    </div>
                    
                    
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
                    module_type : '',
                    module_id : '',
                    attachments:[]
                },
                errors:[],
                uploadPercentage:20,
                number_of_attachments:0,
                progress_bar_show:false
            }
        },
        mounted() {
            console.log(this.active_user);
        },
        methods: {
            formattedDate(date)
            {
               return moment(String(date)).format('hh:mm A')
            },
            reloadMessages(){
                this.$emit('newMessage');
            },
            sendMessage(){
                
                if(this.message_form.message !=' '){
                    
                    this.message_form.send_to_id=this.active_user.send_to_user.id;
                    this.message_form.module_id=this.active_user.module_id;
                    this.message_form.module_type=this.active_user.module_type;

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
            selectAttachments(){
                
                document.getElementById("message_attachments").click()
            },
            async uploadFiles(){
                this.progress_bar_show=true;
                let attachments = this.$refs.attachment.files;
               
                    
                this.$nextTick(() => {
                    this.number_of_attachments=attachments.length;
                });

               
                let headers= {'Content-Type': 'multipart/form-data'};

                setTimeout(() => {
                    for (let index = 0; index < attachments.length; index++) {
                    
                        let message_form = new FormData();
                        message_form.append('message',this.message_form.message);
                        message_form.append('send_to_id',this.active_user.send_to_user.id);
                        message_form.append('module_id',this.active_user.module_id);
                        message_form.append('module_type',this.active_user.module_type);

                        let progress_bar_index=index+1;
                        let element_id='progress_bar'+progress_bar_index;
                        console.log(document.getElementById(element_id));
                        document.getElementById(element_id).classList.remove('invisible');
                        document.getElementById(element_id).className='progress';
                        message_form.set('attachment',attachments[index]);
                        console.log(message_form);
                        axios.post('../chat/save/message',message_form,headers)
                        .then(res=>{
                        
                            this.$emit('newMessage');
                            document.getElementById(element_id).className='invisible';

                            
                        }).catch((error) => {
                            console.log(error);
                            const errors = error.response.data.errors;
                            for (let field of Object.keys(errors)) {
                                this.errors.push(errors[field][0]);
                            }
                        });
                   
                    }
                }, 90);
 
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

            },
            viewOfferDetails(uuid){
               
                let redirect_url='/offer-detail/'+uuid;
                window.location.replace(redirect_url);
            },
            viewModuleDetail(){
                let redirect_url='';
                if(this.active_user.model == 'Software'){
                    redirect_url = '/software/details/'+this.active_user.module.uuid;
                }
                else if(this.active_user.model == 'Service'){
                    redirect_url = '/service/details/'+this.active_user.module.uuid;
                }
                else{
                    redirect_url = '/job/single-job/'+this.active_user.module.uuid;

                }
                window.location.replace(redirect_url);
            },
            viewProposal(){
                window.location.replace('/view-proposal/'+this.active_user.proposal_uuid);
            }

        },
        
        components: {
        },
    }
</script>



<style scoped>
.c-pointer{
    cursor: pointer;
}
.invisible {
    visibility: hidden;
}
ul.dropdown-menu.seller{
    position: absolute !important; 
    inset: 0px 0px auto -132px !important; margin: 0px ; 
    transform: translate3d(0px, 32.8px, 0px) !important;
}
.icon {
    background-color: transparent;
    color: darkgray;
    padding: 10px;
    width: 20px;
    height: 20px;
    position: initial !important;
    right: 2px;
    top: -15px;
}
.dc-b{
    color: #007F7F;
}
.actions-icon {
    background-color: transparent;
    color: darkgray;
    padding: 10px;
    width: 20px;
    height: 20px;
    position: absolute;
    right: 0px;
    top: -15px;
}

.icon_position{
    margin-top: 12px
    ;
}
.card-header:first-child {
    border-radius: 0px !important;
    min-height: 20px;
    height: 55px;
    margin-right: -5px;
}

.header-title{
    margin-top: 5px;
}
.actions{
    background-color: #fce8fc;
    border-radius: 56%;
    width: 30px;
    height: 30px;
    margin-top: 7px;
    margin-left: 35px;
}
.action_send{
    background-color: #fce8fc;
    border-radius: 56%;
    width: 30px;
    height: 30px;
    margin-top: 7px;
    margin-left: 15px;
}
.empty-space-margin{
    margin-right: -6px;
}
.action_item{
    
    padding: 16px;
    position: relative;
    margin-left: -21px;
    margin-top: -8px;
}
.action_item:hover {
    border-radius: 56%;
    background-color: #f4c2c2;
  }
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
        overflow-y: scroll;
        overflow-x: hidden;
        min-height: 570px;
        max-height: 570px;
    }
    .msg_card_body::-webkit-scrollbar{
        display: none;
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
        min-width: 40px;
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
    top: -22px;
    font-size: 10px;
    white-space: nowrap;
}
.sender_user_name{
    position: absolute;
    right:0;
    font-size: 10px;
    top: -22px;
    white-space: nowrap;
}
.msg_time_send{
    position: absolute;
    right: 0;
    bottom: -23px;
    font-size: 10px;
}
.msg_head{
    position: relative;
}
ul { 
    white-space: nowrap;
}


</style>
