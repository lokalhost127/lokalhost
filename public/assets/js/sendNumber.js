const app = new Vue({
    el: '#showEvent',
    data: {
        tableNumber: ""
    },

    methods: {

        saveTable: function(e){
            this.tableNumber = e.target.options[e.target.options.selectedIndex].text;


        },
        set: function(){
            alert("Hello")
        }
    },
    created: function() {
        this.tableNumber = document.getElementById('table').options[0].text;
    }


});