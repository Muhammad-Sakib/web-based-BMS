var i = 0;//123456789
var txt = 'Enter blood group Ex. A+...Enter blood group Ex. B-...Enter blood group Ex. O+...Enter blood group Ex. A-...Enter blood group Ex. O-....';
var speed = 100;

function typeWriter() {
    var value = document.getElementById("search-input");
    if(i%27 == 0 && i >0)
    {
        value.placeholder = '';
    }
    if (i <= txt.length) {
    value.placeholder += txt.charAt(i);
    setTimeout(typeWriter, speed);
    i++;
    if(i== txt.length)
    {
        i=0;
        value.placeholder = '';
    }
  }
  
}