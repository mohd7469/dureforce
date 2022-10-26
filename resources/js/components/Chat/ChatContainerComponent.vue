<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Chat Container</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <ChatUsers></ChatUsers>
                            </div>
                             <div class="col-md-8">
                                <Messages></Messages>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
   import ChatHeader from "./ChatHeaderComponent.vue";
   import ChatUsers from "./ChatUsersComponent.vue";
   import Messages from "./MessageContainerComponent.vue";
   import MessageInput from "./MessageInputComponent.vue";
    
    export default {
        components: {
            ChatHeader,
            ChatUsers,
            Messages,
            MessageInput
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
