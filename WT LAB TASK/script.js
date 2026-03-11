document.getElementById("regForm").addEventListener("submit",function(e){

e.preventDefault();

let name = document.getElementById("name").value.trim();
let email = document.getElementById("email").value.trim();
let company = document.getElementById("company").value.trim();

let type = document.querySelector('input[name="type"]:checked');

if(name.length < 6){

alert("Name must be at least 6 characters");

return;

}

let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

if(!email.match(emailPattern)){

alert("Enter valid professional email");

return;

}

if(type == null){

alert("Select attendance type");

return;

}

let registration = {

name:name,
email:email,
company:company,
type:type.value

};

let data = JSON.parse(localStorage.getItem("registrations")) || [];

data.push(registration);

localStorage.setItem("registrations",JSON.stringify(data));

alert("Registration Successful!");

document.getElementById("regForm").reset();

});