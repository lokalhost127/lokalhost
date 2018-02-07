
const app = new Vue({
    el: '#createapp',

    data:{
        step: 5,
        createImage: true,
        createdObjects: [],
        selectedObject: [],
        showItem: "",
        cx: 0,
        cy: 0, // da se sredit
        T: "",
        enum: 0
    },
    methods: {
        transform: function () {
            var s = "translate(" + this.cx +","+this.cy+")";

            this.T = "translate(" + this.cx +","+this.cy+")";
        },

        right: function () {



            this.cx = this.cx + this.step;
            this.transform();
        },
        left: function () {


            this.cx = this.cx - this.step;
            this.transform();
        },
        top: function () {

            this.cy = this.cy - this.step;
            this.transform();
        },
        down:function () {

            this.cy = this.cy + this.step;
            this.transform();
        },
        add: function()
        {
            objectToAdd = this.showItem;
            if(objectToAdd!="") {

                object = objectToAdd + "-" + this.enum;
                alert(object);
                this.enum += Number(this.enum) + 1;
                this.createdObjects.push(object);
            }
            alert(this.$refs.imagecanvas.innerHTML);
        },
        handleChange: function(e) {
            if(e.target.options.selectedIndex > -1) {

                item = e.target.options[e.target.options.selectedIndex].value;
                if(item != "") {
                    // alert(item + ".svg");
                    itemname = "/assets/img/location_components/" + item + ".svg";
                    this.showItem = itemname;

                }
                else
                {
                    this.showItem = "";
                }
            }
        },

        stepChange: function(e)
        {

            this.step = Number(e.target.value);

        }


    }





});