if (localStorage.email) {
    document.getElementById('Welcome').innerHTML += " Logged in as " + localStorage.getItem('email');
} else {
    document.getElementById('WelcomeN').innerHTML += " Log in Please!!" ;
}