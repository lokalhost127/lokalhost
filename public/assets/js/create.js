var svgCanvas = document.getElementById("svg-canvas");
var rateX = 403/841;
var rateY = 206/429;

const app = new Vue({
    el: '#createapp',

    data:{
        svgcontent: "",
        showInfo: "display: block",
        showImageInfo: "display: none",
        tempContent: "",
        step: 5,
        createImage: true,
        createdObjects: [],
        selectedObject: [],
        showItem: "/assets/img/location_components/0.svg",
        selectedItem: "0",
        selectedCreatedItem: "0",
        tableNumber: 0,
        cx: 20,
        cy: 20, // da se sredit
        T: "",
        enum: 0,
        components: {
            "table" : [' <g name="masa">\n' +
            '   <g>\n' +
            '   <path fill="#2F3457" d="M28 44l9 0c1,0 1,1 1,2l0 2c0,1 0,2 -1,2l-9 0c-1,0 -2,-1 -2,-2l0 -2c0,-1 1,-2 2,-2zm-1 10l11 0c0,0 0,-1 0,-1l0 -1c0,-1 0,-1 0,-1l-11 0c-1,0 -1,0 -1,1l0 1c0,0 0,1 1,1z"/>\n' +
            '   <g>\n' +
            '    <rect fill="#7D89B3" x="19" y="20" width="26.1417" height="22.5658" rx="3" ry="4"/>\n' +
            '    <rect fill="#B5C2D8" x="20" y="21" width="23.3085" height="20.1201" rx="3" ry="4"/>\n' +
            '   </g>\n' +
            '   <path fill="#2F3457" d="M28 18l9 0c1,0 1,-1 1,-2l0 -2c0,-1 0,-2 -1,-2l-9 0c-1,0 -2,1 -2,2l0 2c0,1 1,2 2,2zm-1 -10l11 0c0,0 0,1 0,1l0 1c0,0 0,1 0,1l-11 0c-1,0 -1,-1 -1,-1l0 -1c0,0 0,-1 1,-1z"/>\n' +
            '   <path fill="#2F3457" d="M46 36l0 -9c0,-1 1,-2 2,-2l3 0c1,0 2,1 2,2l0 9c0,1 -1,1 -2,1l-3 0c-1,0 -2,0 -2,-1zm10 1l0 -11c0,-1 0,-1 -1,-1l0 0c-1,0 -1,0 -1,1l0 11c0,0 0,0 1,0l0 0c1,0 1,0 1,0z"/>\n' +
            '   <path fill="#2F3457" d="M17 36l0 -9c0,-1 -1,-2 -2,-2l-2 0c-1,0 -2,1 -2,2l0 9c0,1 1,1 2,1l2 0c1,0 2,0 2,-1zm-10 1l0 -11c0,-1 0,-1 1,-1l1 0c0,0 1,0 1,1l0 11c0,0 -1,0 -1,0l-1 0c-1,0 -1,0 -1,0z"/>\n' +
            '  </g>\n' +
            ' </g>','\n' +
            '  <g name="masa">\n' +
            '   <path fill="#2F3457" d="M17 42l9 0c1,0 2,1 2,2l0 2c0,1 -1,2 -2,2l-9 0c-1,0 -2,-1 -2,-2l0 -2c0,-1 1,-2 2,-2zm-1 10l11 0c0,0 1,-1 1,-1l0 -1c0,0 -1,-1 -1,-1l-11 0c-1,0 -1,1 -1,1l0 1c0,0 0,1 1,1z"/>\n' +
            '   <g>\n' +
            '    <rect fill="#7D89B3" x="8" y="18" width="26.1417" height="22.5658" rx="3" ry="4"/>\n' +
            '    <rect fill="#B5C2D8" x="9" y="19" width="23.3085" height="20.1201" rx="3" ry="4"/>\n' +
            '   </g>\n' +
            '   <path fill="#2F3457" d="M17 17l9 0c1,0 1,-1 1,-3l0 -2c0,-1 0,-2 -1,-2l-9 0c-1,0 -2,1 -2,2l0 2c0,2 1,3 2,3zm-1 -11l11 0c0,0 0,1 0,1l0 1c0,1 0,1 0,1l-11 0c-1,0 -1,0 -1,-1l0 -1c0,0 0,-1 1,-1z"/>\n' +
            '  </g>',
                '<g name="masa">\n' +
                ' \n' +
                '  <g >\n' +
                '   <rect fill="#59405A" x="28" y="10" width="41.6879" height="35.9854" rx="5" ry="7"/>\n' +
                '   <rect fill="#745975" x="30" y="12" width="37.1698" height="32.0853" rx="5" ry="6"/>\n' +
                '   <path fill="#2F3457" d="M25 42l0 -27c0,-2 -1,-5 -3,-5l-4 0c-2,0 -3,3 -3,5l0 27c0,2 1,4 3,4l4 0c2,0 3,-2 3,-4zm-16 2l0 -32c0,-1 1,-2 1,-2l2 0c1,0 1,1 1,2l0 32c0,2 0,2 -1,2l-2 0c0,0 -1,0 -1,-2z"/>\n' +
                '   <rect fill="#2F3457" x="12" y="18" width="5.42344" height="4.70099"/>\n' +
                '   <rect fill="#2F3457" x="12" y="34" width="5.42344" height="4.70099"/>\n' +
                '   <path fill="#2F3457" d="M72 41l0 -26c0,-2 1,-5 3,-5l4 0c2,0 3,3 3,5l0 26c0,3 -1,5 -3,5l-4 0c-2,0 -3,-2 -3,-5zm16 3l0 -32c0,-1 -1,-2 -1,-2l-2 0c-1,0 -1,1 -1,2l0 32c0,1 0,2 1,2l2 0c0,0 1,-1 1,-2z"/>\n' +
                '   <rect fill="#2F3457" x="80" y="18" width="5.42344" height="4.70099"/>\n' +
                '   <rect fill="#2F3457" x="80" y="34" width="5.42344" height="4.70099"/>\n' +
                '  </g>\n' +
                ' </g>',
            '<g name="masa">\n' +
            '\n' +
            '  <g>\n' +
            '   <path fill="#526A8F" d="M74 44l0 -30c0,-3 1,-6 3,-6l4 0c2,0 3,3 3,6l0 3 2 0 0 -6c0,-2 0,-3 1,-3l2 0c0,0 1,1 1,3l0 37c0,1 -1,2 -1,2l-2 0c-1,0 -1,-1 -1,-2l0 -7 -2 0 0 3c0,4 -1,6 -3,6l-4 0c-2,0 -3,-2 -3,-6l0 0zm-37 -36l27 0c4,0 7,4 7,8l0 26c0,5 -3,8 -7,8l-27 0c-4,0 -7,-3 -7,-8l0 -26c0,-4 3,-8 7,-8zm-22 28l2 0 0 -13 -2 0 0 13zm2 5l-2 0 0 7c0,1 0,2 -1,2l-2 0c0,0 -1,-1 -1,-2l0 -37c0,-2 1,-3 1,-3l2 0c1,0 1,1 1,3l0 6 2 0 0 -3c0,-3 1,-6 3,-6l4 0c2,0 3,3 3,6l0 31c0,3 -1,5 -3,5l-4 0c-2,0 -3,-2 -3,-5l0 -4zm69 -5l0 -13 -2 0 0 13 2 0z"/>\n' +
            '   <path fill="#7D89B3" d="M32 11l32 0c2,0 5,3 5,7l0 22c0,4 -3,7 -5,7l-32 0c-3,0 -5,-3 -5,-7l0 -22c0,-4 2,-7 5,-7z"/>\n' +
            '   <path fill="#B5C2D8" d="M34 13l27 0c3,0 5,3 5,6l0 20c0,3 -2,6 -5,6l-27 0c-3,0 -5,-3 -5,-6l0 -20c0,-3 2,-6 5,-6z"/>\n' +
            '   <path fill="#2F3457" d="M24 42l0 -26c0,-3 -1,-5 -3,-5l-4 0c-2,0 -3,2 -3,5l0 26c0,3 1,5 3,5l4 0c2,0 3,-2 3,-5zm-16 3l0 -32c0,-1 1,-2 1,-2l2 0c1,0 1,1 1,2l0 32c0,1 0,2 -1,2l-2 0c0,0 -1,-1 -1,-2z"/>\n' +
            '   <rect fill="#2F3457" x="11" y="19" width="5.41195" height="4.69102"/>\n' +
            '   <rect fill="#2F3457" x="11" y="35" width="5.41195" height="4.69102"/>\n' +
            '   <path fill="#2F3457" d="M71 42l0 -26c0,-3 1,-5 3,-5l4 0c2,0 3,2 3,5l0 26c0,3 -1,5 -3,5l-4 0c-2,0 -3,-2 -3,-5zm16 3l0 -32c0,-1 -1,-2 -1,-2l-2 0c-1,0 -1,1 -1,2l0 32c0,1 0,2 1,2l2 0c0,0 1,-1 1,-2z"/>\n' +
            '   <rect fill="#2F3457" x="79" y="19" width="5.41195" height="4.69102"/>\n' +
            '   <rect fill="#2F3457" x="79" y="34" width="5.41195" height="4.69102"/>\n' +
            '  </g>\n' +
            ' </g>'           ,
                ' <g name="masa">\n' +
                '  \n' +
                '  <path fill="#526A8F" d="M33 25l28 0c2,0 4,3 4,6l0 20c0,3 -2,6 -4,6l-28 0c-3,0 -5,-3 -5,-6l0 -20c0,-3 2,-6 5,-6l0 0zm19 -2l-11 0c-1,0 -2,-1 -2,-3l0 -4c0,0 0,0 0,-1l-2 0 0 -5 2 0 0 -2c0,0 0,-1 1,-1l13 0c1,0 1,1 1,1l0 2 2 0 0 5 -2 0c0,1 0,1 0,1l0 4c0,2 -1,3 -2,3zm0 -12l-11 0 0 2 11 0 0 -2zm0 48l-11 0c-1,0 -2,1 -2,3l0 4c0,0 0,1 0,1l-2 0 0 6 2 0 0 1c0,0 0,1 1,1l13 0c1,0 1,-1 1,-1l0 -1 3 0 0 -6 -3 0c0,0 0,-1 0,-1l0 -4c0,-2 -1,-3 -2,-3zm1 12l-12 0 0 -2 11 0c0,0 0,0 1,0l0 2zm15 -24l0 -11c0,-2 1,-2 3,-2l4 0c0,0 1,0 1,0l0 -3 5 0 0 3 2 0c0,0 1,0 1,0l0 14c0,0 -1,1 -1,1l-2 0 0 2 -5 0 0 -2c0,0 -1,0 -1,0l-4 0c-2,0 -3,-1 -3,-2zm12 -1l0 -10 -2 0 0 10 2 0zm-54 1l0 -11c0,-2 -1,-2 -3,-2l-4 0c-1,0 -1,0 -2,0l0 -3 -5 0 0 3 -1 0c0,0 -1,0 -1,0l0 14c0,0 1,1 1,1l1 0 0 3 5 0 0 -3c1,0 1,0 2,0l4 0c2,0 3,-1 3,-2zm-12 0l0 -11 2 0 0 11c0,0 0,0 0,0l-2 0z"/>\n' +
                '  <g id="_647547592288">\n' +
                '   <g>\n' +
                '    <path fill="#7D89B3" d="M31 23l28 0c2,0 4,2 4,6l0 19c0,4 -2,6 -4,6l-28 0c-3,0 -5,-2 -5,-6l0 -19c0,-4 2,-6 5,-6z"/>\n' +
                '    <path fill="#B5C2D8" d="M32 24l24 0c3,0 5,3 5,6l0 17c0,3 -2,6 -5,6l-24 0c-2,0 -4,-3 -4,-6l0 -17c0,-3 2,-6 4,-6z"/>\n' +
                '   </g>\n' +
                '   <path fill="#2F3457" d="M24 44l0 -11c0,-1 -1,-2 -3,-2l-4 0c-1,0 -1,0 -2,0l0 -2 -5 0 0 2 -1 0c0,0 -1,0 -1,1l0 13c0,1 1,1 1,1l1 0 0 3 5 0 0 -3c1,0 1,0 2,0l4 0c2,0 3,-1 3,-2zm-12 1l0 -12 2 0 0 11c0,0 0,0 0,1l-2 0z"/>\n' +
                '   <path fill="#2F3457" d="M66 44l0 -11c0,-1 1,-2 3,-2l4 0c0,0 1,0 1,0l0 -2 5 0 0 2 2 0c0,0 1,0 1,1l0 13c0,1 -1,1 -1,1l-2 0 0 2 -5 0 0 -2c0,0 -1,0 -1,0l-4 0c-2,0 -3,-1 -3,-2zm12 0l0 -11 -2 0 0 11 2 0z"/>\n' +
                '   <path fill="#2F3457" d="M50 56l-11 0c-1,0 -2,1 -2,3l0 4c0,1 0,1 0,2l-3 0 0 5 3 0 0 1c0,0 0,1 1,1l13 0c1,0 1,-1 1,-1l0 -1 3 0 0 -5 -3 0c0,-1 0,-1 0,-2l0 -4c0,-2 -1,-3 -2,-3zm0 12l-11 0 0 -2 11 0c0,0 0,0 0,0l0 2z"/>\n' +
                '   <path fill="#2F3457" d="M50 21l-11 0c-1,0 -2,-1 -2,-3l0 -4c0,-1 0,-1 0,-1l-3 0 0 -6 3 0 0 -1c0,0 0,-1 1,-1l13 0c1,0 1,1 1,1l0 1 2 0 0 6 -2 0c0,0 0,0 0,1l0 4c0,2 -1,3 -2,3zm-1 -12l-10 0 0 2 10 0 0 -2z"/>\n' +
                '  </g>\n' +
                ' </g>'
            ],
            "bar" : [' <g>\n' +
            '  <metadata id="CorelCorpID_0Corel-Layer"/>\n' +
            ' \n' +
            '  <path fill="#1A1A1A" d="M159 8c0,1 0,1 0,2l0 44c0,5 -4,9 -8,9l-120 0c-4,0 -8,-4 -8,-9l0 -44c0,-1 0,-1 0,-2l8 0 0 33 120 0 0 -33 8 0z"/>\n' +
            '  <path fill="#2F3457" d="M38 65l14 0c1,0 2,1 2,3l0 2c0,2 -1,3 -2,3l-14 0c-2,0 -3,-1 -3,-3l0 -2c0,-2 1,-3 3,-3zm-2 12l17 0c1,0 1,0 1,-1l0 -1c0,0 0,-1 -1,-1l-17 0c0,0 -1,1 -1,1l0 1c0,1 1,1 1,1z"/>\n' +
            '  <path fill="#2F3457" d="M68 65l14 0c1,0 3,1 3,3l0 2c0,2 -2,3 -3,3l-14 0c-1,0 -3,-1 -3,-3l0 -2c0,-2 2,-3 3,-3zm-1 12l17 0c0,0 1,0 1,-1l0 -1c0,0 -1,-1 -1,-1l-17 0c-1,0 -2,1 -2,1l0 1c0,1 1,1 2,1z"/>\n' +
            '  <path fill="#2F3457" d="M102 65l14 0c1,0 2,1 2,3l0 2c0,2 -1,3 -2,3l-14 0c-2,0 -3,-1 -3,-3l0 -2c0,-2 1,-3 3,-3zm-2 12l17 0c1,0 1,0 1,-1l0 -1c0,0 0,-1 -1,-1l-17 0c0,0 -1,1 -1,1l0 1c0,1 1,1 1,1z"/>\n' +
            '  <path fill="#2F3457" d="M131 65l14 0c1,0 2,1 2,3l0 2c0,2 -1,3 -2,3l-14 0c-2,0 -3,-1 -3,-3l0 -2c0,-2 1,-3 3,-3zm-2 12l17 0c1,0 1,0 1,-1l0 -1c0,0 0,-1 -1,-1l-17 0c0,0 -1,1 -1,1l0 1c0,1 1,1 1,1z"/>\n' +
            '  <path fill="#454E82" d="M156 8c0,1 0,1 0,2l0 41c0,5 -3,9 -8,9l-114 0c-5,0 -8,-4 -8,-9l0 -41c0,-1 0,-1 0,-2l8 0 0 31 114 0 0 -31 8 0z"/>\n' +
            '  <path fill="#282F58" d="M8 8l166 0 0 15c0,3 -2,5 -5,5l-156 0c-3,0 -5,-2 -5,-5l0 -15z"/>\n' +
            '  <path fill="#1D203D" d="M8 8l166 0 0 6c0,1 -1,2 -2,2l-162 0c-1,0 -2,-1 -2,-2l0 -6z"/>\n' +
            ' </g>',
            '<defs>\n' +
            '   <mask id="id0">\n' +
            '     <linearGradient id="id1" gradientUnits="userSpaceOnUse" x1="59.1907" y1="15.4435" x2="126.986" y2="123.303">\n' +
            '      <stop offset="0" stop-opacity="1" stop-color="white"/>\n' +
            '      <stop offset="1" stop-opacity="0" stop-color="white"/>\n' +
            '     </linearGradient>\n' +
            '    <rect fill="url(#id1)" x="13" y="8" width="126.251" height="52.3583"/>\n' +
            '   </mask>\n' +
            ' </defs>\n' +
            ' <g>\n' +
            '  <metadata id="CorelCorpID_0Corel-Layer"/>\n' +
            '  <path fill="#526A8F" mask="url(#id0)" d="M14 8l125 0 0 37c0,8 -7,15 -15,15l-95 0c-8,0 -15,-7 -15,-15l0 -37 0 0z"/>\n' +
            '  <path fill="#59405A" d="M122 24c0,0 0,1 0,1l0 44c0,5 -2,10 -6,10l-89 0c-3,0 -6,-5 -6,-10l0 -44c0,0 0,-1 0,-1l6 0 0 32 89 0 0 -32 6 0z"/>\n' +
            '  <path fill="#745975" d="M120 24c0,0 0,1 0,1l0 41c0,5 -2,9 -6,9l-85 0c-4,0 -6,-4 -6,-9l0 -41c0,0 0,-1 0,-1l6 0 0 36 85 0 0 -36 6 0z"/>\n' +
            '  <path fill="#3EAA92" d="M9 8l125 0 0 30c0,3 -2,5 -5,5l-115 0c-3,0 -5,-2 -5,-5l0 -30z"/>\n' +
            '  <path fill="#92D8C8" d="M9 22l125 0 0 5c0,1 -1,2 -2,2l-121 0c-1,0 -2,-1 -2,-2l0 -5 0 0z"/>\n' +
            '  <path fill="#92D8C8" d="M9 8l125 0 0 5c0,1 -1,2 -2,2l-121 0c-1,0 -2,-1 -2,-2l0 -5 0 0z"/>\n' +
            '  <path fill="#92D8C8" d="M9 36l125 0 0 5c0,1 -1,2 -2,2l-121 0c-1,0 -2,-1 -2,-2l0 -5 0 0z"/>\n' +
            ' </g>',
                ' <g>\n' +
                '  <metadata id="CorelCorpID_0Corel-Layer"/>\n' +
                '  <g>\n' +
                '   <polygon fill="#2F3457" points="14,16 39,16 39,98 116,98 116,123 38,123 38,128 14,128 14,123 14,104 "/>\n' +
                '   <polygon fill="#454E82" points="17,16 35,16 35,104 116,104 116,120 35,120 35,125 17,125 17,120 17,104 "/>\n' +
                '   <path fill="#59405A" d="M116 16l0 108 -37 0c-4,0 -7,-2 -7,-4l0 -100c0,-3 3,-4 7,-4l37 0z"/>\n' +
                '   <path fill="#745975" d="M116 20l0 21 -31 0c-6,0 -13,-1 -13,-1l0 -19c0,0 7,-1 13,-1l31 0 0 0z"/>\n' +
                '   <path fill="#745975" d="M116 58l0 20 -31 0c-6,0 -13,0 -13,0l0 -20c0,0 7,0 13,0l31 0 0 0z"/>\n' +
                '   <path fill="#745975" d="M116 98l0 20 -31 0c-6,0 -13,0 -13,-1l0 -19c0,0 7,0 13,0l31 0 0 0z"/>\n' +
                '  </g>\n' +
                ' </g>'
            ],
            "foreground": [' <rect fill="url(#gradient1)" x="11" y="8" width="31.3665" height="122.104"/><g>\n' +
            '  <path fill="#262E57" mask="url(#mask1)" d="M27 8l0 0c4,0 7,4 7,8l0 2c3,1 4,3 5,5 4,3 4,7 -1,9 2,7 0,11 -4,11l0 11c3,1 4,3 2,6 6,4 7,9 4,11 2,3 -1,6 -6,6l0 15c3,1 4,3 2,6 6,5 7,10 4,11 2,4 -1,6 -6,7l0 5c0,4 -3,8 -7,8l0 0c-1,0 -1,0 -1,0 -1,0 -2,0 -2,0l0 0c-5,0 -8,-3 -8,-8l0 -8c-1,-1 -1,-2 -1,-4 -4,0 -4,-4 -2,-8 0,-2 1,-4 3,-5l0 -21c-1,-1 -1,-3 -1,-4 -4,-1 -4,-4 -2,-8 0,-2 1,-4 3,-6l0 -15c-1,-1 -2,-3 -2,-5 -3,-1 -3,-7 1,-12 -1,-2 -1,-4 1,-5l0 -4c0,-4 3,-8 8,-8l0 0c0,0 0,0 0,0 1,0 2,0 3,0z"/>\n' +
            '  <rect fill="#53709F" x="14" y="8" width="15.7395" height="120.708" rx="8" ry="13"/>\n' +
            '  <rect fill="#745975" x="11" y="8" width="15.7395" height="120.708" rx="8" ry="13"/>\n' +
            '  <path fill="#3EAA92" d="M23 18c7,-3 15,5 9,9 6,14 -2,22 -9,9 -11,13 -18,5 -9,-9 -9,-4 -2,-12 9,-9z"/>\n' +
            '  <path fill="#64C7B2" d="M12 23c2,-8 12,-10 12,-3 15,2 18,12 4,12 5,16 -5,18 -13,3 -8,6 -11,-4 -3,-12z"/>\n' +
            '  <path fill="#92D8C8" d="M16 26c1,-5 7,-6 8,-2 9,1 10,7 2,7 3,10 -3,12 -8,2 -5,4 -6,-2 -2,-7z"/>\n' +
            '  <path fill="#3EAA92" d="M14 57c4,-7 14,-6 13,1 14,6 13,16 -1,12 1,17 -9,16 -12,0 -10,3 -9,-7 0,-13z"/>\n' +
            '  <path fill="#64C7B2" d="M10 68c-4,-6 1,-15 6,-11 13,-8 22,-3 11,7 15,8 9,17 -7,11 -2,10 -10,4 -10,-7z"/>\n' +
            '  <path fill="#92D8C8" d="M15 68c-3,-4 1,-10 4,-7 7,-5 13,-2 6,4 9,5 6,10 -4,7 -1,6 -6,2 -6,-4z"/>\n' +
            '  <path fill="#3EAA92" d="M14 96c4,-7 14,-7 13,0 14,7 13,17 -1,13 1,16 -9,16 -12,-1 -10,4 -9,-7 0,-12z"/>\n' +
            '  <path fill="#64C7B2" d="M10 107c-4,-7 1,-16 6,-11 13,-9 22,-3 11,7 15,8 9,16 -7,10 -2,10 -10,5 -10,-6z"/>\n' +
            '  <path fill="#92D8C8" d="M15 106c-3,-4 1,-9 4,-6 7,-6 13,-2 6,4 9,4 6,10 -4,6 -1,6 -6,3 -6,-4z"/>\n' +
            ' </g>',
             ' <g>\n' +
            '  <path fill="#FAF8F9" d="M33 12c0,4 -3,7 -7,7 -4,0 -7,-3 -7,-7l14 0z"/>\n' +
            '  <path fill="#FAF8F9" mask="url(#gradient2)" d="M39 12c0,1 0,1 0,2 0,8 -6,14 -13,14 -7,0 -13,-6 -13,-14 0,-1 0,-1 0,-2l26 0z"/>\n' +
            ' </g>',
            '<defs>\n' +
            '   <mask id="id0">\n' +
            '     <linearGradient id="id1" gradientUnits="userSpaceOnUse" x1="5.53409" y1="5.99474" x2="73.0284" y2="67.1612">\n' +
            '      <stop offset="0" stop-opacity="1" stop-color="white"/>\n' +
            '      <stop offset="1" stop-opacity="0" stop-color="white"/>\n' +
            '     </linearGradient>\n' +
            '    <rect fill="url(#id1)" x="9" y="7" width="34.2038" height="34.2044"/>\n' +
            '   </mask>\n' +
            ' </defs>\n' +
            ' <g>\n' +
            '  <metadata id="CorelCorpID_0Corel-Layer"/>\n' +
            '  \n' +
            '  <path fill="#526A8F" mask="url(#id0)" d="M13 8l26 0c2,0 4,1 4,4l0 25c0,3 -2,4 -4,4l-26 0c-2,0 -4,-1 -4,-4l0 -25c0,-3 2,-4 4,-4z"/>\n' +
            '  <path fill="#745975" d="M13 7l22 0c3,0 4,1 4,4l0 21c0,2 -1,4 -4,4l-22 0c-2,0 -4,-2 -4,-4l0 -21c0,-3 2,-4 4,-4z"/>\n' +
            '  <path fill="#9F86B6" d="M14 13l8 0c1,0 1,0 1,2l0 12c0,1 0,2 -1,2l-8 0c0,0 -1,-1 -1,-2l0 -12c0,-2 1,-2 1,-2z"/>\n' +
            '  <path fill="#9F86B6" d="M27 13l8 0c1,0 1,0 1,1l0 2c0,1 0,1 -1,1l-8 0c0,0 -1,0 -1,-1l0 -2c0,-1 1,-1 1,-1z"/>\n' +
            '  <path fill="#9F86B6" d="M27 20l8 0c1,0 1,0 1,1l0 6c0,1 0,1 -1,1l-8 0c0,0 -1,0 -1,-1l0 -6c0,-1 1,-1 1,-1z"/>\n' +
            '  <rect fill="#EDD2CE" x="14" y="15" width="6.55787" height="4.6735"/>\n' +
            ' </g>'         ,
            ' <g >\n' +
            ' \n' +
            '  <g id="_646799793248">\n' +
            '   <polygon fill="#EDD2CE" points="10,8 153,8 153,51 10,51 "/>\n' +
            '   <polygon fill="#FFEADD" points="15,11 148,11 148,48 15,48 "/>\n' +
            '  </g>\n' +
            ' </g>'          ,
                ' <g><defs>\n' +
                '    <mask id="mask1">\n' +
                '      <linearGradient id="gradient1" gradientUnits="userSpaceOnUse" x1="2.63921" y1="56.8213" x2="58.7585" y2="-1.18152">\n' +
                '       <stop offset="0" stop-opacity="1" stop-color="white"/>\n' +
                '       <stop offset="1" stop-opacity="0" stop-color="white"/>\n' +
                '      </linearGradient>\n' +
                '     <rect fill="url(#gradient1)" x="15" y="7" width="38.2296" height="28.4067"/>\n' +
                '    </mask>\n' +
                ' </defs>\n' +
                ' <g>\n' +
                ' \n' +
                '  <g>\n' +
                '   <path fill="#2F3457" mask="url(#mask1)" d="M20 11l0 0c1,-3 6,-5 11,-3 2,0 3,0 4,1 6,-3 11,-1 12,2l1 0c2,0 5,1 5,3l0 15c0,1 -3,3 -5,3l-1 0c-1,4 -6,5 -12,0l-3 0c-6,5 -11,4 -12,0l0 0c-3,0 -5,-2 -5,-3l0 -15c0,-2 2,-3 5,-3z"/>\n' +
                '   <g>\n' +
                '    <path fill="#745975" d="M15 15l28 0c3,0 5,1 5,3l0 15c0,1 -2,3 -5,3l-28 0c-3,0 -5,-2 -5,-3l0 -15c0,-2 2,-3 5,-3z"/>\n' +
                '    <path fill="#3EAA92" d="M29 13c10,-6 19,3 10,11 9,13 0,21 -10,10 -11,11 -19,3 -10,-10 -9,-8 -1,-17 10,-11z"/>\n' +
                '    <path fill="#79CFBA" d="M22 17c2,-7 10,-7 10,1 9,2 9,10 -1,9 0,10 -8,10 -9,0 -8,0 -8,-8 0,-10z"/>\n' +
                '    <path fill="#B9E7D5" d="M24 26c-3,-4 1,-8 5,-4 5,-4 9,-1 4,4 5,5 2,8 -4,5 -3,4 -7,0 -5,-5z"/>\n' +
                '   </g>\n' +
                '  </g>\n' +
                ' </g>'           ,
                '<g>\n' +
                '\n' +
                '  <g id="_647550192752">\n' +
                '   <polygon fill="#A3ACC9" stroke="#4B4B7F" stroke-width="0.43389" points="10,10 135,10 135,53 10,53 "/>\n' +
                '   <polygon fill="#7D89B3" stroke="#4B4B7F" stroke-width="0.43389" points="10,10 37,10 109,10 129,10 135,10 135,53 109,53 109,23 37,23 37,53 10,53 10,23 10,23 10,10 "/>\n' +
                '   <rect fill="#59405A" stroke="#4B4B7F" stroke-width="0.43389" x="37" y="39" width="72.0155" height="13.6419"/>\n' +
                '   <rect fill="#9F86B6" stroke="#4B4B7F" stroke-width="0.43389" x="45" y="39" width="54.9799" height="13.6419"/>\n' +
                '   <rect fill="#D5C0DA" stroke="#4B4B7F" stroke-width="0.43389" x="54" y="39" width="36.9011" height="13.6419"/>\n' +
                '  </g>\n' +
                ' </g> </g>'
            ]            ,
            "background":['<g>\n' +
            '  <metadata id="CorelCorpID_0Corel-Layer"/>\n' +
            '  <g id="_513686861904">\n' +
            '   <polygon fill="url(#bg-0-gradient)" points="15,206 0,206 0,65 0,0 403,0 403,65 403,206 388,206 "/>\n' +
            '   <polygon fill="#6582B0" points="82,0 321,0 321,206 82,206 "/>\n' +
            '   <polygon fill="#6582B0" points="15,77 387,77 387,206 15,206 "/>\n' +
            '   <rect fill="#53709F" x="93" y="5" width="221.631" height="73.5394"/>\n' +
            '   <rect fill="#53709F" x="296" y="91" width="80.566" height="102.804"/>\n' +
            '   <rect fill="#53709F" x="23" y="91" width="80.566" height="102.804"/>\n' +
            '  </g>\n' +
            ' </g>',
            ' <g>\n' +
            '  <metadata id="CorelCorpID_0Corel-Layer"/>\n' +
            '  <g id="_647542551472">\n' +
            '   <rect fill="#6582B0" width="406" height="208"/>\n' +
            '   <rect fill="#526A8F" transform="matrix(8.42298E-17 -0.0100443 0.351146 2.93714E-14 0.000208614 13.7869)" width="1373" height="638"/>\n' +
            '   <polygon fill="#526A8F" points="227,93 218,79 405,79 405,93 "/>\n' +
            '   <polygon fill="#2F3457" points="217,0 406,0 406,79 217,79 "/>\n' +
            '   <path fill="#2F3457" d="M219 0l0 0c1,0 1,1 1,1l0 75 185 0c1,0 1,0 1,1l0 0c0,1 0,2 -1,2l-186 0c-1,0 -2,-1 -2,-2l0 0c0,0 0,0 0,0 0,0 0,0 0,0l0 -76c0,0 1,-1 2,-1z"/>\n' +
            '   <rect fill="#526A8F" width="9.02639" height="207.316"/>\n' +
            '  </g>\n' +
            ' </g>',
                ' <g>\n' +
                '\n' +
                '  <rect fill="none" stroke="black" stroke-width="0.43389" width="406" height="208"/>\n' +
                '  <rect fill="#6582B0" width="406" height="208"/>\n' +
                '  <rect fill="#526A8F" width="9.03245" height="207.455"/>\n' +
                '  <rect fill="#526A8F" transform="matrix(1.52685E-16 -0.0100443 0.63653 2.93714E-14 0.217323 14.0131)" width="1374" height="638"/>\n' +
                '  <g id="_647543041088">\n' +
                '   <polygon fill="#526A8F" points="10,93 1,79 189,79 189,93 "/>\n' +
                '   <polygon fill="#2F3457" points="0,0 190,0 190,79 0,79 "/>\n' +
                '   <path fill="#2F3457" d="M2 0l0 0c1,0 1,1 1,1l0 75 186 0c1,0 1,0 1,1l0 0c0,1 0,2 -1,2l-187 0c-1,0 -2,-1 -2,-2l0 0c0,0 0,0 0,0 0,0 0,0 0,0l0 -76c0,0 1,-1 2,-1z"/>\n' +
                '  </g>\n' +
                ' </g>'
            ]
        }
    },
    methods: {

        right: function () {
            if(this.selectedCreatedItem!== "0")
                {var obj = document.getElementById(this.selectedCreatedItem);
                var transform = obj.getAttribute('transform');
                var comma = transform.indexOf(',');
                var x = Number(transform.substring(10,comma));
                var y = Number(transform.substring(comma+1, transform.length-1));
                x = x + this.step;
                var attribute = "translate(" + x + "," + y + ")";
                obj.setAttribute('transform' , attribute);}
        },
        left: function () {
            if(this.selectedCreatedItem!== "0"){
            var obj = document.getElementById(this.selectedCreatedItem);
            var transform = obj.getAttribute('transform');
            var comma = transform.indexOf(',');
            var x = Number(transform.substring(10,comma));
            var y = Number(transform.substring(comma+1, transform.length-1));
            x = x - this.step;
            var attribute = "translate(" + x + "," + y + ")";
            obj.setAttribute('transform' , attribute);}


        },
        top: function () {
            if(this.selectedCreatedItem!== "0"){
            var obj = document.getElementById(this.selectedCreatedItem);
            var transform = obj.getAttribute('transform');
            var comma = transform.indexOf(',');
            var x = Number(transform.substring(10,comma));
            var y = Number(transform.substring(comma+1, transform.length-1));
            y = y - this.step;
            var attribute = "translate(" + x + "," + y + ")";
            obj.setAttribute('transform' , attribute);}

        },
        down:function () {
            if(this.selectedCreatedItem!== "0"){
            var obj = document.getElementById(this.selectedCreatedItem);
            var transform = obj.getAttribute('transform');
            var comma = transform.indexOf(',');
            var x = Number(transform.substring(10,comma));
            var y = Number(transform.substring(comma+1, transform.length-1));
            y = y + this.step;
            var attribute = "translate(" + x + "," + y + ")";
            obj.setAttribute('transform' , attribute);}
        },
        stepChange: function(e)
        {
            this.step = Number(e.target.value);
        },
        add: function()
        {
            objectToAdd = this.selectedItem;

            if(objectToAdd !== "0") {

                var object = objectToAdd + "-" + this.enum; // new item ID
                var att = objectToAdd.split('-');
                this.enum = (Number(this.enum) + 1);

                this.createdObjects.push(object);


                if(this.createdObjects.length === 1)
                {
                    this.selectedCreatedItem = object;
                }
                if(att[0]==="table")
                {
                    this.tableNumber = Number(this.tableNumber) + 1;
                }

                var objectHTML = "<g transform='translate(0,0)' id='" + object + "'>" + this.components[att[0]][att[1]] + "</g>";
                // alert(objectHTML);

                svgCanvas.innerHTML += objectHTML;


            }
        },
        handleChange: function(e) {
            if(e.target.options.selectedIndex > -1) {

                var item = e.target.options[e.target.options.selectedIndex].value;

                if(item != "0") {
                    // alert(item + ".svg");
                    var itemname = "/assets/img/location_components/" + item + ".svg";
                    this.showItem = itemname;

                    this.selectedItem = item;
                }
                else
                {
                    this.selectedItem = 0;
                    this.showItem = "/assets/img/location_components/0.svg";
                }
            }
        },
        selectItem: function(e){

            if(e.target.options.selectedIndex > -1) {

                item = e.target.options[e.target.options.selectedIndex].value;

                if(item != "0") {

                    this.selectedCreatedItem = item;
                    // alert(this.selectedCreatedItem)
                }
                else
                {
                    this.showItem = "/assets/img/location_components/0.svg";
                }
            }

        },
        deleteEl: function()
        {
            objectToRemove = this.selectedCreatedItem;
            // alert(objectToAdd)
            if(objectToRemove !== "0") {
                // alert(objectToRemove);
                var att = objectToRemove.split('-');
                if(att[0] === "table")
                {
                    this.tableNumber = Number(this.tableNumber) - 1;
                }
                var child = svgCanvas.getElementById(objectToRemove);
                child.innerHTML="";

                var idx = this.createdObjects.indexOf(objectToRemove);
                if(idx === 0)
                {
                    if(this.createdObjects.length === 1)
                    {this.selectedCreatedItem = "0";
                        this.showItem ="/assets/img/location_components/0.svg";
                    }
                    else
                    {

                        this.selectedCreatedItem = this.createdObjects[1]
                    }
                }
                else
                {
                    this.selectedCreatedItem = this.createdObjects[idx -1];
                }

                this.createdObjects.splice(idx,1);



            }



        },

        toggleView: function(att){

            if(att === 'info')
            {
                this.showInfo =  "display: block;";
                this.showImageInfo =  "display: none;";
            }
            else if (att === 'image')
            {
                this.showInfo =  "display: none;";
                this.showImageInfo =  "display: block;";
            }

        },
        savesvg: function()
        {
            this.tempContent = svgCanvas.innerHTML;
            var masi = document.getElementsByName('masa');
            if(masi.length>0) {
                var numbers = "";

                svgCanvas.innerHTML += "<g id='tableNumbers'> </g>";
                var tableNumberElement = document.getElementById('tableNumbers');
                for (var i = 0; i < masi.length; i++) {
                    var parent = masi[i].parentNode;
                    var transform = parent.getAttribute('transform');
                    var idx1 = transform.indexOf("(");
                    var idx2 = transform.indexOf(")");
                    transform = transform.substring(idx1 + 1, idx2);
                    var xy = transform.split(',');
                    var height = Number(masi[i].getBoundingClientRect().height)/2;
                    var width = Number(masi[i].getBoundingClientRect().width)/2;


                    var x = Number(xy[0]) + width * rateX;
                    var y = Number(xy[1]) + height * rateY;

                    //alert(xy[0] +" " + xy[1]);
                    //alert(width + " " + height);
                    var tx = x + 1;
                    var ty = y + 12;
                    numbers += '<rect x="' + x + '" y="'+ y + '" width="15" height="15" style="fill:#676c9e;fill-opacity:0.9"></rect><text x="' + tx + '" y="' + ty + '" font-size="12" fill = "white">' + (i+1) + '</text>';

                }

                tableNumberElement.innerHTML += numbers;
            }

            this.svgcontent = document.getElementById('svgContent').innerHTML
        },

        deleteNumbers: function()
        {
            svgCanvas.innerHTML=this.tempContent;

        }








    }





});