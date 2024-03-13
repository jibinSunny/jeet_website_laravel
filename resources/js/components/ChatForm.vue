<template>
  <div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Students</div>
        <div class="panel-body">
          <ul class="chat">
            <LeftPanel v-for="chatHead in chatHeads" :key="chatHead.id" :chathead="chatHead" @change-chathead="handleChatHead"/>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-8">
        <ChatMessage :data="activeChatHead" v-if="chat_open" />
    </div>
  </div>
</template>

<script>
import ChatMessage from "./ChatMessage";
import LeftPanel from "./LeftPanel";
import axios from "axios";
export default {
  name: "ChatForm",
  data() {
    return {
      chatHeads: [],
      activeChatHead: {},
      chat_open : false
    };
  },

  methods: {
    fetchChats() {
      axios.get("./get-chathead").then((response) => {
        let { status, messages } = response.data;
        this.chatHeads = messages.map((message) => {
          let { id, chat, admins, students, created_at } = message;
          let { first_name : student_name } = students;
          let { name : admin_name} = admins;
          let { id : sender_id } = admins;
          let { id : receiver_id } = students;
          return {
            id,
            chat,
            created_at,
            admin_name,
            student_name,
            sender_id,
            receiver_id
          };
        });
      });
    },
    handleChatHead(data){
        this.activeChatHead = data
        this.chat_open = true
    }
  },
  components: {
    ChatMessage,
    LeftPanel,
  },
  mounted() {
    this.fetchChats();
  },
};
</script>
