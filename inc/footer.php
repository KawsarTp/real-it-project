<!-- Footer -->
<div class="container-fluid">
<div class="row footer">
	<p class="text-center">&copy All right reserved realitbd.net</p>
</div>
</div>
<!-- /Footer -->
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/wow.js"></script>
    <script src="js/owl.carousel.js"></script> 
		<script src="js/jquery.flagstrap.js"></script> 
		<script src="js/main.js"></script>
		<script src="js/modernizr-custom.js"></script>
		<script>
			 new WOW().init();
			 var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}





    $(document).ready(function() {
     
      $("#owl-demo").owlCarousel({
          autoPlay: 3000, //Set AutoPlay to 3 seconds
          items : 5,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]
     
      });
     
    });


    function myFunction2() {
    var checkBox2 = document.getElementById("myCheck2");
    var text2 = document.getElementById("text2");
    if (checkBox2.checked == true){
        text2.style.display = "block";
    } else {
       text2.style.display = "none";}
}


function myFunction1() {
    var checkBox1 = document.getElementById("myCheck1");
    var text1 = document.getElementById("text1");
    if (checkBox1.checked == true){
        text1.style.display = "block";
    } else {
       text1.style.display = "none";}
}


function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
    if (checkBox.checked == true){
        text.style.display = "block";
    } else {
       text.style.display = "none";}
}

function myFunction3() {
    var checkBox3 = document.getElementById("myCheck3");
    var text3 = document.getElementById("text3");
    if (checkBox3.checked == true){
        text3.style.display = "block";
    } else {
       text3.style.display = "none";}
}
function myFunction4() {
    var checkBox4 = document.getElementById("myCheck4");
    var text4 = document.getElementById("text4");
    if (checkBox4.checked == true){
        text4.style.display = "block";
    } else {
       text4.style.display = "none";}
}

function myFunction5() {
    var checkBox5 = document.getElementById("myCheck5");
    var text5 = document.getElementById("text5");
    if (checkBox5.checked == true){
        text5.style.display = "block";
    } else {
       text5.style.display = "none";}
}
function myFunction6() {
    var checkBox6 = document.getElementById("myCheck6");
    var text6 = document.getElementById("text6");
    if (checkBox6.checked == true){
        text6.style.display = "block";
    } else {
       text6.style.display = "none";}
}
function myFunction7() {
    var checkBox7 = document.getElementById("myCheck7");
    var text7 = document.getElementById("text7");
    if (checkBox7.checked == true){
        text7.style.display = "block";
    } else {
       text7.style.display = "none";}
}
function myFunction8() {
    var checkBox8 = document.getElementById("myCheck8");
    var text8 = document.getElementById("text8");
    if (checkBox8.checked == true){
        text8.style.display = "block";
    } else {
       text8.style.display = "none";}
}
function myFunction9() {
    var checkBox9 = document.getElementById("myCheck9");
    var text9 = document.getElementById("text9");
    if (checkBox9.checked == true){
        text9.style.display = "block";
    } else {
       text9.style.display = "none";}
}
function myFunction10() {
    var checkBox10 = document.getElementById("myCheck10");
    var text10 = document.getElementById("text10");
    if (checkBox10.checked == true){
        text10.style.display = "block";
    } else {
       text10.style.display = "none";}
}



		</script>
</body>
</html>