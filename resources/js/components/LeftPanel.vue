<template>
    <li class="left clearfix" @click="changeChatHead" style="cursor:pointer;">
        <div class="chat-body clearfix">
        <div class="header">
            <strong class="primary-font">
                {{ chathead.student_name }}
            </strong>
        </div>
        </div>
    </li>
</template>

<script>

    export default {
        name:"LeftPanel",
        props: ["chathead"],
        methods:{
            changeChatHead(){
                this.$emit('change-chathead', this.chathead);
            }
        }
    }
</script>
