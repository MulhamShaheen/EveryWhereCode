var app = new Vue({
    el: 'body',
    data:{
        newRight:"-400px",
    },
    mounted() {
        console.log("111");
    },
    methods:{
        openEditor: function (event){
            console.log("event");
        }
    }
});