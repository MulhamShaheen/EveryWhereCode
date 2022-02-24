
var calendar = new Vue({
    el: '#calendar',
    data:{
        curEvent: 1,
        items:
            []
        ,
        myMonths: ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"],
    },
    mounted() {

        fetch('sql.php',
        )
            .then(res=>res.json())
            .then(data=> {
                let temp = data;
                for(let item of temp){
                    let date = new Date(item.date);
                    item.month = this.myMonths[date.getMonth()];
                    item.mday = date.getDay();
                }

                this.items = temp;
                console.log(this.items);
            }).then(()=>{

        });

    },
    updated() {
        console.log("1");
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
        });
    },

});




// gsap.to("#day", {duration: 1.5, fontsize: "50px"});

// calendar.use(Particles);
// calendar.use(MotionPlugin);