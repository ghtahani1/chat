

require('./bootstrap');

window.Vue = require('vue');

// for auto scroll
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

//notification
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {timeout: 5000})


Vue.component('messages', require('./components/messages.vue').default);


const app = new Vue({
    el: '#app',
    data:{
    	message:'',
    	chat:{
            //array for every message
            message:[],
            user: [],
            color: [],
            float:[],
            time:[] ,
        },
        typing :'' ,
        numberOfUsers : 0 ,
        username:[] ,
        // image: 'avatar4.png',

        allusers: [] ,

    },
    watch:{
        message(){
            Echo.private('chat')
           .whisper('typing', {
            name: this.message
    });
        }
    } ,

    methods:{


    	send(){
    		if (this.message.length != 0) {
                this.chat.message.push(this.message);
                this.chat.color.push('white');
                this.chat.float.push('right');
                this.chat.user.push('you');
                this.chat.time.push(this.getTime());


                //broadcast pushing
                axios.post('send', {
                   message : this.message ,
                   chat : this.chat
                  })
                  .then(response => {
                    console.log(response);
                    this.message ='';
                  })
                  .catch(error => {
                    console.log(error);
                  });
    		}
        },
        getTime(){
            let time = new Date();
            return time.getHours()+':'+time.getMinutes() ;
        } ,

        getImage(){

            // axios.post('allusers')
            // .then(response => {
            //   console.log('tahaniiiii'+response)
            //   if(response.data !=''){
            //       this.allusers = response.data;
            //    }

            // console.log(this.username);

               var parsedobj = JSON.parse(JSON.stringify(this.username))


               console.log(parsedobj);
               console.log(parsedobj[0].image);
               return parsedobj[0].image ;


            // });
            // return '"'+parsedobj[0].image+'"';


          //   return  'avatar4.png' ;

      },


        getOldMessages(){

            axios.post('getOldMessages')
               .then(response => {
                 console.log(response)
                 if(response.data !=''){
                    this.chat = response.data;
                 }
               })
               .catch(error => {
                 console.log(error);
               });
        } ,
        deleteSession(){
            axios.post('deleteSession')
            .then(response=> this.$toaster.success('تم مسح المحادثات المحفوظة') );
        },

        // getUsers() {
        //     axios
        //       .get('allusers')
        //       .then(response => this.allusers = response.data)
            //   .catch(error => console.log(error.message));

        // },


    } ,
    mounted(){

        //broadcast lisiting
    this.getOldMessages();

    // this.getImage();
    // this.getUsers();


    Echo.private('chat')

    .listen('chatEvent', (e) => {
        this.chat.message.push(e.message);
        // this.chat.color.push('warning');
        this.chat.color.push('gray');
        this.chat.float.push('left');
        this.chat.user.push(e.user);
        this.chat.time.push(this.getTime());

        axios.post('saveToSession', {
            chat : this.chat
        })
        .then(response => {

        })
        .catch(error => {
          console.log(error);
        });

        // console.log(e);
    })
    .listenForWhisper('typing', (e) => {
        // console.log(e.name);
        if(e.name != ''){
            this.typing = 'جاري الكتابة ...'
        }else{
            this.typing = ''
        }
    })
    Echo.join('chat')
    .here((users) => {
        this.numberOfUsers = users.length ;
        this.username = users ;
    })
    .joining((user) => {
       this.numberOfUsers += 1
       this.$toaster.success(user.name+'انضم الى المجموعة');

    })
    .leaving((user) => {
        this.numberOfUsers -= 1
        this.$toaster.error(user.name+'غادر المجموعة');


    });


    } ,
});


