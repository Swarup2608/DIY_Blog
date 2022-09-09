const form = document.querySelector("form.form"),
Btn = form.querySelector("input[type='submit']"),
error = document.querySelector(".msg");

form.onsubmit = (e) =>{
    e.preventDefault();
}
Btn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST","./php/edit.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data  = xhr.response;
                error.innerHTML = data;
                error.style.display = "block";
                if(data != "S"){
                    error.classList.add('error');
                }
            }
        }
    }
    let formData = new FormData(form)
    xhr.send(formData);
}