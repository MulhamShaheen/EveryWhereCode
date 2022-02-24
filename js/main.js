

var app = new Vue({
     el: 'header',
     data:{
         newRight:"-400px",
     },
     methods:{
         showSide: function (event){
             if(this.newRight==="0px"){
                 this.newRight = "-400px"
             }
             else{
                 this.newRight = "0px"
             }
            console.log(this.newRight);
         }
     }
 });
var calendar = new Vue({
    el: '#calendar',
    data:{
        prev: true,
        nxt: true,
        curEvent: 1,
        items:
            []
        ,
        myMonths: ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"],
        cardCenter: [],
        cardLeft: [],
        cardRight: [],
    },
    mounted() {
        // if(curEvent > items.length){
        //     this.nxt = false
        // }
        // if(curEvent ===0){
        //     this.prev = false
        // }
        // console.log(nxt);
        // console.log(prev);
        fetch('backend/sql.php',
        )
            .then(res=>res.json())
            .then(data=> {
                let temp = data;
                for(let item of temp){
                    let date = new Date(item.date);
                    item.month = this.myMonths[date.getMonth()];
                    item.mday = date.getDay();
                    console.log(item);
                }
                this.items = temp;
                // this.curEvent = parseInt(this.items.length/2);
            }).then(()=>{
            console.log(this.curEvent);
            this.cardCenter = this.items[this.curEvent];
            if(this.curEvent<this.items.length - 1) {
                this.cardRight =  this.items[this.curEvent+1]
            }
            if(this.curEvent>=1) {
                this.cardLeft =  this.items[this.curEvent-1]
            }
            console.log(this.cardRight);
        });

    },
    updated() {
        console.log("Updated");

        console.log(this.cardRight);
    },

    methods:{
        fnext: function () {
            if(this.curEvent<this.items.length-1){
                this.curEvent ++;
                // this.isActive =  false;
                // gsap.to(".slider-info", {duration: 0.5, height: 0});
                // gsap.to(".slider-container", {duration: 0.5, height: 200});
                // gsap.to(".slider-card-container", {duration: 0.5, grid: 400});
                // gsap.set(".slider", {display: r, height: 200});
            }
            console.log(this.curEvent);
            if(this.curEvent >= this.items.length - 1){
                this.nxt = false
            }
            if(this.curEvent > 0){
                this.prev = true
            }
            console.log(this.nxt);
            this.cardCenter = this.items[this.curEvent];
            if(this.curEvent<this.items.length - 1) {
                this.cardRight =  this.items[this.curEvent+1]
            }
            if(this.curEvent>=1) {
                this.cardLeft =  this.items[this.curEvent-1]
            }
        },
        fprev: function () {
            if(this.curEvent>0){
                this.curEvent --;
            }

            if(this.curEvent < this.items.length - 1){
                this.nxt = true
            }
            if(this.curEvent === 0){
                this.prev = false
            }
            console.log(this.nxt);

            this.cardCenter = this.items[this.curEvent];
            if(this.curEvent<this.items.length - 1) {
                this.cardRight =  this.items[this.curEvent+1]
            }
            if(this.curEvent>=1) {
                this.cardLeft =  this.items[this.curEvent-1]
            }

        }
    }
});

// gsap.to("#day", {duration: 1.5, fontsize: "50px"});

// calendar.use(Particles);
// calendar.use(MotionPlugin);