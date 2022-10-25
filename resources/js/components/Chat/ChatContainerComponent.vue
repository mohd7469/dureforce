<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Chat Container</div>

                    <div class="card-body">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
   import ChatHeader from "../components/Chat/ChatHeaderComponent.vue";
   import ChatUsers from "../components/Chat/ChatUsersComponent.vue";
   import Messages from "../components/Chat/MessageContainerComponent.vue";
   import MessageInput from "../components/Chat/MessageInputComponent.vue";
    
    export default {
        components: {
            ChatHeader,
            ChatUsers,
            Messages,
            MessageInput
        }
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
