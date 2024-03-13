<template>
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">Chats</div>

      <div class="panel-body">
        <ul class="chat" id="chat-screen">
          <li
            class="left clearfix"
            v-for="message in messages"
            :key="message.id"
          >
            <div class="chat-body clearfix">
              <div class="header">
                <div v-if="message.sendby_me">
                  <p>{{ data.admin_name }}:</p>
                  <strong class="primary-font">
                    {{ message.message }}
                  </strong>
                </div>
                <div v-else>
                  <p>{{ data.student_name }}:</p>
                  <strong class="primary-font">
                    {{ message.message }}
                  </strong>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="panel-footer">
        <div class="input-group">
          <input
            id="btn-input"
            type="text"
            name="message"
            class="form-control input-sm"
            placeholder="Type your message here..."
            v-model="newMessage"
            @keyup.enter="sendMessage"
          />

          <span class="input-group-btn">
            <button
              class="btn btn-primary btn-sm"
              id="btn-chat"
              @click="sendMessage"
            >
              Send
            </button>
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { db } from "../firebasedb";
import "firebase/firestore";
export default {
  name: "ChatMessage",
  props: ["data"],
  data() {
    return {
      messages: [],
      total_count: 0,
      my_id: 1,
      newMessage: "",
    };
  },
  computed: {
    chathead: function () {
      return this.data;
    },
    chat_id: function () {
      return this.data.chat.toString();
    },
    sender_id: function () {
      return this.data.sender_id.toString();
    },
    receiver_id: function () {
      return this.data.receiver_id.toString();
    },
  },
  methods: {
    getMessages() {
      this.newMessage = "";
      const chat = db.collection("chat");
      chat
        .orderBy("date", "asc")
        .where("chat_id", "==", this.chat_id)
        .onSnapshot((chatsRef) => {
          let chats = [];
          chatsRef.forEach((doc) => {
            const chat = doc.data();
            chats.push({
              message: chat.message,
              sendby_me: chat.from == this.my_id ? true : false,
              date: chat.date.toString(),
            });
          });
          this.messages = chats;
        });
    },
    sendMessage() {
      if (this.newMessage == "") {
        return false;
      }
      const chat = db.collection("chat");
      chat
        .doc()
        .set({
          chat_id: this.chat_id,
          from: this.sender_id,
          date: new Date(),
          message: this.newMessage,
          users: [this.sender_id, this.receiver_id],
        })
        .then(function () {
          console.log("Document successfully written!");
        })
        .catch(function (error) {
          console.error("Error writing document: ", error);
        });
      this.newMessage = "";
      document
        .getElementById("chat-screen")
        .scrollIntoView({ behavior: "smooth", block: "end" });
    },
  },
  mounted() {
    this.getMessages();
  },
  watch: {
    chathead(oldVal, newVal) {
      this.getMessages();
    },
  },
};
</script>

