window.onload = function(){
    let getBtn = document.getElementById("lookup");
    let result = document.getElementById("result");
    let input = document.getElementById("country")

    getBtn.addEventListener('click', showSuggestion);

    function showSuggestion(e){
        e.preventDefault();
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function(){
            let z = this.status;
            let rs = this.readyState;
            if(z == 200 && rs ==4){
                result.innerHTML = this.responseText;
            }
        }
        let value = input.value;
        xhr.open("GET","http://localhost/info2180-lab5/world.php?country="+value)
        xhr.send();
    }




}