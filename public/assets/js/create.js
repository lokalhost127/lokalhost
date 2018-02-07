
const app = new Vue({
    el: '#createapp',

    data:{
        createImage: false,
        cx: 220,
        cy: 0, // da se sredit
        T: function(){return "translate(" + this.cx + "," + this.cy +" )";}
    }





});