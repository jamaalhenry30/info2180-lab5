window.onload = function (){

    let input = document.getElementById('country')
    let write = document.getElementById('result')
    let Btn1= document.getElementById("lookup");
    let Btn2 = document.getElementById("city");

    function clicker(e){
        
        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function(){
            let z = this.status;
            let rs = this.readyState;
            if(z == 200 && rs ==4){
                write.innerHTML = this.responseText;
            }
        }
        country = sanitizeString(input.value); 
        context = 'countries';
        xhr.open("GET", "http://localhost/info2180-lab5/world.php?country="+country+"&context="+context);
        xhr.send();
    }
    function clicker2(e){
    
        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function(){
            let z = this.status;
            let rs = this.readyState;
            if(z == 200 && rs ==4){
                write.innerHTML = this.responseText;
            }
        }
        country = sanitizeString(input.value); 
        var context = "";
        xhr.open("GET", "http://localhost/info2180-lab5/world.php?country="+country+"&context="+context);
        xhr.send();
        

    }

    Btn1.addEventListener("click",clicker);
    Btn2.addEventListener("click",clicker2);

    function sanitizeString(str){
        str = str.replace(/[^a-z0-9áéíóúñü_-\s\.,]/gim,"");
        return str.trim();
        }
    
}