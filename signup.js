
function nxt(){

    giveAlert = document.getElementById("alert-text");
    
        var state =1;
        var inputs = document.getElementsByClassName("check");
        var name = document.getElementById("name").value;
        // for(var j=0;j<(name.length);j++){
        //     if(!(name[j] >= 0 && name[j] <= ) || !(name[j] >= 'a' && name[j]<= 'z')){
        //         giveAlert.innerHTML = name[j];
        //         state=0;
        //     }
        // }
        for(var i=0;i<(inputs.length);i++){
            if(inputs[i].value == ""){
                giveAlert.innerHTML = "*Please fill out all field";
                state=0;
            }
            else if(!(document.getElementById('gender_male').checked) && !(document.getElementById('gender_female').checked)) {
                giveAlert.innerHTML = "*Please fill out all field";
                state=0;
            }
        }
        if(state == 1){
            var user_name = document.getElementById("user-name");
            var hide = document.getElementById("login-f-div");
            var btn = document.getElementById("reg-btn");
            btn.innerText = "Register";
            btn.onclick = reg;

            hide.style.display = "none";
            user_name.style.display = "block";
            giveAlert.innerHTML = "";
        }
}
function reg(){
    var btn = document.getElementById("reg-btn");
    btn.setAttribute('type', 'submit');
    var giveAlert = document.getElementById("alert-text");
    var state =1;
    var inputs2 = document.getElementsByClassName("check2");
            for(var i=0;i<(inputs2.length);i++){
                if(inputs2[i].value == ""){
                    giveAlert.innerHTML = "*Please fill out all field";
                    state=0;
                }
            }
            if(state == 1){
                giveAlert.innerHTML = "";
            }
}