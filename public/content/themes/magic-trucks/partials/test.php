<style>
div {
    background-image: url("../assets/images/photoaccueil.jpg");
    background-repeat:no-repeat;
    background-attachment:fixed;
    background-size:cover;
    background-position:center-top;
    background-position-x: 50%;
    background-position-y: 65%;
    -webkit-animation: zoomin 60s 1;
    animation-iteration-count: infinite;
}

@-webkit-keyframes zoomin {
    0% {
        -webkit-transform: scale(1);
    }
    50% {
        -webkit-transform: scale(1.3);
    }
    100% {
        -webkit-transform: scale(1);
    }
    
}

</style>
<body>
	<div style="position:absolute;top:0;bottom:0;left:0;right:0;"></div>
</body>