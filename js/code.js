function loginchek() {
	login = localStorage.getItem('rar_login')
	password = localStorage.getItem('rar_pass')

	login1 = shifr(document.getElementById("login").value)
	password1 = shifr(document.getElementById("pass").value)

	ans = ''

	if ((login != login1) || (password != password1)){
		div = document.getElementById("infapas")
		div.innerHTML ='<p class= "infapasst">Вы ввели неправельный логин или пароль</p>'
	}

	else{
		window.location.href = 'profile.html'
	}
}


function loginv() {
	login1 = document.getElementById("login").value
	password1 = document.getElementById("pass").value
	password1c = document.getElementById("passc").value

	if (password1 == password1c){
		localStorage.setItem('rar_login', shifr(login1))
		localStorage.setItem('rar_pass', shifr(password1))
		window.location.href = 'index.html'
	}

	else{
		div = document.getElementById("err")
		div.innerHTML ='<p class= "err">Пароли не совподают</p>'
	}
}

function lod() {
	login = localStorage.getItem('rar_login')
	password = localStorage.getItem('rar_pass')

	if (login == null && password == null){
		window.location.href = 'logn.html'
	}
}

function prof() {
	login = localStorage.getItem('rar_login')
	password = localStorage.getItem('rar_pass')

	div = document.getElementById("login")
	div.innerHTML = 'Логин: '+ login
	div = document.getElementById("pass")
	div.innerHTML = 'Пароль: '+ password
}

function shifr(a) {
	secLogin = ''

	for(i = 0; i < a.length; i = i + 1){
		secLogin += a.charCodeAt(i)
	}

	return secLogin

}