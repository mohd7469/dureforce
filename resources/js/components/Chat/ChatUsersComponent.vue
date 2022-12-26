<template>
    
    <div class="col-md-4 border-right-custom div-diemension">
        
        <div  v-for="(user, index) in users" :class="['row border-bottom',{'active_chat': index===activeUserindex}]"   @click="changeUser(user,index)">
            <div class="col-md-2 " >

                <img alt="User Pic" v-if="user.send_to_user.basic_profile && user.send_to_user.basic_profile.profile_picture!=null" :src="user.send_to_user.basic_profile.profile_picture" id="profile-image1" class="img-circle img-responsive" style="border-radius:50%; width: 40px;height: 40px"> 
                <img alt="User Pic" v-else src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" id="profile-image1" class="img-circle img-responsive" style="border-radius:50%; width: 40px;height: 40px"> 
                
                <span :class="user.send_to_user.is_session_active ? 'online_icon': 'offline'"></span>
            </div>

            <div class="col-md-6 ">
                <b class="user-font-size">{{user.send_to_user.first_name}} {{user.send_to_user.last_name}}</b></br>
                <span class="user-font-size" v-if="user.module">{{user.module.title}}</span>
                
            </div>

            <div class="col-md-4 ">
                <span class="user-font-size" v-if="user.send_to_user.last_login_at">{{formattedDate(user.send_to_user.last_login_at)}}</span></br>
                <span :class="user.model_color">{{user.model}}</span>

            </div>

        </div>

       

    </div>
 
</template>

<script>
    import moment from 'moment';    
    export default {
       
        data(){  
            return {  
                activeUserindex:0,
            };  
        },
        props: {

            users: Array,
        },
        watch: { 
            users: function(newVal, oldVal) { // watch it
                this.activeUserindex=0;
            },
           
        },
        methods: {
            formattedDate(date)
            {
               return moment(String(date)).format('MM/DD/YYYY hh:mm')
            },
            changeUser(user,index)
            {
                this.activeUserindex=index;
                this.$emit('userChange',user);
            }

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped>

.active_chat{
    background-color: rgba(0,0,0,.03);
}
.div-diemension{
    max-height: 660px;
    min-height: 660px;
    overflow: overlay;
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
    left: 29px;
    top: -20px;
}
    .user-font-size{
        font-size: 12px;
    }
    .border-bottom{
        
        padding-top: 7px;
        cursor: pointer;
     
    }
    .border-right-custom{
        border-right: 1px solid #DEE7E7;
        
    }
    .row {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(var(--bs-gutter-y) * -1);
        margin-right: -12px !important;
        margin-left: -24px !important;
    }


</style>
