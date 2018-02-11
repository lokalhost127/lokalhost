const app = new Vue({
    el: '#showEvent',
    data: {
        tableNumber: ""
    },

    methods: {

        saveTable: function(e){
            var value = e.target.options[e.target.options.selectedIndex].text;
            this.tableNumber = value;

        }
    }





});