new Vue( {
    el: 'ul',
    name: 'my-component',
    data () {
        return {
            bla:[]
        }
    },
    mounted() {
        fetch('sql.php',
        )
            .then(res=>res.json())
                .then(data=> {
                    this.bla = data;
                })
            }
    })